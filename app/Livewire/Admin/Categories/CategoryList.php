<?php

namespace App\Livewire\Admin\Categories;

use App\Enums\UserStatus;
use App\Models\Category;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class CategoryList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    #[On('destroy_category')]
    public function destroyCategory($id)
    {
        Category::destroy($id);
    }

    public function searchData()
    {
        $this->resetPage();
    }
    public function render()
    {
        $categories = Category::query()
            ->where('name','like','%'.$this->search.'%')
            ->orWhere('e_name','like','%'.$this->search.'%')
            ->paginate(20);
        return view('livewire.admin.categories.category-list',compact('categories'));
    }
}
