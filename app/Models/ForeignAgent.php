<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ForeignAgent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_id',
        'email',
        'phone',
        'address',
        'user_id',
        'ledger_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function ledger()
    {
        return $this->belongsTo(AccLedger::class, 'ledger_id');
    }
}
