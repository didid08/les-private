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
}
