<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('frontend.profile.profile');
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
    public function profileAddresses()
    {
        return view('frontend.profile.profile_addresses');
    }
}
