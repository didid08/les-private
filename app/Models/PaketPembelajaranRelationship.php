<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketPembelajaranRelationship extends Model
{
    use HasFactory;

    public function paketPembelajaran()
    {
        return $this->belongsTo(PaketPembelajaran::class, 'ke');
    }
}
