<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $table = 'translation';

    protected $fillable = [
        'country_id',
        'name',
        'translator',
        'code'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function ayahTranslation()
    {
        return $this->hasMany(AyahTranslation::class, 'translation_id', 'id');
    }
}
