<?php

namespace App\Livewire\Frontend\Shops;

use App\Models\Address;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteAddressModal extends Component
{
    public $address_id;

    #[On('openModalDeleteAddress')]
    public function openModalDeleteAddress($address_id)
    {
        $this->address_id = $address_id;
    }

    public function deleteAddress($address_id)
    {
        Address::destroy($address_id);
        $this->dispatch('closeDeleteAddressModal');
        $this->dispatch('refreshAddressList');
    }
    public function render()
    {
        return view('livewire.frontend.shops.delete-address-modal');
    }
}
