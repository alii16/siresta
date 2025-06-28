<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{
    protected $table = 'diskusi';
    protected $fillable = ['user_id', 'wisata_id', 'pesan', 'parent_id'];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function anak()
    {
        return $this->hasMany(Diskusi::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Diskusi::class, 'parent_id');
    }


}

