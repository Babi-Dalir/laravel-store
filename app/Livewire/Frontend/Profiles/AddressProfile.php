<?php

namespace App\Livewire\Frontend\Profiles;

use App\Models\Address;
use Livewire\Component;

class AddressProfile extends Component
{
    public function render()
    {
        $user = auth()->user();
        $addresses = Address::query()->where('user_id',$user->id)->get();
        return view('livewire.frontend.profiles.address-profile',compact('addresses'));
    }
}
