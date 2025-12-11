<?php

namespace App\Livewire\Admin\Depots;

use Livewire\Attributes\On;
use Livewire\Component;

class AddOrOutDepotModal extends Component
{
    public $type;
    public $count;
    public $name;
    #[On('addOrOutDepot')]
    public function addOrOutDepot($product_price_id,$depot_id)
    {

    }

    public function submitAddOrOut()
    {

    }
    public function render()
    {
        return view('livewire.admin.depots.add-or-out-depot-modal');
    }
}
