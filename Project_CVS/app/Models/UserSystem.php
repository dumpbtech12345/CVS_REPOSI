<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSystem extends Model
{
    use HasFactory;

    protected $table = 'user_system';

    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'password',
        'email',
        'number',
        'role', 
    ];

    protected $hidden = [
        'password', // Ensure the password is not returned when the model is serialized
    ];

    public function CreatorResumes()
    {
        return $this->hasMany(CreatorResume::class);
    }


   
}
