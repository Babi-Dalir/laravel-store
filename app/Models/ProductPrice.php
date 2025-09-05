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
        'is_spacial',
        'special_expiration',
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
    public static function createProductPrice($request,$product_id)
    {
        $less_price = ProductPrice::query()->orderBy('price',"ASC")
            ->where('product_id',$product_id)->first();

        $price = ($request->input('main_price')) - (($request->input('main_price') * $request->input('discount')) / 100);

        $product_price = ProductPrice::query()->create([
            'main_price'=>$request->input('main_price'),
            'discount'=>$request->input('discount'),
            'price'=> $price,
            'count'=>$request->input('count'),
            'max_sell'=>$request->input('max_sell'),
            'product_id'=>$product_id,
            'color_id'=>$request->input('color_id'),
            'guaranty_id'=>$request->input('guaranty_id'),
            'is_spacial'=>$request->input('is_spacial') == "on" ? true : false,
            'special_expiration'=> $request->input('is_spacial') == "on" ? DateManager::shamsi_to_miladi($request->input('special_expiration')) : null,
        ]);
        if ($less_price){
            if ($price < $less_price->price){
                $product = Product::query()->find($product_id);
                $product->update([
                    'price'=>$price,
                    'discount'=>$request->input('discount'),
                    'count'=>$request->input('count'),
                    'max_sell'=>$request->input('max_sell'),
                    'guaranty_id'=>$request->input('guaranty_id'),
                    'is_spacial'=>$request->input('is_spacial') == "on" ? true : false,
                    'special_expiration'=> $request->input('is_spacial') == "on" ? DateManager::shamsi_to_miladi($request->input('special_expiration')) : null,
                ]);
                $colors = [];
                $product_prices = ProductPrice::query()
                    ->where('product_id',$product_id)
                    ->where('guaranty_id',$request->input('guaranty_id'))->get();
                foreach ($product_prices as $product_price){
                    array_push($colors,$product_price->color_id);
                }
                $product->colors()->sync($colors);
            }
        }else {
            $product = Product::query()->find($product_id);
            $product->update([
                'price' => $price,
                'discount' => $request->input('discount'),
                'count' => $request->input('count'),
                'max_sell' => $request->input('max_sell'),
                'guaranty_id' => $request->input('guaranty_id'),
                'is_spacial' => $request->input('is_spacial') == "on" ? true : false,
                'special_expiration' => $request->input('is_spacial') == "on" ? DateManager::shamsi_to_miladi($request->input('special_expiration')) : null,
            ]);
            $colors = [];
            $product_prices = ProductPrice::query()
                ->where('product_id', $product_id)
                ->where('guaranty_id', $request->input('guaranty_id'))->get();
            foreach ($product_prices as $product_price) {
                array_push($colors, $product_price->color_id);
            }
            $product->colors()->sync($colors);
        }
    }

    public static function updateProductPrice($request,$id)
    {

    }
}
