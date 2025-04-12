<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{
    use HasFactory;

    protected $fillable = [
        'sobre',
        'ata',
        'instituto',
        'docs',
    ];

    protected $casts = [
        'ata' => 'array',
        'instituto' => 'array',
        'docs' => 'array',
    ];
}
