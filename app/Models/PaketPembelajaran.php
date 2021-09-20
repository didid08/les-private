<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketPembelajaran extends Model
{
    use HasFactory;

    protected $table = 'paket_pembelajaran';

    public function paketPembelajaranRelationships()
    {
        return $this->hasMany(PaketPembelajaranRelationship::class, 'dari');
    }

    public function pendidikHasJadwal()
    {
        return $this->hasMany(PendidikHasJadwal::class);
    }

    public function pendidikHasPaketPembelajaran()
    {
        return $this->hasMany(PendidikHasPaketPembelajaran::class);
    }

    public function pesertaDidikHasPaketPembelajaran()
    {
        return $this->hasMany(PesertaDidikHasPaketPembelajaran::class);
    }

    public function pembelianPaketPembelajaran()
    {
        return $this->hasMany(pembelianPaketPembelajaran::class);
    }
}
