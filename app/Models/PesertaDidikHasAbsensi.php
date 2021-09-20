<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaDidikHasAbsensi extends Model
{
    use HasFactory;

    protected $table = 'peserta_didik_has_absensi';
    protected $fillable = ['peserta_didik_id', 'peserta_didik_has_jadwal_id', 'peserta_didik_has_paket_pembelajaran_id'];

    public function pesertaDidik()
    {
        return $this->belongsTo(User::class);
    }

    public function pesertaDidikHasPaketPembelajaran()
    {
        return $this->belongsTo(PesertaDidikHasPaketPembelajaran::class);
    }

    public function pesertaDidikHasJadwal()
    {
        return $this->belongsTo(PesertaDidikHasJadwal::class);
    }
}
