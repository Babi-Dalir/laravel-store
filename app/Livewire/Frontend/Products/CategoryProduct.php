<?php

namespace App\Livewire\Frontend\Products;

use App\Models\Category;
use Livewire\Component;

class CategoryProduct extends Component
{
    public $products;
    public $main_slug;
    public $sub_slug;
    public $child_slug;
    public $more_viewed;
    public function mount()
    {
        $this->products = Category::getProductByCategory($this->main_slug,$this->sub_slug,$this->child_slug,'id','DESC');
        $this->more_viewed=[];
    }

    public function moreViewedProducts()
    {
        $this->products = [];
        $this->more_viewed = Category::getProductByCategory($this->main_slug,$this->sub_slug,$this->child_slug,'viewed','DESC');
    }
    public function render()
    {
        return view('livewire.frontend.products.category-product');
    }
}
