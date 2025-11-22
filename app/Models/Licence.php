<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licence extends Model
{
    use HasFactory;

    protected $table = 'licences';

    protected $fillable = [
        'licence',
        'rlno',
        'user_id',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
