<div class="table overflow-auto" tabindex="8">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
        <div class="col-sm-8">
            <input type="text" @keyup.enter="$wire.searchData" class="form-control text-left" dir="rtl" wire:model="search">
        </div>
        <div class="col-sm-2">
            <a href="{{route('create.product.prices',$product_id)}}" class="btn btn-outline-info">
                <i class="ti-plus">ایجاد تنوع قیمت</i>
            </a>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead-light">
        <tr>
            <th class="text-center align-middle text-primary">ردیف</th>
            <th class="text-center align-middle text-primary">قیمت اصلی</th>
            <th class="text-center align-middle text-primary">درصد تخفیف</th>
            <th class="text-center align-middle text-primary">قیمت تخفیف خورده</th>
            <th class="text-center align-middle text-primary">گارانتی</th>
            <th class="text-center align-middle text-primary">تعداد</th>
            <th class="text-center align-middle text-primary">نهایت فروش</th>
            <th class="text-center align-middle text-primary">رنگ ها</th>
            <th class="text-center align-middle text-primary">حذف</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($product_prices as $index=>$product_price)
            <tr>
                <td class="text-center align-middle">{{$product_prices->firstItem()+$index}}</td>
                <td class="text-center align-middle">{{$product_price->main_price}}</td>
                <td class="text-center align-middle">{{$product_price->discount}}</td>
                <td class="text-center align-middle">{{$product_price->price}}</td>
                <td class="text-center align-middle">{{$product_price->guaranty->name}}</td>
                <td class="text-center align-middle">{{$product_price->count}}</td>
                <td class="text-center align-middle">{{$product_price->max_sell}}</td>
                <td class="text-center align-middle">{{$product_price->color->name}}</td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-danger" wire:click="$dispatch('deleteProductPrice',{'product_price_id':{{$product_price->id}}})">
                        حذف
                    </a>
                </td>
                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($product_price->created_at)->format('%d%B، %Y')}}</td>
            </tr>
        @endforeach
    </table>
    <div style="margin: 40px !important;"
         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
        {{$product_prices->appends(Request::except('page'))->links()}}
    </div>
</div>
@section('scripts')
    <script>
        Livewire.on('deleteProductPrice', (event) => {
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
                    Livewire.dispatch('destroy_product_price',{product_price_id : event.product_price_id})
                    Swal.fire({
                        title: "حذف با موفقیت انجام شد!",
                        icon: "success"
                    });
                }
            });
        })
    </script>
@endsection


