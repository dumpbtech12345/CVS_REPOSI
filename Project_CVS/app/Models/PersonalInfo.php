<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;





    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'linkedin_url',
        'address',

        // added this
        'image', //varchar255
        'Objective',  //varchar255
        'Facebook', //varchar255
        'BirthDate', // Date
        'Height', // DECI
        'weight',// DECI
        'Marital_Status',// VARCHAR255
      
    ];

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function CreatorResume()
    {
        return $this->hasMany(CreatorResume::class);
    }
}
