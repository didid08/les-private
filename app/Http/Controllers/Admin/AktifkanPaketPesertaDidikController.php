<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class AktifkanPaketPesertaDidikController extends Controller
{
    public function index()
    {
        return view('admin.aktifkan-paket-peserta-didik', [
            'pageInfo' => [
                'title' => 'Aktifkan Paket Peserta Didik',
                'id' => 'aktifkan-paket-peserta-didik',
                'group' => null
            ],
            'semuaPembayaran' => Pembayaran::get()
        ]);
    }
}
