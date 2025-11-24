<?php

namespace App\Livewire\Frontend\Questions;

use App\Models\Question;
use Livewire\Component;

class AddQuestion extends Component
{
    public $product,$question;

    public function submitQuestion()
    {
        if (auth()->user()){
            Question::query()->create([
                'user_id'=>auth()->user()->id,
                'product_id'=>$this->product->id,
                'question'=>$this->question,
                'parent_id'=>null,
            ]);
            session()->flash('message','پرسش شما ثبت شد و پس از تایید مدیر به نمایش گذاشته میشود');

        }else{
            session()->flash('message','برای ثبت پرسش حتما باید در سایت ثبت نام کنید');

        }
    }
    public function render()
    {
        return view('livewire.frontend.questions.add-question');
    }
}
