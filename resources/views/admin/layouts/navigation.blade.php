<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            <li data-toggle="tooltip" title="کاربران">
                <a href="#users" title=" کاربران">
                    <i class="icon ti-user"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="فروشگاه">
                <a href="#store" title=" فروشگاه">
                    <i class="icon ti-folder"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="سفارشات">
                <a href="#orders" title=" سفارشات">
                    <i class="icon ti-shopping-cart"></i>
                </a>
            </li>
        </ul>
        <ul>
            <li data-toggle="tooltip" title="ویرایش پروفایل">
                <a href="#" class="go-to-page">
                    <i class="icon ti-settings"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="خروج">
                <a href="login.html" class="go-to-page">
                    <i class="icon ti-power-off"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navigation-menu-body">
        <ul id="users">
            <li>
                <a href="#">کاربران</a>
                <ul>
                    <li><a href="{{route('users.create')}}">ایجاد کاربر</a></li>
                    <li><a href="{{route('users.index')}}">لیست کاربران</a></li>
                </ul>
            </li>
            <li>
                <a href="#">نقش ها</a>
                <ul>
                    <li><a href="{{route('roles.create')}}">ایجاد نقش</a></li>
                    <li><a href="{{route('roles.index')}}">لیست نقش ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">استان ها</a>
                <ul>
                    <li><a href="{{route('provinces.create')}}">ایجاد استان</a></li>
                    <li><a href="{{route('provinces.index')}}">لیست استان ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">شهر ها</a>
                <ul>
                    <li><a href="{{route('cities.create')}}">ایجاد شهر</a></li>
                    <li><a href="{{route('cities.index')}}">لیست شهر ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">فروشندگان</a>
                <ul>
                    <li><a href="{{route('seller.list')}}">لیست فروشندگان</a></li>
                </ul>
            </li>
        </ul>
{{--        @hasanyrole('نویسنده')--}}
        <ul id="store">
            <li>
                <a href="#">دسته بندی ها</a>
                <ul>
                    <li><a href="{{route('categories.create')}}">ایجاد دسته بندی</a></li>
                    <li><a href="{{route('categories.index')}}">لیست دسته بندی ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">بنر ها</a>
                <ul>
                    <li><a href="{{route('banners.create')}}">ایجاد بنر</a></li>
                    <li><a href="{{route('banners.index')}}">لیست بنر ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">اسلایدر ها</a>
                <ul>
                    <li><a href="{{route('sliders.create')}}">ایجاد اسلایدر</a></li>
                    <li><a href="{{route('sliders.index')}}">لیست اسلایدر ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">برند ها</a>
                <ul>
                    <li><a href="{{route('brands.create')}}">ایجاد برند</a></li>
                    <li><a href="{{route('brands.index')}}">لیست برند ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">رنگ ها</a>
                <ul>
                    <li><a href="{{route('colors.create')}}">ایجاد رنگ</a></li>
                    <li><a href="{{route('colors.index')}}">لیست رنگ ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">تگ ها</a>
                <ul>
                    <li><a href="{{route('tags.create')}}">ایجاد تگ</a></li>
                    <li><a href="{{route('tags.index')}}">لیست تگ ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">گارانتی ها</a>
                <ul>
                    <li><a href="{{route('guaranties.create')}}">ایجاد گارانتی</a></li>
                    <li><a href="{{route('guaranties.index')}}">لیست گارانتی ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">گروه ویژگی ها</a>
                <ul>
                    <li><a href="{{route('property_groups.create')}}">ایجاد گروه ویژگی</a></li>
                    <li><a href="{{route('property_groups.index')}}">لیست گروه ویژگی ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">محصولات</a>
                <ul>
                    <li><a href="{{route('products.create')}}">ایجاد محصول</a></li>
                    <li><a href="{{route('products.index')}}">لیست محصولات</a></li>
                </ul>
            </li>
            <li>
                <a href="#">نظرات</a>
                <ul>
                    <li><a href="{{route('users.comments')}}">لیست نظرات محصول</a></li>
                </ul>
            </li>
            <li>
                <a href="#">پرسش و پاسخ</a>
                <ul>
                    <li><a href="{{route('users.questions')}}">لیست پرسش و پاسخ محصول</a></li>
                </ul>
            </li>
            <li>
                <a href="#">تخفیفات</a>
                <ul>
                    <li><a href="{{route('discounts.create')}}">ایجاد تخفیف</a></li>
                    <li><a href="{{route('discounts.index')}}">لیست تخفیفات</a></li>
                </ul>
            </li>
            <li>
                <a href="#">کارتهای هدیه</a>
                <ul>
                    <li><a href="{{route('gift_carts.create')}}">ایجاد کارت هدیه</a></li>
                    <li><a href="{{route('gift_carts.index')}}">لیست کارتهای هدیه</a></li>
                </ul>
            </li>
        </ul>
{{--        @endhasanyrole--}}
        <ul id="orders">
            <li>
                <a href="#">سفارشات</a>
                <ul>
                    <li><a href="{{route('admin.orders.list')}}">لیست سفارشات</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
