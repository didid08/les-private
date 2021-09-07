<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PaketPembelajaran;
use App\Models\PaketPembelajaranRelationship;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaketPembelajaranController extends Controller
{
    public function __invoke()
    {
        $paketPembelajaranSaya = [];

        foreach (User::find(Auth::id())->pembayaran as $pembayaran) {
            array_push($paketPembelajaranSaya, $pembayaran->paket_pembelajaran_id);
        }

        $paketPembelajaranYangBisaDipilih = [];

        foreach (PaketPembelajaran::where('aktif', true)->get()->sortBy('kode') as $paketPembelajaran) {

            // Jika Paket Pembelajaran Saya Berisi
            if (count($paketPembelajaranSaya) != 0) {
                if (!in_array($paketPembelajaran->id, $paketPembelajaranSaya)) {

                    // Cek apakah paket pembelajaran yang sudah dipilih memiliki hubungan dengan paket yang akan dipilih lagi

                    $lolos = true;

                    foreach ($paketPembelajaranSaya as $item) {
                        if (PaketPembelajaranRelationship::where([['dari', '=', $item], ['ke', '=', $paketPembelajaran->id]])->exists()) {
                            $lolos = true;
                        } else {
                            $lolos = false;
                            break;
                        }
                    }

                    if ($lolos) {
                        array_push($paketPembelajaranYangBisaDipilih, [
                            'id' => $paketPembelajaran->id,
                            'kode' => $paketPembelajaran->kode,
                            'nama' => $paketPembelajaran->nama,
                            'keterangan' => $paketPembelajaran->keterangan,
                            'harga' => $paketPembelajaran->harga
                        ]);
                    }

                }
            } else { // Jika Tidak
                array_push($paketPembelajaranYangBisaDipilih, [
                    'id' => $paketPembelajaran->id,
                    'kode' => $paketPembelajaran->kode,
                    'nama' => $paketPembelajaran->nama,
                    'keterangan' => $paketPembelajaran->keterangan,
                    'harga' => $paketPembelajaran->harga
                ]);
            }
        }

        return view('peserta-didik.paket-pembelajaran', [
            'pageInfo' => [
                'title' => 'Paket Pembelajaran',
                'id' => 'paket-pembelajaran',
                'group' => null
            ],
            'semuaPembayaranSaya' => Pembayaran::where('user_id', Auth::id()),
            'paketPembelajaranYangBisaDipilih' => $paketPembelajaranYangBisaDipilih
        ]);
    }

    public function tambahPaket($paketId)
    {
        if (PaketPembelajaran::where('id', $paketId)->exists()) {
            if (!Pembayaran::where([['user_id', '=', Auth::id()], ['paket_pembelajaran_id', '=', $paketId]])->exists()) {
                Pembayaran::insert([
                    'kode_pembayaran' => Str::random(12),
                    'user_id' => Auth::id(),
                    'paket_pembelajaran_id' => $paketId
                ]);
                return redirect()->route('peserta-didik.paket-pembelajaran')->with('success', 'Sukses Menambah Paket');
            }
            return redirect()->route('peserta-didik.paket-pembelajaran')->with('error', 'Gagal Menambah Paket#Paket yang anda pilih sudah ditambahkan sebelumnya');
        }
        return redirect()->route('peserta-didik.paket-pembelajaran')->with('error', 'Gagal Menambah Paket#Paket tidak ditemukan');
    }

    public function batalkanPaket($paketId)
    {
        $paket = Pembayaran::where([['user_id', '=', Auth::id()], ['paket_pembelajaran_id', '=', $paketId]]);

        if ($paket->exists()) {
            if ($paket->first()->pembayaranSelesai == null) {
                $paket->delete();
                return redirect()->route('peserta-didik.paket-pembelajaran')->with('success', 'Berhasil membatalkan paket');
            }
            return redirect()->route('peserta-didik.paket-pembelajaran')->with('error', 'Gagal Membatalkan Paket#Paket tersebut sedang dalam masa aktif');
        }
        return redirect()->route('peserta-didik.paket-pembelajaran')->with('error', 'Gagal Membatalkan Paket#Paket tersebut tidak ada dalam daftar paket anda');
    }
}
