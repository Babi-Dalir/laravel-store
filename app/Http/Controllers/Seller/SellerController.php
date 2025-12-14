<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Guaranty;
use App\Models\Seller;
use App\Models\Tag;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function sellerProductList()
    {
        $title = "لیست محصولات فروشنده";
        return view('seller.seller_products.list', compact('title'));
    }

    public function createSellerProduct()
    {
        $title = "ایجاد محصول توسط فروشنده";
        $categories = Category::getCategories();
        $brands = Brand::query()->pluck('name','id');
        $tags = Tag::query()->pluck('name','id');
        $guaranties = Guaranty::query()->pluck('name','id');
        $colors = Color::query()->pluck('name','id');
        return view('admin.sellers.create',compact('title','categories','brands','tags','guaranties','colors'));
    }
    public function storeSellerProduct(Request $request)
    {
        Seller::createSellerProduct($request);
        return redirect()->route('products.index')->with('message', 'محصول وارد شده توسط فروشنده با موفقیت ثبت شد');
    }
}
