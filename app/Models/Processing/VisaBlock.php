<?php

namespace App\Models\Processing;

use Illuminate\Database\Eloquent\Model;
use App\Models\Licence;
use App\Models\VisaProfession;
use App\Models\Sponsor;
use App\Models\Company;
use App\Models\User;


class VisaBlock extends Model
{
    protected $fillable = [
        'date',
        'company_id',
        'block_number',
        'sponsor_id',
        'alwaka_no',
        'quantity',
        'visa_profession',
        'licence_id',
        'user_id',
        'active',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function sponsor()
    {
        return $this->belongsTo(Sponsor::class);
    }

    public function profession()
    {
        return $this->belongsTo(VisaProfession::class, 'visa_profession');
    }

    public function licence()
    {
        return $this->belongsTo(Licence::class, 'licence_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
