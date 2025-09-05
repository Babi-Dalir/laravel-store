<?php

namespace App\Livewire\Admin\ProductPrices;

use App\Helpers\DateManager;
use App\Models\Product;
use App\Models\ProductPrice;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ProductPriceList extends Component
{
    use WithPagination;

    public $product_id;

    protected $paginationTheme = 'bootstrap';
    public $search;

    #[On('destroy_product_price')]
    public function destroyProductPrice($product_price_id)
    {
        $product_price = ProductPrice::query()->find($product_price_id);
        $product_id = $product_price->product_id;
        $product_price->delete();
        $less_price = ProductPrice::query()->orderBy('price', "ASC")
            ->where('product_id', $product_id)->first();

        $product = Product::query()->find($product_id);
        if ($less_price) {
            $product->update([
                'price' => $less_price->price,
                'discount' => $less_price->discount,
                'count' => $less_price->count,
                'max_sell' => $less_price->max_sell,
                'guaranty_id' => $less_price->guaranty_id,
                'is_spacial' => $less_price->is_spacial !=null ? $less_price->is_spacial : false,
                'special_expiration' => $less_price->special_expiration,
            ]);
        } else {
            $product->update([
                'price' => 0,
                'discount' => 0,
                'count' => 0,
                'max_sell' => null,
                'guaranty_id' => null,
                'is_spacial' => false,
                'special_expiration' => null,
            ]);
        }
        $colors = [];
        if ($less_price){
            $product_prices = ProductPrice::query()
                ->where('product_id', $product_id)
                ->where('guaranty_id', $less_price->guaranty_id)->get();
            foreach ($product_prices as $product_price) {
                array_push($colors, $product_price->color_id);
            }
            $product->colors()->sync($colors);
        }
    }

    public function searchData()
    {
        $this->resetPage();
    }

    public function render()
    {
        $product_id = $this->product_id;
        $product_prices = ProductPrice::query()->where('product_id', $this->product_id)
            ->paginate(10);
        return view('livewire.admin.product-prices.product-price-list', compact('product_prices', 'product_id'));
    }
}
