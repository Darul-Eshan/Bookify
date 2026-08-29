<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editor extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'access_level',
        'assigned_section',
        'status'
    ];

    protected $hidden = [
        'password',
    ];
}