<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'customer_password',
        'address',

    ];
    public function Order()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id')->orderByDesc('id')->get();
    }
}
