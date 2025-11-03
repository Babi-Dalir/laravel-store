<?php

namespace App\Models;

use App\Enums\CartType;
use App\Enums\OrderDetailStatus;
use App\Enums\OrderStatus;
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

    public static function createOrder($user,$address,$total_price,$shop_data,$discount_code_price,$gif_cart_code_price)
    {
        return Order::query()->create([
            'user_id'=>$user->id,
            'address_id'=>$address->id,
            'order_code'=>rand(11111,99999),
            'status'=>OrderStatus::WaitPayment->value,
            'total_price'=>$total_price,
            'receive_day'=>$shop_data['receive_day'],
            'receive_time'=>$shop_data['receive_time'],
            'send_type'=>$shop_data['send_type'],
            'discount_price'=>$discount_code_price,
            'discount_code'=>$shop_data['discount_code'],
            'gift_cart_price'=>$gif_cart_code_price,
            'gift_cart_code'=>$shop_data['gift_cart_code'],
            'payment_type'=>$shop_data['payment_type'],
        ]);
    }

    public static function successPayment($order,$order_details)
    {
        $order->update([
            'status'=>OrderStatus::Payed->value
        ]);
        foreach ($order_details as $order_detail){
            $order_detail->update([
                'status'=>OrderDetailStatus::Received->value
            ]);

            $product_price = ProductPrice::query()
                ->where('product_id',$order_detail->product_id)
                ->where('color_id',$order_detail->color_id)
                ->where('guaranty_id',$order_detail->guaranty_id)
                ->first();
            $product_price->decrement('count',$order_detail->count);

            $product = Product::query()->find($order_detail->product_id);
            $product->increment('sold',$order_detail->count);
        }
        $carts = UserCart::query()
            ->where('user_id',$order->user_id)
            ->where('type',CartType::Main->value)->get();
        foreach ($carts as $cart){
            $cart->delete();
        }
    }
}
