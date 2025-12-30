<?php

namespace App\Models\Processing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'passport_no',
        'project_code',
        'picture',
        'visa_copy',
        'passport_copy',
        'vaccine_card',
        'driving_license',
        'cirtificate_one',
        'cirtificate_two',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
