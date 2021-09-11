<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\PembayaranSelesai;

class KonfirmasiPembayaranController extends Controller
{
    public function index()
    {
        $totalPembayaranBelumSelesai = 0;
        foreach (Pembayaran::get() as $pembayaran) {
            if ($pembayaran->pembayaranSelesai == null) {
                $totalPembayaranBelumSelesai += 1;
            }
        }

        return view('admin.konfirmasi-pembayaran', [
            'pageInfo' => [
                'title' => 'Konfirmasi Pembayaran',
                'id' => 'konfirmasi-pembayaran',
                'group' => null
            ],
            'semuaPembayaran' => Pembayaran::get(),
            'totalPembayaranBelumSelesai' => $totalPembayaranBelumSelesai
        ]);
    }

    public function process($user_id)
    {
        $semuaPembayaranUser = Pembayaran::where('user_id', $user_id);

        if ($semuaPembayaranUser->exists()) {
            foreach ($semuaPembayaranUser->get() as $pembayaranUser) {
                if ($pembayaranUser->PembayaranSelesai == null) {
                    PembayaranSelesai::create([
                        'pembayaran_id' => $pembayaranUser->id
                    ]);
                }
            }
            return redirect()->route('admin.konfirmasi-pembayaran')->with('success', 'Pembayaran Berhasil Dikonfirmasi');
        }
        return abort(404);
    }
}
