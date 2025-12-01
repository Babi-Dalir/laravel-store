<?php

namespace App\Http\Controllers\FrontEnd;

use App\Helpers\ImageManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('frontend.profile.profile',compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $user = auth()->user();
        $user->update([
            'name' => $request->input('name'),
            'user_name' => $request->input('user_name'),
            'mobile' => $user->mobile == null ? $request->input('mobile') : $user->mobile,
            'email' => $user->email == null ? $request->input('email') : $user->email,
            'image'=>ImageManager::saveImage('users',$request->image),
        ]);
        return redirect()->back()->with('message', "اطلاعات شما با موفقیت ویرایش شد");
    }

    public function profileOrders()
    {
        return view('frontend.profile.profile_orders');
    }
    public function profileOrdersDetails()
    {
        return view('frontend.profile.profile_order_details');
    }
    public function profileFavorites()
    {
        return view('frontend.profile.profile_favorites');
    }
    public function profileComments()
    {
        return view('frontend.profile.profile_comments');
    }
    public function profileAddresses()
    {
        return view('frontend.profile.profile_addresses');
    }
}
