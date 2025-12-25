<?php

namespace App\Models\Processing;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\{Profession, Currency, User};

class SalesPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'edition',
        'profession_id',
        'price',
        'user_id',
        'project_id',
        'code',
        'date',
        'remark',
        'currency_rate',
        'conversion_rate',
        'currency_id',
    ];

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
