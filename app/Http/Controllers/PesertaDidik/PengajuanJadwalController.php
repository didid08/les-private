<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use App\Models\PesertaDidikHasPaketPembelajaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanJadwalController extends Controller
{
    public function __invoke()
    {
        return view('peserta-didik.pengajuan-jadwal', [
            'pageInfo' => [
                'title' => 'Pengajuan Jadwal',
                'id' => 'pengajuan-jadwal',
                'group' => null
            ],
            'semuaPaketPembelajaranSaya' => PesertaDidikHasPaketPembelajaran::where('peserta_didik_id', Auth::id())->get()
        ]);
    }
}
