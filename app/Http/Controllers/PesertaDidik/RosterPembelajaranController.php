<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use App\Models\PesertaDidikHasJadwal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RosterPembelajaranController extends Controller
{
    public function __invoke()
    {
        return view('peserta-didik.roster-pembelajaran', [
            'pageInfo' => [
                'title' => 'Roster Pembelajaran',
                'id' => 'roster-pembelajaran',
                'group' => null
            ],
            'semuaJadwalSaya' => PesertaDidikHasJadwal::where('peserta_didik_id', Auth::id())
                                    ->join('pendidik_has_jadwal', 'pendidik_has_jadwal.id', '=', 'peserta_didik_has_jadwal.pendidik_has_jadwal_id')
                                    ->orderBy('pendidik_has_jadwal.hari')
                                    ->orderBy('pendidik_has_jadwal.pukul_mulai')
                                    ->select('peserta_didik_has_jadwal.*')
                                    ->get()
        ]);
    }
}
