<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'district_name',
        'country_id',
        'status'
    ];

    public function workers()
    {
        return $this->hasMany(Worker::class);
    }

}
