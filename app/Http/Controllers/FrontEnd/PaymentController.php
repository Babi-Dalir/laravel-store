<?php

namespace App\Http\Controllers\FrontEnd;

use App\Enums\CartType;
use App\Http\Controllers\Controller;
use App\Models\Address;
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
    }
    public function callback()
    {

    }
}
