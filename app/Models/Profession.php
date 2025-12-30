<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Profession extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workers()
    {
        return $this->hasMany(Worker::class);
    }

    public function salesPrices()
    {
        return $this->hasMany(SalesPrice::class);
    }

    public function visaCosts()
    {
        return $this->hasMany(VisaCost::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
