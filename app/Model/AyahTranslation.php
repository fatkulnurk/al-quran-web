<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AyahTranslation extends Model
{
    protected $table = 'ayah_translation';

    protected $fillable = [
        'surah_id',
        'ayah_id',
        'translation_id',
        'number',
        'content'
    ];

    protected $hidden = [
        'surah_id',
        'ayah_id',
        'translation_id'
    ];

    public function ayah()
    {
        return $this->belongsTo(Ayah::class, 'ayah_id', 'id');
    }

    public function translation()
    {
        return $this->belongsTo(Translation::class, 'translation_id', 'id');
    }

    public function surah()
    {
        return $this->belongsTo(Surah::class, 'surah_id', 'id');
    }
}
