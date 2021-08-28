<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PesertaDidikController extends Controller
{
    public function daftarPesertaDidik()
    {
        return view('admin.peserta-didik.daftar-peserta-didik', [
            'pageInfo' => [
                'title' => 'Pendidik - Daftar Pendidik',
                'id' => 'daftar-peserta-didik',
                'group' => 'peserta-didik'
            ],
            'semuaPesertaDidik' => User::where('role', 'peserta_didik')->get()
        ]);
    }

    public function tambahPesertaDidik()
    {
        return view('admin.peserta-didik.tambah-peserta-didik', [
            'pageInfo' => [
                'title' => 'Pendidik - Tambah Pendidik',
                'id' => 'tambah-peserta-didik',
                'group' => 'peserta-didik'
            ]
        ]);
    }

    public function tambahPesertaDidikProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:100',
            'email' => 'required|email|unique:users',
        ], [
            'required' => 'Harap masukkan :attribute',
            'max' => 'Jumlah karakter :attribute tidak boleh melebihi 100',
            'email' => 'Format email yang anda masukkan salah',
            'unique' => ':attribute yang anda masukkan sudah ada yang pakai'
        ], [
            'nama' => 'Nama',
            'email' => 'Email'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.peserta-didik.tambah-peserta-didik')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        User::insert([
            'role' => 'peserta_didik',
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['email']),
        ]);

        return redirect()->route('admin.peserta-didik.daftar-peserta-didik')->with('success', 'Berhasil menambah peserta didik');
    }

    public function editPesertaDidik($id)
    {
        $pendidik = User::where([['id', '=', $id], ['role', '=', 'peserta_didik']]);

        if ($pendidik->exists()) {
            return view('admin.peserta-didik.edit-peserta-didik', [
                'pageInfo' => [
                    'title' => 'Pendidik - Edit Pendidik',
                    'id' => 'edit-peserta-didik',
                    'group' => 'peserta-didik',
                ],
                'id' => $id,
                'nama' => $pendidik->first()->nama,
                'email' => $pendidik->first()->email
            ]);
        } else {
            return redirect()->route('admin.peserta-didik.daftar-peserta-didik')->with('error', 'Peserta didik tidak ditemukan');
        }
    }

    public function editPesertaDidikProcess($id, Request $request)
    {
        $pendidik = User::where([['id', '=', $id], ['role', '=', 'peserta_didik']]);

        if ($pendidik->exists()) {

            $validator = Validator::make($request->all(), [
                'nama' => 'required|max:100',
                'email' => 'required|email|unique:users,email,'.$id,
            ], [
                'required' => 'Harap masukkan :attribute',
                'max' => 'Jumlah karakter :attribute tidak boleh melebihi 100',
                'email' => 'Format email yang anda masukkan salah',
                'unique' => ':attribute yang anda masukkan sudah ada yang pakai'
            ], [
                'nama' => 'Nama',
                'email' => 'Email'
            ]);

            if ($validator->fails()) {
                return redirect()
                    ->route('admin.peserta-didik.edit-peserta-didik', ['id' => $id])
                    ->withErrors($validator)
                    ->withInput();
            }

            $validated = $validator->validated();

            $pendidik->update([
                'nama' => $validated['nama'],
                'email' => $validated['email'],
            ]);

            return redirect()->route('admin.peserta-didik.daftar-peserta-didik')->with('success', 'Berhasil mengedit peserta didik');
        } else {
            return redirect()->route('admin.peserta-didik.daftar-peserta-didik')->with('error', 'Peserta didik tidak ditemukan');
        }
    }

    public function hapusPesertaDidik($id)
    {
        $pendidik = User::where([['id', '=', $id], ['role', '=', 'peserta_didik']]);
        if ($pendidik->exists()) {
            $pendidik->delete();
        }

        return redirect()->route('admin.peserta-didik.daftar-peserta-didik')->with('success', 'Berhasil menghapus peserta didik');
    }

    public function rosterPesertaDidik()
    {
        return view('admin.peserta-didik.roster-peserta-didik', [
            'pageInfo' => [
                'title' => 'Pendidik - Roster Pendidik',
                'id' => 'roster-peserta-didik',
                'group' => 'peserta-didik'
            ]
        ]);
    }
}
