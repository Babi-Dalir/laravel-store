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
}
