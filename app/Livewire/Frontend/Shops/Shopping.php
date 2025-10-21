<?php

namespace App\Livewire\Frontend\Shops;

use App\Enums\CartType;
use App\Models\Address;
use App\Models\ProductPrice;
use App\Models\UserCart;
use Livewire\Component;

class Shopping extends Component
{
    protected $listeners=[
        'refreshAddressList'=>'$refresh'
    ];
    public function render()
    {
        $addresses = Address::query()
            ->where('user_id',auth()->user()->id)
            ->orderByDesc('is_default')
            ->get();
        $carts = UserCart::query()->where('type',CartType::Main->value)->get();
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
        return view('livewire.frontend.shops.shopping',compact('carts','total_price','discount_price','addresses'));
    }
}
