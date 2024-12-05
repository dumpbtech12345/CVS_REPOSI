<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $table = 'certificates';

    protected $fillable = [
        'personal_info_id',
        'name',
        'issuing_organization',
        'issue_date',
    ];

    /**
     * Define a relationship to the PersonalInfo model.
     */
    public function personalInfo()
    {
        return $this->belongsTo(PersonalInfo::class);
    }
}

