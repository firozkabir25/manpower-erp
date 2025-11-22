<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccLedger extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'ledger',
        'address',
        'phone',
        'email',
        'credit_limit',
        'balance',
        'user_id'
    ];

    public function group()
    {
        return $this->belongsTo(AccGroup::class, 'group_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function localAgents()
    {
        return $this->hasMany(LocalAgent::class, 'ledger_id');
    }

}
