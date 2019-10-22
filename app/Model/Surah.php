<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Surah extends Model
{
    protected $table = 'surah';

    protected $fillable = [
        'id',
        'name_arabic',
        'name_alphabet',
        'name_indonesia',
        'number_of_surah',
        'number_of_ayah',
        'number_of_verses',
        'relevation_number',
        'relevation_type',
        'description_indonesia'
    ];


    public function ayah()
    {
        return $this->hasMany(Ayah::class, 'surah_id', 'id');
    }
}
