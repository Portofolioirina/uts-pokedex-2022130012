<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public function getPhotoAttribute()
    {
        return asset('images/' . $this->attributes['photo']);
    }
    public $timestamps = false;
}
