<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketPembelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaketPembelajaranController extends Controller
{
    public function daftarPaketPembelajaran()
    {
        return view('admin.paket-pembelajaran.daftar-paket-pembelajaran', [
            'pageInfo' => [
                'title' => 'Pendidik - Daftar Paket Pembelajaran',
                'id' => 'daftar-paket-pembelajaran',
                'group' => 'paket-pembelajaran'
            ]
        ]);
    }
}
