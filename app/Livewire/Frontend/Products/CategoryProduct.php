<?php

namespace App\Livewire\Frontend\Products;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryProduct extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $main_slug;
    public $sub_slug;
    public $child_slug;
    private $products;
    private $more_viewed;
    private $newest;
    private $more_sold;
    private $cheapest;
    private $most_expensive;
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
        $products = $this->products;
        $more_viewed = $this->more_viewed;
        $newest = $this->newest;
        $more_sold = $this->more_sold;
        $cheapest = $this->cheapest;
        $most_expensive = $this->most_expensive;
        return view('livewire.frontend.products.category-product',compact('products','more_viewed','newest','more_sold','cheapest','most_expensive'));
    }
}
