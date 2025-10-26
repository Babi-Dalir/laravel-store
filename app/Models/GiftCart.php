<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiftCart extends Model
{
    protected $fillable = [
        'gift_title',
        'code',
        'gift_price',
        'user_id',
        'expiration_date',

    ];
}
