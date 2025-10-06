<?php

namespace App\Livewire\Frontend\Products;

use App\Models\ProductPrice;
use Livewire\Component;

class SingleProduct extends Component
{
    public $product;

    public function changeColorProduct()
    {
        dd("hi");
    }
    public function render()
    {
        $product_price = ProductPrice::query()->where('product_id',$this->product->id)->orderBy('price','ASC')->first();
        return view('livewire.frontend.products.single-product',compact('product_price'));
    }
}
