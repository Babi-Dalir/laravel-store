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
    public function mount()
    {
        if ($this->main_slug != null && $this->sub_slug == null && $this->child_slug == null){
        $this->products = Category::getProductListByMainCategory($this->main_slug);
    }elseif ($this->main_slug == null && $this->sub_slug != null && $this->child_slug == null){
            $this->products = Category::getProductListBySubCategory($this->sub_slug);
        }elseif ($this->main_slug == null && $this->sub_slug != null && $this->child_slug != null){
            $this->products = Category::getProductListByChildCategory($this->child_slug);
        }

    }
    public function render()
    {
        return view('livewire.frontend.products.category-product');
    }
}
