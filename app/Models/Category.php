<?php

namespace App\Models;

use App\Helpers\ImageManager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'e_name',
        'slug',
        'image',
        'parent_id',

    ];

    public function parentCategory()
    {
        return $this->belongsTo(self::class,'parent_id','id')->withDefault(['name'=>'دسته پدر']);
    }

    public function childCategory()
    {
        return $this->hasMany(self::class,'parent_id','id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public static function createCategory($request)
    {
        Category::query()->create([
            'name'=>$request->input('name'),
            'e_name'=>$request->input('e_name'),
            'slug'=>str()->slug($request->e_name),
            'image'=>ImageManager::saveImage('categories',$request->image),
            'parent_id'=>$request->input('parent_id'),

        ]);
    }
    public static function updateCategory($request,$category)
    {
        $category->update([
            'name'=>$request->input('name'),
            'e_name'=>$request->input('e_name'),
            'slug'=>str()->slug($request->e_name),
            'image'=>$request->image ? ImageManager::saveImage('categories',$request->image) : $category->image,
            'parent_id'=>$request->input('parent_id'),

        ]);
    }

    public static function getCategories()
    {
        $array = [];
        $categories = self::query()->with('childCategory')->where('parent_id',0)->get();
        foreach ($categories as $category1){
            $array[$category1->id] = $category1->name;
            foreach ($category1->childCategory as $category2){
                $array[$category2->id] = ' - '. $category2->name;
                foreach ($category2->childCategory as $category3){
                    $array[$category3->id] = ' - - ' .$category3->name;
                }
            }
        }
        return $array;
    }
    public static function getProductCategoryCount($id)
    {
        $sum = 0;
        $categories = self::query()->with('childCategory')->where('parent_id',$id)->get();
        foreach ($categories as $category1){
            foreach ($category1->childCategory as $category2){
               $sum += $category2->products()->count();
            }
        }
        return $sum;
    }
    protected static function boot()
    {
        parent::boot();
        self::deleting(function ($category){
            foreach ($category->childCategory()->withTrashed()->get() as $cat){
                if ($category->isForceDeleting()){
                    $cat->forcedelete();
                }else{
                    $cat->delete();
                }
            }
        });
        self::restoring(function ($category){
            foreach ($category->childCategory()->withTrashed()->get() as $cat){
                $cat->restore();
            }
        });
    }
}
