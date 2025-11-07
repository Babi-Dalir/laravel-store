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
        $categoryList = [];
        $category = Category::query()->where('slug',$slug)->first();
        foreach ($category->childCategory()->get() as $category1){
            if (sizeof($category1->childCategory) > 0){
                foreach ($category1->childCategory()->get() as $category2){
                    array_push($categoryList,$category2->id);
                }
            }
        }
        dd($categoryList);
    }
}
