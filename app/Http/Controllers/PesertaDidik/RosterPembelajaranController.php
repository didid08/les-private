<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RosterPembelajaranController extends Controller
{
    public function __invoke()
    {
        return view('peserta-didik.roster-pembelajaran', [
            'pageInfo' => [
                'title' => 'Roster Pembelajaran',
                'id' => 'roster-pembelajaran',
                'group' => null
            ]
        ]);
    }
}
