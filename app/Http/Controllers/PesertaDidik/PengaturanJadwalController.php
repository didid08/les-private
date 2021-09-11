<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PengaturanJadwalController extends Controller
{
    public function __invoke()
    {
        return view('peserta-didik.pengaturan-jadwal', [
            'pageInfo' => [
                'title' => 'Pengaturan Jadwal',
                'id' => 'pengaturan-jadwal',
                'group' => null
            ]
        ]);
    }
}
