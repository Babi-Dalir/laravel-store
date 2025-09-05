<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    #[On('destroy_product')]
    public function destroyProduct($id)
    {
        Product::destroy($id);
    }

    public function searchData()
    {
        $this->resetPage();
    }
    public function render()
    {
        $products = Product::query()
            ->where('name','like','%'.$this->search.'%')
            ->orWhere('e_name','like','%'.$this->search.'%')
            ->paginate(10);
        return view('livewire.admin.products.product-list',compact('products'));
    }
}
