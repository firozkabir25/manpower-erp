<?php

namespace App\Models\Processing;

use Illuminate\Database\Eloquent\Model;
use App\Models\{Company, Country, ForeignAgent, User, Source, AccCostCenter, Currency, Branch};
use App\Models\Profession;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'country_id',
        'foreign_agent_id',
        'total_visa',
        'start_date',
        'document_receive_date',
        'profession_id',
        'visa_block',
        'description',
        'name',
        'reference',
        'project',
        'cost_center_id',
        'project_code',
        'type',
        'doc_date',
        'currency_id',
        'source_id',
        'br_id',
        'active',
        'user_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function foreignAgent()
    {
        return $this->belongsTo(ForeignAgent::class);
    }

    public function costCenter()
    {
        return $this->belongsTo(AccCostCenter::class, 'cost_center_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'br_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function salesPrices()
    {
        return $this->hasMany(SalesPrice::class);
    }

    public function visaCosts()
    {
        return $this->hasMany(VisaCost::class, 'visa_project_id');
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }
}
