<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use App\Models\PembelianPaketPembelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function __invoke()
    {
        $semuaPembelian = PembelianPaketPembelajaran::where('peserta_didik_id', Auth::id())->get();

        $totalSudahAbsen = [];
        foreach ($semuaPembelian as $pembelian) {
            $totalSudahAbsen[$pembelian->id] = 0;

        }

        return view('peserta-didik.absensi', [
            'pageInfo' => [
                'title' => 'Absensi',
                'id' => 'absensi',
                'group' => null
            ],
            'semuaPembelian' => $semuaPembelian,
            'totalSudahAbsen' => $totalSudahAbsen
        ]);
    }
}
