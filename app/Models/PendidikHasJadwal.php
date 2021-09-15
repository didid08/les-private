<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikHasJadwal extends Model
{
    use HasFactory;

    protected $table = 'pendidik_has_jadwal';
    protected $fillable = ['pendidik_id', 'hari', 'pukul_mulai', 'pukul_selesai'];

    public function pendidik()
    {
        return $this->belongsTo(User::class);
    }

    public function pesertaDidikHasJadwal()
    {
        return $this->hasMany(PesertaDidikHasJadwal::class);
    }
}
