<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }
}
