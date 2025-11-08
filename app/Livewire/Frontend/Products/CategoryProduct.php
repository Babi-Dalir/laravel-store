<?php

namespace App\Livewire\Frontend\Products;

use App\Models\Category;
use Livewire\Component;

class CategoryProduct extends Component
{
    public $products;
    public $slug;
    public function mount()
    {
        $this->products = Category::getProductListByMainCategory($this->slug);
    }
    public function render()
    {
        return view('livewire.frontend.products.category-product');
    }
}
