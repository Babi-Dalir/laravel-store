<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'address_id',
        'order_code',
        'status',
        'transaction_id',
        'total_price',
        'receive_day',
        'receive_time',
        'send_type',
        'discount_price',
        'discount_code',
        'gift_cart_price',
        'gift_cart_code',
        'post_number',
        'payment_type',
    ];
}
