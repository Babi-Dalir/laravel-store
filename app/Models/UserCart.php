<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'color_id',
        'guaranty_id',
        'count',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function guaranty()
    {
        return $this->belongsTo(Guaranty::class);
    }
}
