<?php

namespace App\Livewire\Admin\Depots;

use App\Models\DepotProduct;
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
    public $search, $search_depot;

    public function searchData()
    {
        $this->resetPage();
    }

    public function render()
    {
        $depot_products = DepotProduct::query()
            ->where('depot_id', $this->depot_id)
            ->whereHas('productPrice', function ($q) {
                $q->whereHas('product', function ($q) {
                    $q->where('name', 'like', '%' . $this->search_depot . '%');
                });
            })
            ->paginate(5);
        $product_prices = ProductPrice::query()
            ->whereHas('product', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate(5);
        return view('livewire.admin.depots.product-list', compact('product_prices','depot_products'));
    }
}
