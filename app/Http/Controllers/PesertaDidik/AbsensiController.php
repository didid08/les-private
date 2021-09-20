<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use App\Models\PembelianPaketPembelajaran;
use App\Models\PesertaDidikHasAbsensi;
use App\Models\PesertaDidikHasJadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function __invoke()
    {
        $hariIni = '1Senin';
        $thisDay = date('l');

        switch ($thisDay) {
            case 'Monday':
                $hariIni = '1Senin';
            break;
            case 'Tuesday':
                $hariIni = '2Selasa';
            break;
            case 'Wednesday':
                $hariIni = '3Rabu';
            break;
            case 'Thursday':
                $hariIni = '4Kamis';
            break;
            case 'Friday':
                $hariIni = '5Jumat';
            break;
            case 'Saturday':
                $hariIni = '6Sabtu';
            break;
            case 'Sunday':
                $hariIni = '7Minggu';
            break;
        }

        return view('peserta-didik.absensi', [
            'pageInfo' => [
                'title' => 'Absensi',
                'id' => 'absensi',
                'group' => null
            ],
            'semuaJadwalSaya' => PesertaDidikHasJadwal::where('peserta_didik_id', Auth::id())
                                    ->join('pendidik_has_jadwal', 'pendidik_has_jadwal.id', '=', 'peserta_didik_has_jadwal.pendidik_has_jadwal_id')
                                    ->orderBy('pendidik_has_jadwal.hari')
                                    ->orderBy('pendidik_has_jadwal.pukul_mulai')
                                    ->select('peserta_didik_has_jadwal.*')
                                    ->get(),
            'hariIni' => $hariIni
        ]);
    }

    public function process($jadwalID)
    {
        $jadwal = PesertaDidikHasJadwal::where([['id', '=', $jadwalID], ['peserta_didik_id', '=', Auth::id()]]);

        if ($jadwal->exists()) {
            if ($jadwal->first()->pesertaDidikHasAbsensi->count() < 12) {
                PesertaDidikHasAbsensi::create([
                    'peserta_didik_id' => Auth::id(),
                    'peserta_didik_has_jadwal_id' => $jadwalID,
                    'peserta_didik_has_paket_pembelajaran_id' => $jadwal->first()->peserta_didik_has_paket_pembelajaran_id
                ]);
                return redirect()->route('peserta-didik.absensi')->with('success', 'Berhasil Melakukan Absensi');
            }
            return redirect()->route('peserta-didik.absensi')->with('error', 'Gagal Melakukan Absensi#Pertemuan sudah mencapai 12X');
        }
        return redirect()->route('peserta-didik.absensi')->with('error', 'Gagal Melakukan Absensi#Jadwal tidak ditemukan');
    }
}
