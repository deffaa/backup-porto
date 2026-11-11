<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'category', 'description', 'tags'];

    // Konversi tipe data otomatis (dari JSON di DB ke Array di PHP)
    protected $casts = [
        'tags' => 'array',
    ];
}