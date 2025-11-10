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
    public $newest;
    public $more_sold;
    public $cheapest;
    public $most_expensive;
    public function mount()
    {
        $this->products = Category::getProductByCategory($this->main_slug,$this->sub_slug,$this->child_slug,'id','DESC');
        $this->more_viewed=[];
        $this->newest=[];
        $this->more_sold=[];
        $this->cheapest=[];
        $this->most_expensive=[];
    }

    public function allProducts()
    {
        $this->products = Category::getProductByCategory($this->main_slug,$this->sub_slug,$this->child_slug,'id','DESC');
        $this->more_viewed=[];
        $this->newest=[];
        $this->more_sold=[];
        $this->cheapest=[];
        $this->most_expensive=[];
    }
    public function moreViewedProducts()
    {
        $this->products = [];
        $this->more_viewed = Category::getProductByCategory($this->main_slug,$this->sub_slug,$this->child_slug,'viewed','DESC');
        $this->newest=[];
        $this->more_sold=[];
        $this->cheapest=[];
        $this->most_expensive=[];
    }

    public function newestProducts()
    {
        $this->products = [];
        $this->more_viewed=[];
        $this->newest=Category::getProductByCategory($this->main_slug,$this->sub_slug,$this->child_slug,'created_at','DESC');;
        $this->more_sold=[];
        $this->cheapest=[];
        $this->most_expensive=[];
    }

    public function moreSoldProducts()
    {
        $this->products = [];
        $this->more_viewed=[];
        $this->newest=[];
        $this->more_sold=Category::getProductByCategory($this->main_slug,$this->sub_slug,$this->child_slug,'sold','DESC');;
        $this->cheapest=[];
        $this->most_expensive=[];
    }

    public function cheapestProducts()
    {
        $this->products = [];
        $this->more_viewed=[];
        $this->newest=[];
        $this->more_sold=[];
        $this->cheapest=Category::getProductByCategory($this->main_slug,$this->sub_slug,$this->child_slug,'price','ASC');;
        $this->most_expensive=[];
    }

    public function mostExpensiveProducts()
    {
        $this->products = [];
        $this->more_viewed=[];
        $this->newest=[];
        $this->more_sold=[];
        $this->cheapest=[];
        $this->most_expensive=Category::getProductByCategory($this->main_slug,$this->sub_slug,$this->child_slug,'price','DESC');
    }
    public function render()
    {
        return view('livewire.frontend.products.category-product');
    }
}
