<?php

namespace App\Livewire\Frontend\Products;

use App\Enums\CommentStatus;
use App\Models\Comment;
use App\Models\Order;
use Livewire\Component;

class CommentProduct extends Component
{
    public $product;
    public $name;
    public $advantage;
    public $disadvantage;
    public $suggestion;
    public $body;
    public $advantageList=[];
    public $disadvantageList=[];

    public function submitComment()
    {
        $user = auth()->user();
        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->product_id = $this->product->id;
        $comment->name= $this->name;
        $comment->advantage= implode('#',$this->advantageList);
        $comment->disadvantage= implode('#',$this->disadvantageList);
        $comment->is_buyer = Order::isBuyer($this->product->id,$user->id);
        $comment->suggestion= $this->suggestion;
        $comment->body= $this->body;
        $comment->status = CommentStatus::Draft->value;
        $this->product->comments()->save($comment);
    }

    public function addAdvantage()
    {
        if ($this->advantage){
            array_push($this->advantageList,$this->advantage);
            $this->reset('advantage');
        }
    }

    public function addDisAdvantage()
    {
        if ($this->disadvantage){
            array_push($this->disadvantageList,$this->disadvantage);
            $this->reset('disadvantage');
        }
    }
    public function render()
    {
        return view('livewire.frontend.products.comment-product');
    }
}
