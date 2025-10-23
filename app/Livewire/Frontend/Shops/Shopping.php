<?php

namespace App\Livewire\Frontend\Shops;

use App\Enums\CartType;
use App\Models\Address;
use App\Models\ProductPrice;
use App\Models\UserCart;
use Carbon\Carbon;
use Livewire\Component;

class Shopping extends Component
{
    public $send_type;
    public $receive_time;
    public $factor=false;
    public $receive_day;
    public $selected_address;
    public $send_price;
    public $send_time;
    public $selected_day_index=0;
    protected $listeners=[
        'refreshAddressList'=>'$refresh'
    ];
    protected $rules =[
        'send_type'=>'required',
        'receive_time'=>'required|sometimes'
    ];

    public function mount()
    {
        $this->receive_day = Carbon::now()->addDays($this->send_time);
    }

    public function receiveDay($i)
    {
        $this->selected_day_index =$i;
        $this->receive_day = Carbon::now()->addDays($i + $this->send_time);
    }
    public function submitCountinueOrder()
    {
        $this->validate();
        dd($this->receive_day,$this->receive_time);
    }
    public function render()
    {
        $addresses = Address::query()
            ->where('user_id',auth()->user()->id)
            ->orderByDesc('is_default')
            ->get();
        $this->selected_address = Address::query()
            ->where('user_id',auth()->user()->id)
            ->where('is_default',true)
            ->first();

        $this->send_price = $this->selected_address->city->send_price;
        $this->send_time = $this->selected_address->city->send_time;

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
