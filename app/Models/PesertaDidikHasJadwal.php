<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaDidikHasJadwal extends Model
{
    use HasFactory;

    protected $table = 'peserta_didik_has_jadwal';
    protected $fillable = ['peserta_didik_id', 'peserta_didik_has_paket_pembelajaran_id', 'pendidik_has_jadwal_id'];

    public function pesertaDidik()
    {
        return $this->belongsTo(User::class);
    }

    public function pesertaDidikHasPaketPembelajaran()
    {
        return $this->belongsTo(PesertaDidikHasPaketPembelajaran::class);
    }

    public function pendidikHasJadwal()
    {
        return $this->belongsTo(PendidikHasJadwal::class);
    }
}
