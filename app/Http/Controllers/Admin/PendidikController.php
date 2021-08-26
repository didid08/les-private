<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PendidikController extends Controller
{
    public function daftarPendidik()
    {
        return view('admin.pendidik.daftar-pendidik', [
            'pageInfo' => [
                'title' => 'Pendidik - Daftar Pendidik',
                'id' => 'daftar-pendidik',
                'group' => 'pendidik'
            ],
            'semua_pendidik' => User::where('role', 'pendidik')->get()
        ]);
    }

    public function tambahPendidik()
    {
        return view('admin.pendidik.tambah-pendidik', [
            'pageInfo' => [
                'title' => 'Pendidik - Tambah Pendidik',
                'id' => 'tambah-pendidik',
                'group' => 'pendidik'
            ]
        ]);
    }

    public function rosterPendidik()
    {
        return view('admin.pendidik.roster-pendidik', [
            'pageInfo' => [
                'title' => 'Pendidik - Roster Pendidik',
                'id' => 'roster-pendidik',
                'group' => 'pendidik'
            ]
        ]);
    }
}
