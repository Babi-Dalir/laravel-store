<?php

namespace App\Livewire\Admin\Comments;

use App\Models\Brand;
use App\Models\Comment;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CommentList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;

    public function searchData()
    {
        $this->resetPage();
    }
    public function render()
    {
        $comments = Comment::query()
            ->orderBy('created_at','DESC')
            ->paginate(20);
        return view('livewire.admin.comments.comment-list',compact('comments'));
    }
}
