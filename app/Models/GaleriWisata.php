<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriWisata extends Model
{
    protected $table = 'galeri_wisata'; // <--- tambahkan baris ini
    protected $fillable = ['wisata_id', 'foto'];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }
}