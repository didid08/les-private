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
            'pukul_mulai' => 'required|date_format:H:i',
            'pukul_selesai' => 'required|date_format:H:i'
        ], [
            'required' => 'Harap masukkan :attribute',
            'date_format' => ':attribute harus berbentuk jam',
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

        // $hariToEnglish = [
        //     'Senin' => 'Monday',
        //     'Selasa' => 'Tuesday',
        //     'Rabu' => 'Wednesday',
        //     'Kamis' => 'Thursday',
        //     'Jumat' => 'Friday',
        //     'Sabtu' => 'Saturday',
        //     'Minggu' => 'Sunday'
        // ];

        if (new Carbon($validated['pukul_mulai']) < new Carbon($validated['pukul_selesai'])) {

            PendidikHasJadwal::updateOrCreate([
                'pendidik_id' => Auth::id(),
                'hari' => $validated['hari']
            ], [
                'pukul_mulai' => new Carbon($validated['pukul_mulai']),
                'pukul_selesai' => new Carbon($validated['pukul_selesai'])
            ]);

            return redirect()->route('pendidik.jadwal-dan-keahlian')->with('success', 'Berhasil menyimpan jadwal untuk hari '.$validated['hari']);
        }
        return redirect()->route('pendidik.jadwal-dan-keahlian')->with('error', 'Kesalahan dalam menyimpan jadwal#Pukul Selesai mendahului Pukul Mulai');
    }
}
