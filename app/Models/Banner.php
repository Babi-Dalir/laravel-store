<?php

namespace App\Models;

use App\Helpers\ImageManager;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'image',
        'type'
    ];
    public static function createBanner($request)
    {
        Banner::query()->create([
            'type'=>$request->input('type'),
            'image'=>ImageManager::saveImage('banners',$request->image)
        ]);
    }
    public static function updateBanner($request,$id)
    {
        $banner = Banner::query()->find($id);
        $banner->update([
            'type'=>$request->input('type'),
            'image'=>$request->image ? ImageManager::saveImage('banners',$request->image) : $banner->image
        ]);
    }
}
