<?php

namespace App\Livewire\Admin\Order;

use Livewire\Component;

class OrderDetails extends Component
{
    public $order;
    public function render()
    {
        return view('livewire.admin.order.order-details');
    }
}
