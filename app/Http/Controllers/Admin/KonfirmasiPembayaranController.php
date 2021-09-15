<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PembelianPaketPembelajaran;
use App\Models\PesertaDidikHasPaketPembelajaran;

class KonfirmasiPembayaranController extends Controller
{
    public function index()
    {
        $totalPembayaranBelumSelesai = 0;
        foreach (PembelianPaketPembelajaran::get() as $pembelian) {
            if ($pembelian->pesertaDidikHasPaketPembelajaran == null) {
                $totalPembayaranBelumSelesai += 1;
            }
        }

        return view('admin.konfirmasi-pembayaran', [
            'pageInfo' => [
                'title' => 'Konfirmasi Pembayaran',
                'id' => 'konfirmasi-pembayaran',
                'group' => null
            ],
            'semuaPembelian' => PembelianPaketPembelajaran::get(),
            'totalPembayaranBelumSelesai' => $totalPembayaranBelumSelesai
        ]);
    }

    public function process($peserta_didik_id)
    {
        $semuaPembelianPesertaDidik = PembelianPaketPembelajaran::where('peserta_didik_id', $peserta_didik_id);

        if ($semuaPembelianPesertaDidik->exists()) {
            foreach ($semuaPembelianPesertaDidik->get() as $pembelian) {
                if ($pembelian->pesertaDidikHasPaketPembelajaran == null) {

                    PesertaDidikHasPaketPembelajaran::create([
                        'peserta_didik_id' => $pembelian->pesertaDidik->id,
                        'paket_pembelajaran_id' => $pembelian->paketPembelajaran->id,
                        'pembelian_paket_pembelajaran_id' => $pembelian->id
                    ]);

                }
            }
            return redirect()->route('admin.konfirmasi-pembayaran')->with('success', 'Pembayaran Berhasil Dikonfirmasi');
        }
        return abort(404);
    }
}
