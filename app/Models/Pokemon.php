<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Pokemon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'species',
        'primary_type',
        'weight',
        'height',
        'hp',
        'attaack',
        'defense',
        'is_legendary',
        'photo'
    ];
    protected $append = [
        'photo_url',
    ];

    public function getPhotoAttribute()
    {
        $photo = $this->attributes['photo'] ?? null;

    if (filter_var($photo, FILTER_VALIDATE_URL)) {
        return $photo;
    }

    return $photo ? Storage::url($photo) : null;
    }
    public $timestamps = false;
}
