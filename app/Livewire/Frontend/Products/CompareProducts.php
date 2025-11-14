<?php

namespace App\Livewire\Frontend\Products;

use Livewire\Component;

class CompareProducts extends Component
{
    public $product_id_1;
    public $product_id_2;
    public function render()
    {
        return view('livewire.frontend.products.compare-products');
    }
}
