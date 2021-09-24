<?php

namespace App\Http\Controllers\Pendidik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PendidikHasJadwal;
use Illuminate\Support\Facades\Auth;

class RosterMengajarController extends Controller
{
    public function __invoke()
    {
        return view('pendidik.roster-mengajar', [
            'pageInfo' => [
                'title' => 'Roster Mengajar',
                'id' => 'roster-mengajar',
                'group' => null
            ],
            'semuaJadwalSaya' => PendidikHasJadwal::where('pendidik_id', Auth::id())->orderBy('hari')->orderBy('pukul_mulai')->get()
        ]);
    }
}
