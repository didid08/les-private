<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketPembelajaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Kategori Paket 1
        DB::table('paket_pembelajaran')->insert([
            'kode' => '1A',
            'nama' => 'Private Class Iqra’ TK/SD',
            'keterangan' => '12x pertemuan/bulan;Bebas pilih waktu (pagi/siang/malam);Materi dasar dinul islam;Materi dasar doa doa harian;Perbaikan bacaan al-fatihah;Layanan konsultasi',
            'harga' => 50000
        ]);
        DB::table('paket_pembelajaran')->insert([
            'kode' => '1B',
            'nama' => 'Private Class Al-Qur’an untuk SD Kelas 1-3',
            'keterangan' => '12x pertemuan/bulan;Bebas pilih waktu (pagi/siang/malam);Materi dasar dinul islam;Materi dasar doa doa harian;Hafalan Surah Pendek Lv.1;Layanan Konsultasi',
            'harga' => 50000
        ]);
        DB::table('paket_pembelajaran')->insert([
            'kode' => '1C',
            'nama' => 'Private Class Al-Qur’an untuk SD Kelas 4-6',
            'keterangan' => '12x pertemuan/bulan;Bebas pilih waktu (pagi/siang/malam);Materi dasar dinul islam;Materi dasar doa doa harian;Hafalan Surah Pendek Lv.2;Layanan Konsultasi',
            'harga' => 50000
        ]);

        // Kategori Paket 2
        DB::table('paket_pembelajaran')->insert([
            'kode' => '2A',
            'nama' => 'Private Class Tahsin SMP',
            'keterangan' => '12x pertemuan/bulan;Bebas pilih waktu (pagi/siang/malam);Materi tajwid;Hafalan Surah Pendek Lv.3;Layanan Konsultasi',
            'harga' => 70000
        ]);
        DB::table('paket_pembelajaran')->insert([
            'kode' => '2B',
            'nama' => 'Private Class Tahsin SMA',
            'keterangan' => '12x pertemuan/bulan;Bebas pilih waktu (pagi/siang/malam);Materi tajwid;Hafalan Surah Pendek Lv.4;Layanan Konsultasi',
            'harga' => 70000
        ]);
        DB::table('paket_pembelajaran')->insert([
            'kode' => '2C',
            'nama' => 'Private Class Tahfid SMP',
            'keterangan' => '12x pertemuan/bulan;2x pertemuan khusus murajaah;Bebas pilih waktu (pagi/siang/malam);Reward tercapai target',
            'harga' => 100000
        ]);
        DB::table('paket_pembelajaran')->insert([
            'kode' => '2D',
            'nama' => 'Private Class Tahfid SMA',
            'keterangan' => '12x pertemuan/bulan;2x pertemuan khusus murajaah;Bebas pilih waktu (pagi/siang/malam)',
            'harga' => 100000
        ]);

        // Kategori Paket 3
        DB::table('paket_pembelajaran')->insert([
            'kode' => '3A',
            'nama' => 'Private Class Membaca dan Menulis untuk SD',
            'keterangan' => '12x pertemuan/bulan;Bebas pilih waktu (pagi/siang/malam);Bantu selesaikan PR;1 buku bacaan bergambar;Layanan Konsultasi',
            'harga' => 50000
        ]);
        DB::table('paket_pembelajaran')->insert([
            'kode' => '3B',
            'nama' => 'Private Class Mata Pelajaran SD',
            'keterangan' => '12x pertemuan/bulan;Bebas pilih waktu (pagi/siang/malam);Bantu selesaikan PR;1 buku bacaan bergambar;Layanan Konsultasi',
            'harga' => 50000
        ]);
    }
}
