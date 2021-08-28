<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pendidik
        DB::table('users')->insert([
            'role' => 'admin',
            'nama' => 'Admin',
            'email' => 'admin@localhost',
            'password' => Hash::make('admin')
        ]);
        DB::table('users')->insert([
            'role' => 'pendidik',
            'nama' => 'Ammar',
            'email' => 'ammar@localhost',
            'password' => Hash::make('ammar')
        ]);
        DB::table('users')->insert([
            'role' => 'pendidik',
            'nama' => 'Didid',
            'email' => 'didid@localhost',
            'password' => Hash::make('didid')
        ]);
        DB::table('users')->insert([
            'role' => 'pendidik',
            'nama' => 'Satria',
            'email' => 'satria@localhost',
            'password' => Hash::make('satria')
        ]);
        DB::table('users')->insert([
            'role' => 'pendidik',
            'nama' => 'Raju',
            'email' => 'raju@localhost',
            'password' => Hash::make('raju')
        ]);
        DB::table('users')->insert([
            'role' => 'pendidik',
            'nama' => 'Haidar',
            'email' => 'haidar@localhost',
            'password' => Hash::make('haidar')
        ]);

        // Peserta Didik
        DB::table('users')->insert([
            'role' => 'peserta_didik',
            'nama' => 'Peserta Didik 1',
            'email' => 'peserta_didik_1@localhost',
            'password' => Hash::make('peserta_didik_1')
        ]);
        DB::table('users')->insert([
            'role' => 'peserta_didik',
            'nama' => 'Peserta Didik 2',
            'email' => 'peserta_didik_2@localhost',
            'password' => Hash::make('peserta_didik_2')
        ]);
        DB::table('users')->insert([
            'role' => 'peserta_didik',
            'nama' => 'Peserta Didik 3',
            'email' => 'peserta_didik_3@localhost',
            'password' => Hash::make('peserta_didik_3')
        ]);
        DB::table('users')->insert([
            'role' => 'peserta_didik',
            'nama' => 'Peserta Didik 4',
            'email' => 'peserta_didik_4@localhost',
            'password' => Hash::make('peserta_didik_4')
        ]);
        DB::table('users')->insert([
            'role' => 'peserta_didik',
            'nama' => 'Peserta Didik 5',
            'email' => 'peserta_didik_5@localhost',
            'password' => Hash::make('peserta_didik_5')
        ]);
        DB::table('users')->insert([
            'role' => 'peserta_didik',
            'nama' => 'Peserta Didik 6',
            'email' => 'peserta_didik_6@localhost',
            'password' => Hash::make('peserta_didik_6')
        ]);
    }
}
