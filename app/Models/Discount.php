<?php

namespace App\Models;

use App\Helpers\CreateUniqueCode;
use App\Helpers\DateManager;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'code',
        'discount',
        'status',
        'expiration_date',
    ];
    public static function createDiscount($request)
    {

        Discount::query()->create([
            'code' => CreateUniqueCode::generateRandomString(6,Discount::class),
            'discount' => $request->input('discount'),
            'expiration_date' =>DateManager::shamsi_to_miladi($request->input('expiration_date'))

        ]);
    }

    public static function calculateDiscount($shop_data,$total_price,$discount_code_price)
    {
        $discount = Discount::query()
            ->where('code',$shop_data['discount_code'])
            ->where('discount','>',0)
            ->first();
        if ($discount){
            $total_price -= $discount->discount;
            $discount_code_price = $discount->discount;
        }
        return [
            'total_price'=>$total_price,
            'discount_code_price'=>$discount_code_price,
        ];
    }
}
