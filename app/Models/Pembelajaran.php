<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelajaran extends Model
{
    use HasFactory;

    protected $table = 'pembelajaran';

    public function pembayaranSelesai()
    {
        return $this->belongsTo(PembayaranSelesai::class);
    }
}
