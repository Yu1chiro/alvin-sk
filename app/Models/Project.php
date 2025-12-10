<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    protected $casts = [
        'image' => 'array', // 👈 WAJIB: Agar repeater gambar jalan
    ];
}