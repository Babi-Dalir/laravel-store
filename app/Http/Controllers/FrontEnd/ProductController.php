<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function singleProduct($slug)
    {
        $product = Product::query()
            ->with(['category','brand','colors','tags','properties','propertyGroups','productPrices'])
            ->where('slug',$slug)->first();
        return view('frontend.single_product',compact('product'));
    }

    public function mainCategoryProductList($slug)
    {

        return view('frontend.category_product_list', compact('slug'));
    }
}
