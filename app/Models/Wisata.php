<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'wisata';

    protected $fillable = [
        'nama',
        'deskripsi',
        'lokasi',
        'kategori',
        'maps_embed',
        'foto',
        'jam_buka',
        'harga_tiket',
    ];

    public function galeri()
    {
        return $this->hasMany(GaleriWisata::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function diskusi()
    {
        return $this->hasMany(Diskusi::class);
    }
}
