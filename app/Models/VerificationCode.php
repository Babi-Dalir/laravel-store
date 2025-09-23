<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    protected $fillable = [
        'mobile',
        'email',
        'code',

    ];

    public static function checkTimeCode($entry)
    {
        $check = self::query()
            ->where('mobile',$entry)
            ->orWhere('email',$entry)
            ->where('created_at','<',Carbon::now()->subMinute(2))
            ->first();
        if ($check){
            return true;
        }
        return false;
    }

    public static function createVerificationCode($entry,$code)
    {
        self::query()->create([
            'mobile'=>$entry,
            'code'=>$code
        ]);
    }

    public static function checkVerificationCode($entry,$code)
    {
        $check = self::query()
            ->where('mobile',$entry)
            ->orWhere('email',$entry)
            ->where('code',$code)
            ->first();
        if ($check){
            return true;
        }
        return false;
    }
}
