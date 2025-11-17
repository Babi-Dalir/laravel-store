<?php

namespace App\Livewire\Frontend\Products;

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
