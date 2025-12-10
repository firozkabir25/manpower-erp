<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalAgent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nid',
        'phone',
        'email',
        'address',
        'user_id',
        'code',
        'ledger_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ledger()
    {
        return $this->belongsTo(AccLedger::class);
    }

    public function workers()
    {
        return $this->hasMany(Worker::class);
    }

}
