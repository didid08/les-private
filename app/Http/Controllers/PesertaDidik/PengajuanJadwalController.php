<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use App\Models\PendidikHasJadwal;
use App\Models\PesertaDidikHasJadwal;
use App\Models\PesertaDidikHasPaketPembelajaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PengajuanJadwalController extends Controller
{
    public function __invoke()
    {
        return view('peserta-didik.pengajuan-jadwal', [
            'pageInfo' => [
                'title' => 'Pengajuan Jadwal',
                'id' => 'pengajuan-jadwal',
                'group' => null
            ],
            'semuaPaketPembelajaranSaya' => PesertaDidikHasPaketPembelajaran::where('peserta_didik_id', Auth::id())->get(),
            'semuaJadwalPendidik' => PendidikHasJadwal::where('expired', false)->orderBy('hari')->orderBy('pukul_mulai')->get()
        ]);
    }

    public function process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pesertaDidikHasPaketPembelajaranID' => 'required|numeric',
            'pendidikHasJadwalID' => 'required|numeric'
        ], [
            'required' => ':attribute tidak boleh kosong',
            'numeric' => ':attribute salah'
        ], [
            'pesertaDidikHasPaketPembelajaranID' => 'Paket Pembelajaran',
            'pendidikHasJadwalID' => 'Jadwal'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('peserta-didik.pengajuan-jadwal')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $pesertaDidikHasPaketPembelajaran = PesertaDidikHasPaketPembelajaran::where([['id', '=', $validated['pesertaDidikHasPaketPembelajaranID']], ['peserta_didik_id', '=', Auth::id()]]);
        $pendidikHasJadwal = PendidikHasJadwal::where([['id', '=', $validated['pendidikHasJadwalID']], ['expired', '=', false]]);

        if ($pendidikHasJadwal->exists()) {
            if ($pendidikHasJadwal->first()->pesertaDidikHasJadwal == null) {
                $pesertaDidikHasJadwalBefore = PesertaDidikHasJadwal::where([['peserta_didik_id', '=', Auth::id()], ['pendidik_has_jadwal_id', '=', $validated['pendidikHasJadwalID']]]);
                if (!$pesertaDidikHasJadwalBefore->exists()) {
                    if ($pesertaDidikHasPaketPembelajaran->exists()) {
                        PesertaDidikHasJadwal::create([
                            'peserta_didik_id' => Auth::id(),
                            'peserta_didik_has_paket_pembelajaran_id' => $validated['pesertaDidikHasPaketPembelajaranID'],
                            'pendidik_has_jadwal_id' => $validated['pendidikHasJadwalID']
                        ]);
                        return redirect()->route('peserta-didik.pengajuan-jadwal')->with('success', 'Berhasil Mengajukan Jadwal#Roster Pembelajaran Anda Sudah Diperbarui');
                    }
                    return redirect()->route('peserta-didik.pengajuan-jadwal')->with('error', 'Gagal Mengajukan Jadwal#Anda Tidak Memiliki Paket Pembelajaran Tersebut');
                }
                return redirect()->route('peserta-didik.pengajuan-jadwal')->with('error', 'Gagal Mengajukan Jadwal#Anda Sudah Memilih Jadwal Ini Sebelumnya');
            }
            return redirect()->route('peserta-didik.pengajuan-jadwal')->with('error', 'Gagal Mengajukan Jadwal#Peserta Didik yang Lain Sudah Duluan Klaim Jadwal Ini Sebelumnya');
        }
        return redirect()->route('peserta-didik.pengajuan-jadwal')->with('error', 'Gagal Mengajukan Jadwal#Jadwal Tidak Ditemukan');
    }
}
