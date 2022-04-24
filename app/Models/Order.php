<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [

        'customer_id',
        'shipping_id',
        'order_method',
        'order_status',
        'loai_mathang',
        'price',
        'order_time',
    ];

    public function detailOrder()
    {
        return $this->hasMany(Order_detail::class, 'order_id', 'id')->get();
    }
    public function shippingOrder()
    {
        return $this->hasMany(Shipping_order::class, 'order_id', 'id')->get();
    }
}
