<?php

namespace App\Livewire\Admin\Depots;

use App\Models\Product;
use App\Models\ProductPrice;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;
    public $depot_id;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public function searchData()
    {
        $this->resetPage();
    }

    public function render()
    {
        $product_prices = ProductPrice::query()
            ->paginate(10);
        return view('livewire.admin.depots.product-list', compact('product_prices'));
    }
}
