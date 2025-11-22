<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'sponsor_id',
        'name',
        'name_arabic',
        'user_id',
        'address',
    ];
}
