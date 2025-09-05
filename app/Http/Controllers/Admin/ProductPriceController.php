<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductPriceRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Guaranty;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($product_id)
    {
        $title = "لیست تنوع قیمت محصول";
        return view('admin.product_prices.list', compact('title','product_id'));
    }

    /**\
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $title = "ایجاد تنوع قیمت محصول";
       $colors = Color::query()->pluck('name','id');
       $product = Product::query()->find($id);
       $guaranties = Guaranty::query()->pluck('name','id');
        return view('admin.product_prices.create',compact('title','colors','guaranties','product'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductPriceRequest $request,$product_id)
    {
        ProductPrice::createProductPrice($request,$product_id);
        return redirect()->route('products.index')->with('message', ' تنوع قیمت محصول جدید با موفقیت ایجاد شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title ="ویرایش تنوع قیمت محصول";
        $categories = Category::getCategories();
        $brands = Brand::query()->pluck('name','id');
        $tags = Tag::query()->pluck('name','id');
        $product = Product::findOrfail($id);
        return view('admin.product_prices.edit',compact('title','categories','brands','tags','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Product::updateProduct($request,$id);
        return redirect()->route('products.index')->with('message', ' تنوع قیمت محصول  با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
