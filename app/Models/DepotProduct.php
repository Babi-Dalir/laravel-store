<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepotProduct extends Model
{
    protected $fillable = [
        'depot_id',
        'product_price_id',
        'count',
    ];
}
