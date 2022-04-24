<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoAdmin extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'full_name_admin',
        'phone_admin',
        'avatar_admin',
        'email_admin',
        'address',
        'education',
        'skills',
        'position',
        'description',
        'year_of_birth',
    ];
}
