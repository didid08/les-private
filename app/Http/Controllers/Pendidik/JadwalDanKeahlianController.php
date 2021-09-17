<?php

namespace App\Http\Controllers\Pendidik;

use App\Http\Controllers\Controller;
use App\Models\PaketPembelajaran;
use App\Models\PendidikHasJadwal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public function simpanJadwal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'pukul_mulai' => 'required|date',
            'pukul_selesai' => 'required|date'
        ], [
            'required' => 'Harap masukkan :attribute',
            'date' => ':attribute harus berbentuk tanggal/waktu',
            'in' => ':attribute tidak valid'
        ], [
            'hari' => 'Hari',
            'pukul_mulai' => 'Pukul Mulai',
            'pukul_selesai' => 'Pukul Selesai'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('pendidik.jadwal-dan-keahlian')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();
    }
}
