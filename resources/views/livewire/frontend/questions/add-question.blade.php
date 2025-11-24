<div class="form-question-answer dt-sl mb-3">
    <form wire:submit.prevent="submitQuestion">
        <textarea class="form-control mb-3" rows="5" wire:model="question"></textarea>
        <button type="submit" class="btn btn-dark float-right ml-3">ثبت پرسش</button>
    </form>
    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                <div>{{session('message')}}</div>
            </div>
        @endif

    </div>
</div>
