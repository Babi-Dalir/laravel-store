<?php

namespace App\Livewire\Frontend\Shops;

use App\Models\Address;
use App\Models\City;
use App\Models\Province;
use Livewire\Component;

class EditAddressModal extends Component
{
    public $name;
    public $mobile;
    public $province;
    public $city;
    public $address;
    public $postal_code;
    public $provinces;
    public $cities;

    protected $listeners=[
        'editAddress'
    ];
    protected $rules = [
        'name'=>'required',
        'mobile'=>'required|digits:11',
        'province'=>'required',
        'city'=>'required',
        'address'=>'required',
        'postal_code'=>'required|digits:10',
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
        $address = Address::query()
            ->where('user_id',auth()->user()->id)
            ->where('is_default',true)
            ->first();
        if ($address){
            Address::query()->update([
                'is_default'=>false
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
        $this->reset([
            'name',
            'mobile',
            'province',
            'city',
            'address',
            'postal_code',
        ]);
        $this->dispatch('closeAddressModal');

    }

    public function editAddress($address_id)
    {
        $address = Address::query()->find($address_id);
        $this->name = $address->name;
        $this->mobile = $address->mobile;
        $this->province = $address->province->province;
        $this->city = $address->city->city;
        $this->address = $address->address;
        $this->postal_code = $address->postal_code;
    }
    public function render()
    {
        return view('livewire.frontend.shops.edit-address-modal');
    }
}
