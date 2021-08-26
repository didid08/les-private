<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function tambahPendidikProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:100',
            'email' => 'required|email|unique:users',
        ], [
            'required' => 'Harap masukkan :attribute',
            'max' => 'Jumlah karakter :attribute tidak boleh melebihi 100',
            'email' => 'Format email yang anda masukkan salah',
            'unique' => ':attribute yang anda masukkan sudah ada yang pakai'
        ], [
            'nama' => 'Nama',
            'email' => 'Email'
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('admin.pendidik.tambah-pendidik')
                        ->withErrors($validator)
                        ->withInput();
        }

        $validated = $validator->validated();

        User::insert([
            'role' => 'pendidik',
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['email']),
        ]);

        return redirect()->route('admin.pendidik.daftar-pendidik')->with('success', 'Berhasil menambah pendidik');
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
