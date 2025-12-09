<?php

namespace App\Livewire\Admin\Depots;

use App\Enums\DepotStatus;
use App\Enums\UserStatus;
use App\Models\Depot;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DepotList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public function changeStatus($id)
    {
        $depot = Depot::query()->find($id);
        if ($depot->status == DepotStatus::Active->value){
            $depot->update([
                'status'=>DepotStatus::InActive->value
            ]);
        }elseif ($depot->status == DepotStatus::InActive->value){
            $depot->update([
                'status'=>DepotStatus::Active->value
            ]);
        }
    }

    public function searchData()
    {
        $this->resetPage();
    }
    public function render()
    {
        $depots = Depot::query()
            ->where('name','like','%'.$this->search.'%')
            ->paginate(10);
        return view('livewire.admin.depots.depot-list',compact('depots'));
    }
}
