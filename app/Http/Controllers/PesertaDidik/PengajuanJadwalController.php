<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PengajuanJadwalController extends Controller
{
    public function __invoke()
    {
        return view('peserta-didik.pengajuan-jadwal', [
            'pageInfo' => [
                'title' => 'Pengajuan Jadwal',
                'id' => 'pengajuan-jadwal',
                'group' => null
            ]
        ]);
    }
}
