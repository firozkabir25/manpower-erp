<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
        'short',
        'user_id',
        'visa_expire_days',
        'police_expire_days',
        'medical_expire_days',
        'overseas_status',
        'expense_id'
    ];

    protected $casts = [
        'overseas_status' => 'array',
        'expense_id' => 'array'
    ];

    public function companies()
    {
        return $this->hasMany(Company::class, 'country_id');
    }

    public function currencies()
    {
        return $this->hasMany(Currency::class);
    }

    public function workers()
    {
        return $this->hasMany(Worker::class);
    }
}
