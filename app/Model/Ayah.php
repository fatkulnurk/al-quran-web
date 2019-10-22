<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ayah extends Model
{
    protected $table = 'ayah';

    protected $fillable = [
        'id',
        'number',
        'arabic',
        'alphabet'
    ];

    public function surah()
    {
        return $this->belongsTo(Surah::class, 'surah_id', 'id');
    }
}
