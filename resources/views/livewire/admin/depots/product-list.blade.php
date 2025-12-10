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
            <th class="text-center align-middle text-primary">نام محصول</th>
            <th class="text-center align-middle text-primary">گارانتی</th>
            <th class="text-center align-middle text-primary">تعداد</th>
            <th class="text-center align-middle text-primary">رنگ ها</th>
            <th class="text-center align-middle text-primary">افزودن به انبار</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($product_prices as $index=>$product_price)
            <tr>
                <td class="text-center align-middle">{{$product_prices->firstItem()+$index}}</td>
                <td class="text-center align-middle">{{$product_price->product->name}}</td>
                <td class="text-center align-middle">{{$product_price->guaranty->name}}</td>
                <td class="text-center align-middle">{{$product_price->count}}</td>
                <td class="text-center align-middle">{{$product_price->color->name}}</td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-info">
                        افزودن به انبار
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


