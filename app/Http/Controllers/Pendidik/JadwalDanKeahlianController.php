<?php

namespace App\Http\Controllers\Pendidik;

use App\Http\Controllers\Controller;
use App\Models\PaketPembelajaran;
use App\Models\PendidikHasJadwal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JadwalDanKeahlianController extends Controller
{
    public function __invoke()
    {
        return view('pendidik.jadwal-dan-keahlian', [
            'pageInfo' => [
                'title' => 'Jadwal dan Keahlian',
                'id' => 'jadwal-dan-keahlian',
                'group' => null
            ],
            'authId' => Auth::id(),
            'semuaJadwalSaya' => PendidikHasJadwal::where('pendidik_id', Auth::id())->orderBy('hari')->orderBy('pukul_mulai')->get()
        ]);
    }

    public function tambahJadwal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hari' => 'required|in:1Senin,2Selasa,3Rabu,4Kamis,5Jumat,6Sabtu,7Minggu',
            'pukul_mulai' => 'required|date_format:H:i',
            'pukul_selesai' => 'required|date_format:H:i'
        ], [
            'required' => 'Harap masukkan :attribute',
            'date_format' => ':attribute harus berbentuk jam',
            'in' => ':attribute tidak valid'
        ], [
            'hari' => 'Hari',
            'pukul_mulai' => 'Pukul Mulai',
            'pukul_selesai' => 'Pukul Selesai'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('pendidik.jadwal-dan-keahlian')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        if (new Carbon($validated['pukul_mulai']) < new Carbon($validated['pukul_selesai'])) {
            PendidikHasJadwal::create([
                'pendidik_id' => Auth::id(),
                'hari' => $validated['hari'],
                'pukul_mulai' => new Carbon($validated['pukul_mulai']),
                'pukul_selesai' => new Carbon($validated['pukul_selesai'])
            ]);
            return redirect()->route('pendidik.jadwal-dan-keahlian')->with('success', 'Berhasil menambah jadwal');
        }
        return redirect()->route('pendidik.jadwal-dan-keahlian')->with('error', 'Kesalahan dalam menambah jadwal#Pukul Selesai mendahului Pukul Mulai');
    }

    public function editJadwal($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hari' => 'required|in:1Senin,2Selasa,3Rabu,4Kamis,5Jumat,6Sabtu,7Minggu',
            'pukul_mulai' => 'required|date_format:H:i',
            'pukul_selesai' => 'required|date_format:H:i'
        ], [
            'required' => 'Harap masukkan :attribute',
            'date_format' => ':attribute harus berbentuk jam',
            'in' => ':attribute tidak valid'
        ], [
            'hari' => 'Hari',
            'pukul_mulai' => 'Pukul Mulai',
            'pukul_selesai' => 'Pukul Selesai'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('pendidik.jadwal-dan-keahlian')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        if (new Carbon($validated['pukul_mulai']) < new Carbon($validated['pukul_selesai'])) {

            $jadwal = PendidikHasJadwal::where([['id', '=', $id], ['pendidik_id', '=', Auth::id()]]);

            if ($jadwal->exists()) {
                $jadwal->update([
                    'hari' => $validated['hari'],
                    'pukul_mulai' => new Carbon($validated['pukul_mulai']),
                    'pukul_selesai' => new Carbon($validated['pukul_selesai'])
                ]);
                return redirect()->route('pendidik.jadwal-dan-keahlian')->with('success', 'Berhasil mengubah jadwal');
            }
            return redirect()->route('pendidik.jadwal-dan-keahlian')->with('error', 'Jadwal tidak ditemukan');
        }
        return redirect()->route('pendidik.jadwal-dan-keahlian')->with('error', 'Kesalahan dalam mengubah jadwal#Pukul Selesai mendahului Pukul Mulai');
    }

    public function hapusJadwal($id)
    {
        $jadwal = PendidikHasJadwal::where([['id', '=', $id], ['pendidik_id', '=', Auth::id()]]);

        if ($jadwal->exists()) {
            if ($jadwal->first()->pesertaDidikHasJadwal == null) {
                $jadwal->delete();
                return redirect()->route('pendidik.jadwal-dan-keahlian')->with('success', 'Berhasil Menghapus Jadwal');
            }
            return redirect()->route('pendidik.jadwal-dan-keahlian')->with('error', 'Gagal Menghapus Jadwal#Jadwal sudah diambil oleh Peserta Didik');
        }
        return redirect()->route('pendidik.jadwal-dan-keahlian')->with('error', 'Gagal Menghapus Jadwal#Jadwal tersebut tidak ada dalam daftar jadwal anda');
    }
}
