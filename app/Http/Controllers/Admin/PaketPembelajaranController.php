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
                'title' => 'Paket Pembelajaran - Daftar Paket Pembelajaran',
                'id' => 'daftar-paket-pembelajaran',
                'group' => 'paket-pembelajaran'
            ],
            'semuaPaketPembelajaran' => PaketPembelajaran::get()
        ]);
    }

    public function tambahPaketPembelajaran()
    {
        return view('admin.paket-pembelajaran.tambah-paket-pembelajaran', [
            'pageInfo' => [
                'title' => 'Paket Pembelajaran - Tambah Paket Pembelajaran',
                'id' => 'tambah-paket-pembelajaran',
                'group' => 'paket-pembelajaran'
            ],
            'semuaPaketPembelajaran' => PaketPembelajaran::get()
        ]);
    }

    public function tambahPaketPembelajaranProcess()
    {

    }
}
