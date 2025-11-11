<?php

namespace App\Livewire\Frontend\Products;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;

class FilterProduct extends Component
{
    public $main_slug;
    public $sub_slug;
    public $child_slug;
    public $brands;
    public function mount()
    {
        $products = Category::getProductByCategory($this->main_slug, $this->sub_slug, $this->child_slug, 'id', 'DESC', null);
        $brandList = [];
        foreach ($products as $product){
            if (!in_array($product->brand_id,$brandList)){
                array_push($brandList,$product->brand_id);
            }
        }
        $this->brands = Brand::query()->whereIn('id',$brandList)->get();
    }
    public function render()
    {
        return view('livewire.frontend.products.filter-product');
    }
}
