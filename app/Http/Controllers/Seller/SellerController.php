<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function sellerProductList()
    {
        $title = "لیست محصولات فروشنده";
        return view('seller.seller_products.list', compact('title'));
    }
}
