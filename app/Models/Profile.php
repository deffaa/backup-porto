<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // cv_path ditambahkan di akhir array
    protected $fillable = [
        'name', 'role_titles', 'bio', 'about', 'semester', 
        'total_projects', 'gpa', 'tech_count', 'photo_path', 'cv_path'
    ];

    protected $casts = [
        'role_titles' => 'array',
    ];
}