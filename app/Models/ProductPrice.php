<?php

namespace App\Models;

use App\Helpers\DateManager;
use App\Helpers\ImageManager;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $fillable = [
        'main_price',
        'price',
        'discount',
        'count',
        'max_sell',
        'product_id',
        'color_id',
        'guaranty_id',
        'spacial_start',
        'spacial_expiration',
        'status',
    ];

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function guaranty()
    {
        return $this->belongsTo(Guaranty::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function createProductPrice($request, $product_id)
    {
        $less_price = ProductPrice::query()->orderBy('price', "ASC")
            ->where('product_id', $product_id)->first();

        $price = ($request->input('main_price')) - (($request->input('main_price') * $request->input('discount')) / 100);

        ProductPrice::query()->create([
            'main_price' => $request->input('main_price'),
            'discount' => $request->input('discount'),
            'price' => $price,
            'count' => $request->input('count'),
            'max_sell' => $request->input('max_sell'),
            'product_id' => $product_id,
            'color_id' => $request->input('color_id'),
            'guaranty_id' => $request->input('guaranty_id'),
            'spacial_start' => $request->input('spacial_start') != null ? DateManager::shamsi_to_miladi($request->input('spacial_start')) : null,
            'spacial_expiration' => $request->input('spacial_expiration') != null ? DateManager::shamsi_to_miladi($request->input('spacial_expiration')) : null,
        ]);
        if ($less_price) {
            $product = Product::query()->find($product_id);
            if ($price < $less_price->price) {
                self::getUpdateProduct($product, $price, $request);
                self::getColors($product_id, $request, $product);
            } else {
                if ($product->guaranty_id == $request->input('guaranty_id')) {
                    self::getColors($product_id, $request, $product);
                }
            }
        } else {
            $product = Product::query()->find($product_id);
            self::getUpdateProduct($product, $price, $request);
            self::getColors($product_id, $request, $product);
        }
    }

    public static function updateProductPrice($request, $id, $product_id)
    {
        $less_price = ProductPrice::query()->orderBy('price', "ASC")
            ->where('product_id', $product_id)->first();

        $price = ($request->input('main_price')) - (($request->input('main_price') * $request->input('discount')) / 100);

        $product_price = ProductPrice::query()->find($id);
        $product_price->update([
            'main_price' => $request->input('main_price'),
            'discount' => $request->input('discount'),
            'price' => $price,
            'count' => $request->input('count'),
            'max_sell' => $request->input('max_sell'),
            'product_id' => $product_id,
            'color_id' => $request->input('color_id'),
            'guaranty_id' => $request->input('guaranty_id'),
            'spacial_start' => $request->input('spacial_start') != null ? DateManager::shamsi_to_miladi($request->input('spacial_start')) : null,
            'spacial_expiration' => $request->input('spacial_expiration') != null ? DateManager::shamsi_to_miladi($request->input('spacial_expiration')) : null,
        ]);

        $product = Product::query()->find($product_id);
        if ($price <= $less_price->price) {
            self::getUpdateProduct($product, $price, $request);
            self::getColors($product_id, $request, $product);
        } else {
            if ($product->guaranty_id == $request->input('guaranty_id')) {
                self::getColors($product_id, $request, $product);
            }
        }
    }

    public static function getColors($product_id, $request, $product)
    {
        $product_prices = ProductPrice::query()
            ->where('product_id', $product_id)
            ->where('guaranty_id', $request->input('guaranty_id'))->get();
        foreach ($product_prices as $product_price) {
            if ($product->colors()->where('color_id', $product_price->color_id)->exists()) {
                $product->colors()->sync($product_price->color_id);
            } else {
                $product->colors()->attach($product_price->color_id);
            }
        }
    }
    public static function getUpdateProduct($product, float|int $price, $request): void
    {
        $product->update([
            'price' => $price,
            'discount' => $request->input('discount'),
            'count' => $request->input('count'),
            'max_sell' => $request->input('max_sell'),
            'guaranty_id' => $request->input('guaranty_id'),
            'spacial_start' => $request->input('spacial_start') != null ? DateManager::shamsi_to_miladi($request->input('spacial_start')) : null,
            'spacial_expiration' => $request->input('spacial_expiration') != null ? DateManager::shamsi_to_miladi($request->input('spacial_expiration')) : null,
        ]);
    }
}
