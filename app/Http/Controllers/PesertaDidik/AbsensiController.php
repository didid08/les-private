<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function __invoke()
    {
        $semuaPembayaranSaya = Pembayaran::where('user_id', Auth::id())->get();

        $totalSudahAbsen = [];
        foreach ($semuaPembayaranSaya as $pembayaran) {
            $totalSudahAbsen[$pembayaran->id] = 0;
            if ($pembayaran->pembayaranSelesai != null) {
                foreach ($pembayaran->pembayaranSelesai->pembelajaran as $pembelajaran) {
                    if ($pembelajaran->absensi != null) {
                        $totalSudahAbsen[$pembayaran->id] += 1;
                    }
                }
            }
        }

        return view('peserta-didik.absensi', [
            'pageInfo' => [
                'title' => 'Absensi',
                'id' => 'absensi',
                'group' => null
            ],
            'semuaPembayaranSaya' => $semuaPembayaranSaya,
            'totalSudahAbsen' => $totalSudahAbsen
        ]);
    }
}
