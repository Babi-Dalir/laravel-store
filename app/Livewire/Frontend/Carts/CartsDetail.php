<?php

namespace App\Livewire\Frontend\Carts;

use App\Models\UserCart;
use Livewire\Component;

class CartsDetail extends Component
{
    public $carts;

    public function increaseCart($product_id,$color_id,$guaranty_id)
    {
        $user_cart = UserCart::query()
            ->where('user_id',auth()->user()->id)
            ->where('product_id',$product_id)
            ->where('color_id',$color_id)
            ->where('guaranty_id',$guaranty_id)
            ->first();
        if ($user_cart){
            $user_cart->update([
                'count'=>$user_cart->count +1
            ]);
        }
    }
    public function decreaseCart($product_id,$color_id,$guaranty_id)
    {
        $user_cart = UserCart::query()
            ->where('user_id',auth()->user()->id)
            ->where('product_id',$product_id)
            ->where('color_id',$color_id)
            ->where('guaranty_id',$guaranty_id)
            ->first();
        if ($user_cart && $user_cart->count >0){
            $user_cart->update([
                'count'=>$user_cart->count -1
            ]);
        }else{
            $user_cart->delete();
        }
    }
    public function render()
    {
        return view('livewire.frontend.carts.carts-detail');
    }
}
