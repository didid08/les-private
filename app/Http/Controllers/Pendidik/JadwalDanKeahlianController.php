<?php

namespace App\Http\Controllers\Pendidik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PaketPembelajaran;

class JadwalDanKeahlianController extends Controller
{
    public function __invoke()
    {
        return view('pendidik.jadwal-dan-keahlian', [
            'pageInfo' => [
                'title' => 'Jadwal dan Keahlian',
                'id' => 'jadwal-dan-keahlian',
                'group' => null
            ]
        ]);
    }
}
