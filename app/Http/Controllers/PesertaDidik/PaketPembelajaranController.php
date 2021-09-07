<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PaketPembelajaran;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaketPembelajaranController extends Controller
{
    public function __invoke()
    {
        return view('peserta-didik.paket-pembelajaran', [
            'pageInfo' => [
                'title' => 'Paket Pembelajaran',
                'id' => 'paket-pembelajaran',
                'group' => null
            ],
            'semuaPaketPembelajaran' => PaketPembelajaran::where('aktif', true)->get(),
            'semuaPembayaran' => Pembayaran::where('user_id', Auth::id())
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
}
