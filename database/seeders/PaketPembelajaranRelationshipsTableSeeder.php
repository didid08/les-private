<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketPembelajaranRelationshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1A dan 3A
        DB::table('paket_pembelajaran_relationships')->insert([
            'paket_pembelajaran_id_1' => 1,
            'paket_pembelajaran_id_2' => 8
        ]);
        // 1A dan 3B
        DB::table('paket_pembelajaran_relationships')->insert([
            'paket_pembelajaran_id_1' => 1,
            'paket_pembelajaran_id_2' => 9
        ]);
        // 1B dan 3A
        DB::table('paket_pembelajaran_relationships')->insert([
            'paket_pembelajaran_id_1' => 2,
            'paket_pembelajaran_id_2' => 8
        ]);
        // 1B dan 3B
        DB::table('paket_pembelajaran_relationships')->insert([
            'paket_pembelajaran_id_1' => 2,
            'paket_pembelajaran_id_2' => 9
        ]);
        // 1C dan 3A
        DB::table('paket_pembelajaran_relationships')->insert([
            'paket_pembelajaran_id_1' => 3,
            'paket_pembelajaran_id_2' => 8
        ]);
        // 1C dan 3B
        DB::table('paket_pembelajaran_relationships')->insert([
            'paket_pembelajaran_id_1' => 3,
            'paket_pembelajaran_id_2' => 9
        ]);
        // 2A dan 2C
        DB::table('paket_pembelajaran_relationships')->insert([
            'paket_pembelajaran_id_1' => 4,
            'paket_pembelajaran_id_2' => 6
        ]);
        // 2B dan 2D
        DB::table('paket_pembelajaran_relationships')->insert([
            'paket_pembelajaran_id_1' => 5,
            'paket_pembelajaran_id_2' => 7
        ]);
    }
}
