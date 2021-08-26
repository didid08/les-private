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
    }
}
