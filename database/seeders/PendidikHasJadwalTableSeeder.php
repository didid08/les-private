<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendidikHasJadwalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pendidik_has_jadwal')->insert([
            'pendidik_id' => 2,
            'hari' => '1Senin',
            'pukul_mulai' => '19:30:00',
            'pukul_selesai' => '20:15:00'
        ]);
        DB::table('pendidik_has_jadwal')->insert([
            'pendidik_id' => 2,
            'hari' => '2Selasa',
            'pukul_mulai' => '20:30:00',
            'pukul_selesai' => '21:15:00'
        ]);
        DB::table('pendidik_has_jadwal')->insert([
            'pendidik_id' => 2,
            'hari' => '5Jumat',
            'pukul_mulai' => '16:30:00',
            'pukul_selesai' => '17:15:00'
        ]);
        DB::table('pendidik_has_jadwal')->insert([
            'pendidik_id' => 2,
            'hari' => '5Jumat',
            'pukul_mulai' => '14:00:00',
            'pukul_selesai' => '15:15:00'
        ]);
    }

}
