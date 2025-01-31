<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';
    
    protected $fillable = [
        'personal_info_id',
        'name',
        'degree',
        'school_name',
        'Educlevel',
        'start_date',
        'graduation_date',


    ];

    public function personalInfo()
    {
        return $this->belongsTo(PersonalInfo::class);
    }
}
