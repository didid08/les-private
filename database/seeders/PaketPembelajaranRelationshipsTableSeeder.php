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
        // 1A ke 3A
        DB::table('paket_pembelajaran_relationships')->insert([
            'dari' => 1,
            'ke' => 8
        ]);
        // 1A ke 3B
        DB::table('paket_pembelajaran_relationships')->insert([
            'dari' => 1,
            'ke' => 9
        ]);
        // 1B ke 3A
        DB::table('paket_pembelajaran_relationships')->insert([
            'dari' => 2,
            'ke' => 8
        ]);
        // 1B ke 3B
        DB::table('paket_pembelajaran_relationships')->insert([
            'dari' => 2,
            'ke' => 9
        ]);
        // 1C ke 3A
        DB::table('paket_pembelajaran_relationships')->insert([
            'dari' => 3,
            'ke' => 8
        ]);
        // 1C ke 3B
        DB::table('paket_pembelajaran_relationships')->insert([
            'dari' => 3,
            'ke' => 9
        ]);


        // 2A ke 2C
        DB::table('paket_pembelajaran_relationships')->insert([
            'dari' => 4,
            'ke' => 6
        ]);
        // 2B ke 2D
        DB::table('paket_pembelajaran_relationships')->insert([
            'dari' => 5,
            'ke' => 7
        ]);
        // 2C ke 2A
        DB::table('paket_pembelajaran_relationships')->insert([
            'dari' => 6,
            'ke' => 4
        ]);
        // 2D ke 2B
        DB::table('paket_pembelajaran_relationships')->insert([
            'dari' => 7,
            'ke' => 5
        ]);


        // 3A ke 1A
        DB::table('paket_pembelajaran_relationships')->insert([
            'dari' => 8,
            'ke' => 1
        ]);
        // 3A ke 1B
        DB::table('paket_pembelajaran_relationships')->insert([
            'dari' => 8,
            'ke' => 2
        ]);
        // 3A ke 1C
        DB::table('paket_pembelajaran_relationships')->insert([
            'dari' => 8,
            'ke' => 3
        ]);
        // 3B ke 1A
        DB::table('paket_pembelajaran_relationships')->insert([
            'dari' => 9,
            'ke' => 1
        ]);
        // 3B ke 1B
        DB::table('paket_pembelajaran_relationships')->insert([
            'dari' => 9,
            'ke' => 2
        ]);
        // 3B ke 1C
        DB::table('paket_pembelajaran_relationships')->insert([
            'dari' => 9,
            'ke' => 3
        ]);
    }
}
