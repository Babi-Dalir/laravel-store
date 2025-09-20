<div class="table overflow-auto" tabindex="8">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
        <div class="col-sm-10">
            <input type="text" @keyup.enter="$wire.searchData" class="form-control text-left" dir="rtl" wire:model="search">
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead-light">
        <tr>
            <th class="text-center align-middle text-primary">ردیف</th>
            <th class="text-center align-middle text-primary">نام کاربر</th>
            <th class="text-center align-middle text-primary">متن نظر</th>
            <th class="text-center align-middle text-primary">تایید یا عدم تایید</th>
<<<<<<< HEAD
=======
            <th class="text-center align-middle text-primary"> وضعیت</th>
>>>>>>> e9d87ba (tree commit)
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $index=>$comment)
            <tr>
                <td class="text-center align-middle">{{$comments->firstItem()+$index}}</td>
                <td class="text-center align-middle">{{$comment->user->name}}</td>
                <td class="text-center align-middle">{{$comment->body}}</td>
                <td class="text-center align-middle">
<<<<<<< HEAD
                    <a class="btn btn-outline-danger" wire:click="$dispatch('deleteBrand',{'id':{{$comment->id}}})">
                        تایید یا عدم تایید
                    </a>
=======
                    @if($comment->status == \App\Enums\CommentStatus::Draft->value || $comment->status == \App\Enums\CommentStatus::Rejected->value)
                        <a class="btn btn-outline-success" wire:click="submitComment({{$comment->id}})">
                            تایید
                        </a>
                    @else
                        <a class="btn btn-outline-danger" wire:click="submitComment({{$comment->id}})">
                              عدم تایید
                        </a>
                    @endif
                </td>
                <td class="text-center align-middle">
                    @if($comment->status === \App\Enums\CommentStatus::Approved->value)
                        <span class="cursor-pointer badge badge-success">تایید شده</span>
                    @elseif($comment->status === \App\Enums\CommentStatus::Draft->value)
                        <span class="cursor-pointer badge badge-warning">در انتظار تایید</span>
                    @elseif($comment->status === \App\Enums\CommentStatus::Rejected->value)
                        <span class="cursor-pointer badge badge-danger">تایید نشده</span>
                    @endif

>>>>>>> e9d87ba (tree commit)
                </td>
                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($comment->created_at)->format('%d%B، %Y')}}</td>
            </tr>
        @endforeach
    </table>
    <div style="margin: 40px !important;"
         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
        {{$comments->appends(Request::except('page'))->links()}}
    </div>
</div>
@section('scripts')
    <script>
        Livewire.on('deleteBrand', (event) => {
            Swal.fire({
                title: "آیا از حذف مطمئن هستید؟",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "بله",
                cancelButtonText: "خیر",
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('destroy_brand',{id : event.id})
                    Swal.fire({
                        title: "حذف با موفقیت انجام شد!",
                        icon: "success"
                    });
                }
            });
        })
    </script>
@endsection


