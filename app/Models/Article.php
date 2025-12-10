<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    protected $casts = [
        'images' => 'array', // Wajib array untuk Repeater/Slider
        'published_at' => 'date',
    ];
}