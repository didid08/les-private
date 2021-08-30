<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketPembelajaran;
use App\Models\PaketPembelajaranRelationship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PaketPembelajaranController extends Controller
{
    public function daftarPaketPembelajaran()
    {
        return view('admin.paket-pembelajaran.daftar-paket-pembelajaran', [
            'pageInfo' => [
                'title' => 'Paket Pembelajaran - Daftar Paket Pembelajaran',
                'id' => 'daftar-paket-pembelajaran',
                'group' => 'paket-pembelajaran'
            ],
            'semuaPaketPembelajaran' => PaketPembelajaran::get()
        ]);
    }

    public function tambahPaketPembelajaran()
    {
        return view('admin.paket-pembelajaran.tambah-paket-pembelajaran', [
            'pageInfo' => [
                'title' => 'Paket Pembelajaran - Tambah Paket Pembelajaran',
                'id' => 'tambah-paket-pembelajaran',
                'group' => 'paket-pembelajaran'
            ],
            'semuaPaketPembelajaran' => PaketPembelajaran::get()
        ]);
    }

    public function tambahPaketPembelajaranProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|unique:paket_pembelajaran,kode',
            'nama' => 'required|max:100',
            'keterangan' => 'required',
            'harga' => 'required|numeric'
        ], [
            'required' => 'Harap masukkan :attribute',
            'numeric' => ':attribute harus berbentuk angka',
            'max' => 'Jumlah karakter :attribute tidak boleh melebihi 100',
            'unique' => ':attribute yang anda masukkan sudah ada yang pakai'
        ], [
            'kode' => 'Kode Paket',
            'nama' => 'Nama Paket',
            'keterangan' => 'Keterangan',
            'harga' => 'Harga Paket'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.paket-pembelajaran.tambah-paket-pembelajaran')
                ->withErrors($validator)
                ->withInput();
        }

        $aktif = false;
        if ($request->aktif) {
            $aktif = true;
        }

        $validated = $validator->validated();

        PaketPembelajaran::insert([
            'kode' => $validated['kode'],
            'nama' => $validated['nama'],
            'keterangan' => $validated['keterangan'],
            'harga' => $validated['harga'],
            'aktif' => $aktif
        ]);

        if (!empty($request->daftar_relationship)) {
            $paketPembelajaranId = PaketPembelajaran::where('kode', $validated['kode'])->first()->id;

            foreach (explode(',', $request->daftar_relationship) as $item) {
                if (PaketPembelajaran::where('id', (int)$item)->exists()) {
                    PaketPembelajaranRelationship::insert([
                        'dari' => $paketPembelajaranId,
                        'ke' => $item
                    ]);
                    PaketPembelajaranRelationship::insert([
                        'dari' => $item,
                        'ke' => $paketPembelajaranId
                    ]);
                }
            }
        }

        return redirect()->route('admin.paket-pembelajaran.daftar-paket-pembelajaran')->with('success', 'Berhasil menambah paket pembelajaran');
    }

    public function hapusPaketPembelajaran($id)
    {
        $paketPembelajaran = PaketPembelajaran::where('id', $id);
        if ($paketPembelajaran->exists()) {
            $paketPembelajaran->delete();
        }

        return redirect()->route('admin.paket-pembelajaran.daftar-paket-pembelajaran')->with('success', 'Berhasil menghapus paket pembelajaran');
    }
}
