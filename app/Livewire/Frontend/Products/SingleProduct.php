<?php

namespace App\Livewire\Frontend\Products;

use App\Models\ProductPrice;
use Livewire\Component;

class SingleProduct extends Component
{
    public $product;
    public $product_price;

    public function mount()
    {
        $this->product_price = ProductPrice::query()->where('product_id',$this->product->id)->orderBy('price','ASC')->first();
    }
    public function changeColorProduct($color_id)
    {
        $this->product_price = ProductPrice::query()
            ->where('product_id',$this->product->id)
            ->where('color_id',$color_id)
            ->orderBy('price','ASC')
            ->first();
    }
    public function render()
    {
        return view('livewire.frontend.products.single-product');
    }
}
