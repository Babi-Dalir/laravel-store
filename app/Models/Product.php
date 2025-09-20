<?php

namespace App\Models;


use App\Enums\CommentStatus;
use App\Helpers\ImageManager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'e_name',
        'slug',
        'price',
        'discount',
        'count',
        'max_sell',
        'viewed',
        'sold',
        'image',
        'guaranty_id',
        'description',
        'spacial_start',
        'spacial_expiration',
        'status',
        'category_id',
        'brand_id',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_product');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function propertyGroups()
    {
        return $this->belongsToMany(PropertyGroup::class, 'product_property_group');
    }
    public function productPrices()
    {
        return $this->hasMany(ProductPrice::class);
    }
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function guaranty()
    {
        return $this->belongsTo(Guaranty::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function approvedComments()
    {
        return $this->morphMany(Comment::class, 'commentable')->where('status',CommentStatus::Approved->value);
    }
    public static function createProduct($request)
    {
        $product = Product::query()->create([
            'name'=>$request->input('name'),
            'e_name'=>$request->input('e_name'),
            'slug'=>str()->slug($request->e_name),
            'description'=>$request->input('description'),
            'category_id'=>$request->input('category_id'),
            'brand_id'=>$request->input('brand_id'),
            'image'=>ImageManager::saveImage('products',$request->image),
        ]);
        $product->tags()->attach($request->tags);
    }

    public static function updateProduct($request,$id)
    {
        $product = Product::query()->find($id);
            $product->update([
            'name'=>$request->input('name'),
            'e_name'=>$request->input('e_name'),
            'slug'=>str()->slug($request->e_name),
            'description'=>$request->input('description'),
            'category_id'=>$request->input('category_id'),
            'brand_id'=>$request->input('brand_id'),
            'image'=>$request->image ? ImageManager::saveImage('products',$request->image) : $product->image,
        ]);
        $product->tags()->sync($request->tags);
    }
}
