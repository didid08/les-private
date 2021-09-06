<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PaketPembelajaran;
use Illuminate\Http\Request;

class PaketPembelajaranController extends Controller
{
    public function __invoke()
    {
        return view('peserta-didik.paket-pembelajaran', [
            'pageInfo' => [
                'title' => 'Paket Pembelajaran',
                'id' => 'paket-pembelajaran',
                'group' => null
            ],
            'semuaPaketPembelajaran' => PaketPembelajaran::where('aktif', true)->get()
        ]);
    }
}
