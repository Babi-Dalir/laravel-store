<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'question',
        'parent_id',
        'status'

    ];
}
