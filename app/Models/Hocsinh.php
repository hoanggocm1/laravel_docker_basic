<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hocsinh extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lop',
        'dtb',
        'phone',
        'active',
    ];
}
