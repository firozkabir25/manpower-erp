<?php

namespace App\Models\Processing;

use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\Profession;
use App\Models\LocalAgent;
use App\Models\District;
use App\Models\User;
use App\Models\Processing\Project;

class Worker extends Model
{
    protected $fillable = [
        'date',
        'project_id',
        'interview_ref',
        'passport_no',
        'name',
        'fathers_name',
        'mothers_name',
        'date_of_birth',
        'passport_issue_date',
        'passport_expire_date',
        'birth_place',
        'working_profession_id',
        'country_id',
        'grade',
        'basic_salary',
        'overseas_experiance',
        'religion',
        'user_id',
        'nationality',
        'district_id',
        'local_experience',
        'address',
        'local_agent_id',
        'gender',
        'note',
        'contact',
        'pp_issue_place',
        'marital_status',
        'education',
        'selection_type',
        'sales_edition',
        'visa_edition',
        'year',
        'active',
        'pob',
        'picture',
        'passport_copy',
        'vaccin_card',
        'visa_copy',
        'special_offer',
        'remarks_on_offer',
        'project_code',
        'pc_issue_date',
        'medical_date',
        'medical_result',
        'gross_salary',
        'worker_type',
        'skill_certificate',
        'pc_number',
        'pc_date',
        'medical_status',
        'salesedition_price',
        'contact_number',
    ];

    // protected $casts = [
    //     'date' => 'date',
    //     'dob' => 'date',
    //     'pp_issue_date' => 'date',
    //     'pp_expire_date' => 'date',
    //     'pc_issue_date' => 'date',
    //     'pc_date' => 'date',
    //     'medical_date' => 'date',
    //     'basic_salary' => 'decimal:4',
    //     'gross_salary' => 'decimal:4',
    //     'special_offer' => 'decimal:4',
    //     'salesedition_price' => 'decimal:4',
    // ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function profession()
    {
        return $this->belongsTo(Profession::class, 'working_profession_id', 'id');
    }

    public function localAgent()
    {
        return $this->belongsTo(LocalAgent::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
