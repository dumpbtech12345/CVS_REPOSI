<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreatorResume extends Model
{
    use HasFactory;

    protected $table = '_creator_resume';

    protected $fillable = [
        'personal_info_id',
        'CreatorResume',
        'Link',
        'Status',
        'application_link',
        'link_type',       // New field
        'scheduled_date',  // New field
        
    ];

    // Relationships
    public function personalInfo()
    {
        return $this->belongsTo(PersonalInfo::class);
    }


    // Relationships
    public function UserSystem()
    {
        return $this->belongsTo(UserSystem::class);
    }

   
}
