<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendidikController extends Controller
{
    public function daftarPendidik()
    {
        return view('admin.pendidik.daftar-pendidik', [
            'pageInfo' => [
                'title' => 'Pendidik - Daftar Pendidik',
                'id' => 'daftar-pendidik',
                'group' => 'pendidik'
            ]
        ]);
    }
}
