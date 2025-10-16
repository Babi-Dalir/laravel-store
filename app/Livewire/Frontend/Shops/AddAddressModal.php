<?php

namespace App\Livewire\Frontend\Shops;

use App\Models\Address;
use App\Models\City;
use App\Models\Province;
use Livewire\Component;

class AddAddressModal extends Component
{
    public $name;
    public $mobile;
    public $province;
    public $city;
    public $address;
    public $postal_code;
    public $provinces;
    public $cities;

    protected $rules = [
        'name'=>'required',
        'mobile'=>'required',
        'province'=>'required',
        'city'=>'required',
        'address'=>'required',
        'postal_code'=>'required',
    ];

    public function mount()
    {
        $this->provinces = Province::query()->pluck('province', 'id');
        $this->cities = collect();
    }

    public function changeProvince($province_id)
    {
        $this->cities = City::query()->where('province_id', $province_id)->pluck('city', 'id');
    }
    public function submit()
    {
        $this->validate();
        $exists = Address::query()->where('user_id',auth()->user()->id)->exists();
        if ($exists){
            Address::query()->create([
                'name'=>$this->name,
                'mobile'=>$this->mobile,
                'user_id'=>auth()->user()->id,
                'province_id'=>$this->province,
                'city_id'=>$this->city,
                'address'=>$this->address,
                'postal_code'=>$this->postal_code,
            ]);
        }else{
            Address::query()->create([
                'name'=>$this->name,
                'mobile'=>$this->mobile,
                'user_id'=>auth()->user()->id,
                'province_id'=>$this->province,
                'city_id'=>$this->city,
                'address'=>$this->address,
                'postal_code'=>$this->postal_code,
                'is_default'=>true,
            ]);
        }
        $this->dispatch('closeAddressModal');

    }
    public function render()
    {
        return view('livewire.frontend.shops.add-address-modal');
    }
}
