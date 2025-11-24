<?php

namespace App\Livewire\Frontend\Questions;

use Livewire\Component;

class QuestionList extends Component
{
    public $product;
    public function render()
    {
        return view('livewire.frontend.questions.question-list');
    }
}
