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
    public $page=1;
    private $products;
    private $more_viewed;
    private $newest;
    private $more_sold;
    private $cheapest;
    private $most_expensive;
    protected $listeners=[
        'filterProducts'
    ];

    public function mount()
    {
        $this->products = Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug, 'id', 'DESC', $this->page);
        $this->more_viewed = [];
        $this->newest = [];
        $this->more_sold = [];
        $this->cheapest = [];
        $this->most_expensive = [];
    }

    public function allProducts()
    {
        $this->products = Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug, 'id', 'DESC', $this->page);
        $this->more_viewed = [];
        $this->newest = [];
        $this->more_sold = [];
        $this->cheapest = [];
        $this->most_expensive = [];
    }

    public function moreViewedProducts()
    {
        $this->products = [];
        $this->more_viewed = Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug, 'viewed', 'DESC', $this->page);
        $this->newest = [];
        $this->more_sold = [];
        $this->cheapest = [];
        $this->most_expensive = [];
    }

    public function newestProducts()
    {
        $this->products = [];
        $this->more_viewed = [];
        $this->newest = Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug, 'created_at', 'DESC', $this->page);;
        $this->more_sold = [];
        $this->cheapest = [];
        $this->most_expensive = [];
    }

    public function moreSoldProducts()
    {
        $this->products = [];
        $this->more_viewed = [];
        $this->newest = [];
        $this->more_sold = Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug, 'sold', 'DESC', $this->page);;
        $this->cheapest = [];
        $this->most_expensive = [];
    }

    public function cheapestProducts()
    {
        $this->products = [];
        $this->more_viewed = [];
        $this->newest = [];
        $this->more_sold = [];
        $this->cheapest = Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug, 'price', 'ASC', $this->page);;
        $this->most_expensive = [];
    }

    public function mostExpensiveProducts()
    {
        $this->products = [];
        $this->more_viewed = [];
        $this->newest = [];
        $this->more_sold = [];
        $this->cheapest = [];
        $this->most_expensive = Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug, 'price', 'DESC', $this->page);
    }

    public function changePage($page, $index)
    {
        $this->page = $page;
        switch ($index) {
            case 1:
                $this->allProducts();
                break;
            case 2:
                $this->moreViewedProducts();
                break;
            case 3:
                $this->newestProducts();
                break;
            case 4:
                $this->moreSoldProducts();
                break;
            case 5:
                $this->cheapestProducts();
                break;
            case 6:
                $this->mostExpensiveProducts();
                break;
            default:
                $this->allProducts();
        }
    }

    public function filterProducts($brands,$guaranties,$colors)
    {
        if ($this->main_slug) {
            $this->products = Category::getProductListByMainCategory($this->main_slug, 'id', 'DESC', $this->page,$brands,$guaranties,$colors);
        } elseif ($this->sub_slug) {
            $this->products = Category::getProductListBySubCategory($this->sub_slug, 'id', 'DESC', $this->page,$brands,$guaranties,$colors);
        } elseif ($this->child_slug) {
            $this->products = Category::getProductListByChildCategory($this->child_slug, 'id', 'DESC', $this->page,$brands,$guaranties,$colors);
        }
        $this->more_viewed = [];
        $this->newest = [];
        $this->more_sold = [];
        $this->cheapest = [];
        $this->most_expensive = [];
    }

    public function render()
    {
        $products = $this->products;
        $more_viewed = $this->more_viewed;
        $newest = $this->newest;
        $more_sold = $this->more_sold;
        $cheapest = $this->cheapest;
        $most_expensive = $this->most_expensive;
        return view('livewire.frontend.products.category-product', compact('products', 'more_viewed', 'newest', 'more_sold', 'cheapest', 'most_expensive'));
    }
}
