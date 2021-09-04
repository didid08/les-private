<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class StatusPembayaranController extends Controller
{
    public function index()
    {
        return view('admin.status-pembayaran', [
            'pageInfo' => [
                'title' => 'Status Pembayaran',
                'id' => 'status-pembayaran',
                'group' => null
            ],
            'semuaPembayaran' => Pembayaran::get()
        ]);
    }
}
