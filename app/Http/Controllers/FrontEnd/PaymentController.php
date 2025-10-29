<?php

namespace App\Http\Controllers\FrontEnd;

use App\Enums\CartType;
use App\Enums\OrderDetailStatus;
use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductPrice;
use App\Models\UserCart;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment()
    {
        $user = auth()->user();
        $address = Address::query()
            ->where('user_id',$user->id)
            ->where('is_default',true)
            ->first();

        $carts = UserCart::query()
            ->where('user_id',$user->id)
            ->where('type',CartType::Main->value)->get();
        $total_price = 0;
        $discount_price = 0;
        foreach ($carts as $cart){
            $product_price = ProductPrice::query()
                ->where('product_id',$cart->product_id)
                ->where('color_id',$cart->color_id)
                ->where('guaranty_id',$cart->guaranty_id)
                ->first();
            $total_price += ($product_price->price) * $cart->count;
            $discount_price += ($product_price->main_price - $product_price->price) * $cart->count;
        }
        $order = Order::query()->create([
            'user_id'=>$user->id,
            'address_id'=>$address->id,
            'order_code'=>rand(11111,99999),
            'status'=>OrderStatus::WaitPayment->value,
            'total_price'=>$total_price,
            'receive_day',
            'receive_time',
            'send_type',
            'discount_price',
            'discount_code',
            'gift_cart_price',
            'gift_cart_code',
            'payment_type',
        ]);
        foreach ($carts as $cart){
            $product_price = ProductPrice::query()
                ->where('product_id',$cart->product_id)
                ->where('color_id',$cart->color_id)
                ->where('guaranty_id',$cart->guaranty_id)
                ->first();
            OrderDetail::query()->create([
                'order_id'=>$order->id,
                'product_id'=>$cart->product_id,
                'color_id'=>$cart->color_id,
                'guaranty_id'=>$cart->guaranty_id,
                'main_price'=>$product_price->main_price,
                'price'=>$product_price->price,
                'discount'=>$product_price->discount,
                'count'=>$cart->count,
                'status'=>OrderDetailStatus::Waiting->value,
            ]);
        }
    }
    public function callback()
    {

    }
}
