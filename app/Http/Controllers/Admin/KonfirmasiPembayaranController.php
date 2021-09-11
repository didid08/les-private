<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class KonfirmasiPembayaranController extends Controller
{
    public function index()
    {
        return view('admin.konfirmasi-pembayaran', [
            'pageInfo' => [
                'title' => 'Konfirmasi Pembayaran',
                'id' => 'konfirmasi-pembayaran',
                'group' => null
            ],
            'semuaPembayaran' => Pembayaran::get()
        ]);
    }
}
