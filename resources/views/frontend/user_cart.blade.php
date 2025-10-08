@extends('frontend.layouts.master')
@section('content')
    @if(count($carts) == 0)
        <main class="main-content dt-sl mb-3">
            <div class="container main-container">
                <div class="row">
                    <div class="col-12">
                        <div class="dt sl dt-sn dt-sn--box border pt-3 pb-5">
                            <div class="cart-page cart-empty">
                                <div class="circle-box-icon">
                                    <i class="mdi mdi-cart-remove"></i>
                                </div>
                                <p class="cart-empty-title">سبد خرید شما خالیست!</p>
                                <p>می‌توانید برای مشاهده محصولات بیشتر به صفحات زیر بروید:</p>
                                <div class="cart-empty-links mb-5">
                                    <a href="#" class="border-bottom-dt">لیست مورد علاقه من</a>
                                    <a href="#" class="border-bottom-dt">محصولات شگفت‌انگیز</a>
                                    <a href="#" class="border-bottom-dt">محصولات پرفروش روز</a>
                                </div>
                                <a href="#" class="btn-primary-cm">ادامه خرید در بابی شاپ</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dt-sn dt-sn--box mt-4">
                    <div class="row">
                        <!-- Start Product-Slider -->
                        <div class="col-12">
                            <div class="features-checkout-slider carousel-md owl-carousel owl-theme">
                                <div class="item">
                                    <a href="#">
                                        <img src="./assets/img/svg/delivery.svg" class="img-fluid" alt="">
                                        <div class="title-feature-checkout-slider">تحویل اکسپرس</div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#">
                                        <img src="./assets/img/svg/contact-us.svg" class="img-fluid" alt="">
                                        <div class="title-feature-checkout-slider">پشتیبانی ۲۴ ساعته</div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#">
                                        <img src="./assets/img/svg/payment-terms.svg" class="img-fluid" alt="">
                                        <div class="title-feature-checkout-slider">پرداخت در محل</div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#">
                                        <img src="./assets/img/svg/return-policy.svg" class="img-fluid" alt="">
                                        <div class="title-feature-checkout-slider">۷ روز ضمانت بازگشت</div>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#">
                                        <img src="./assets/img/svg/origin-guarantee.svg" class="img-fluid" alt="">
                                        <div class="title-feature-checkout-slider">ضمانت اصل بودن کالا</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Product-Slider -->
                    </div>
                </div>
                <!-- Start Banner -->
                <div class="row mt-3 mt-5 mb-4">
                    <div class="col-sm-3 col-6 mb-2">
                        <div class="widget-banner">
                            <a href="#">
                                <img src="./assets/img/banner/small-banner-1.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6 mb-2">
                        <div class="widget-banner">
                            <a href="#">
                                <img src="./assets/img/banner/small-banner-2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6 mb-2">
                        <div class="widget-banner">
                            <a href="#">
                                <img src="./assets/img/banner/small-banner-3.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6 mb-2">
                        <div class="widget-banner">
                            <a href="#">
                                <img src="./assets/img/banner/small-banner-4.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Banner -->
                <!-- Start Product-Slider -->
                <section class="slider-section dt-sl mb-5">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="section-title text-sm-title title-wide no-after-title-wide">
                                <h2>احتمالا به محصولات زیر هم علاقه‌مند باشید</h2>
                                <a href="#">مشاهده همه</a>
                            </div>
                        </div>

                        <!-- Start Product-Slider -->
                        <div class="col-12">
                            <div class="product-carousel carousel-lg owl-carousel owl-theme">
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                            <div class="discount">
                                                <span>20%</span>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/07.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">157,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/017.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">کت مردانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                            <span class="product-price">199,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/013.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه مدل هودی تیک تین</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">135,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/09.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">145,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/010.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">170,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                            <div class="discount">
                                                <span>20%</span>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/011.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">185,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/019.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">تیشرت مردانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                            <span class="product-price">54,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Product-Slider -->

                    </div>
                </section>
                <!-- End Product-Slider -->
                <!-- Start Product-Slider -->
                <section class="slider-section dt-sl mb-5">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="section-title text-sm-title title-wide no-after-title-wide">
                                <h2>محصولات پیشنهادی برای شما</h2>
                                <a href="#">مشاهده همه</a>
                            </div>
                        </div>

                        <!-- Start Product-Slider -->
                        <div class="col-12">
                            <div class="product-carousel carousel-lg owl-carousel owl-theme">
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                            <div class="discount">
                                                <span>20%</span>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/07.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">157,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/017.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">کت مردانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                            <span class="product-price">199,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/013.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه مدل هودی تیک تین</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">135,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/09.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">145,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/010.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">170,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                            <div class="discount">
                                                <span>20%</span>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/011.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">مانتو زنانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                            <span class="product-price">185,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-card mb-3">
                                        <div class="product-head">
                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="shop-single.html">
                                            <img src="./assets/img/products/019.jpg" alt="Product Thumbnail">
                                        </a>
                                        <div class="product-card-body">
                                            <h5 class="product-title">
                                                <a href="shop-single.html">تیشرت مردانه</a>
                                            </h5>
                                            <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                            <span class="product-price">54,000 تومان</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Product-Slider -->

                    </div>
                </section>
                <!-- End Product-Slider -->
            </div>
        </main>
    @else
        <main class="main-content dt-sl mb-3">
            <div class="container main-container">
                <div class="row mx-0">
                    <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 mb-2">
                        <nav class="tab-cart-page">
                            <div class="nav nav-tabs border-bottom" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link d-inline-flex w-auto active" id="nav-home-tab"
                                   data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home"
                                   aria-selected="true">سبد خرید<span class="count-cart">1</span></a>
                                <a class="nav-item nav-link d-inline-flex w-auto" id="nav-profile-tab" data-toggle="tab"
                                   href="#nav-profile" role="tab" aria-controls="nav-profile"
                                   aria-selected="false">لیست خرید بعدی<span class="count-cart">1</span></a>
                            </div>
                        </nav>
                    </div>
                    <div class="col-12">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                 aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="col-xl-9 col-lg-8 col-12 px-0">
                                        <div class="table-responsive checkout-content dt-sl">
                                            <div class="checkout-header checkout-header--express">
                                                <span class="checkout-header-title">ارسال عادی</span>
                                                <span class="checkout-header-extra-info">(2 کالا)</span>
                                            </div>
                                            <div class="checkout-section-content-dd-k">
                                                <div class="cart-items-dd-k">
                                                    <div class="cart-item py-4 px-3">
                                                        <div class="item-thumbnail">
                                                            <a href="#">
                                                                <img src="./assets/img/cart/cart01.jpg" alt="item">
                                                            </a>
                                                        </div>
                                                        <div class="item-info flex-grow-1">
                                                            <div class="item-title">
                                                                <h2>
                                                                    <a href="#">
                                                                        گوشی موبایل شیائومی مدل Mi 10 Lite 5G M2002J9G
                                                                        دو
                                                                        سیم‌ کارت
                                                                        ظرفیت
                                                                        128 گیگابایت</a>
                                                                </h2>
                                                            </div>
                                                            <div class="item-detail">
                                                                <ul>
                                                                    <li>
                                                                        <span class="color"
                                                                              style="background-color: #9E9E9E;"></span>
                                                                        <span>خاکستری</span>
                                                                    </li>
                                                                    <li>
                                                                        <i class="far fa-shield-check text-muted"></i>
                                                                        <span>گارانتی ۱۸ ماهه</span>
                                                                    </li>
                                                                    <li>
                                                                        <i class="far fa-store-alt text-muted"></i>
                                                                        <span>نام فروشنده</span>
                                                                    </li>
                                                                    <li>
                                                                        <i
                                                                            class="far fa-clipboard-check text-primary"></i>
                                                                        <span>موجود در انبار</span>
                                                                    </li>
                                                                </ul>
                                                                <div class="item-quantity--item-price">
                                                                    <div class="item-quantity">
                                                                        <div class="num-block">
                                                                            <div class="num-in">
                                                                                <span class="plus"></span>
                                                                                <input type="text" class="in-num"
                                                                                       value="1" readonly>
                                                                                <span class="minus dis"></span>
                                                                            </div>
                                                                        </div>
                                                                        <button class="item-remove-btn mr-3">
                                                                            <i class="far fa-trash-alt"></i>
                                                                            حذف
                                                                        </button>
                                                                    </div>
                                                                    <div class="item-price">
                                                                        ۱۰,۷۰۹,۰۰۰<span
                                                                            class="text-sm mr-1">تومان</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="cart-item py-4 px-3">
                                                        <div class="item-thumbnail">
                                                            <a href="#">
                                                                <img src="./assets/img/cart/cart02.jpg" alt="item">
                                                            </a>
                                                        </div>
                                                        <div class="item-info flex-grow-1">
                                                            <div class="item-title">
                                                                <h2>
                                                                    <a href="#">
                                                                        گوشی موبایل سامسونگ مدل Galaxy A11 SM-A115F/DS
                                                                        دو
                                                                        سیم کارت ظرفیت
                                                                        32
                                                                        گیگابایت با 2 گیگابایت رم</a>
                                                                </h2>
                                                            </div>
                                                            <div class="item-detail">
                                                                <ul>
                                                                    <li>
                                                                        <span class="color"
                                                                              style="background-color: #000;"></span>
                                                                        <span>مشکی</span>
                                                                    </li>
                                                                    <li>
                                                                        <i class="far fa-shield-check text-muted"></i>
                                                                        <span>گارانتی ۱۸ ماهه</span>
                                                                    </li>
                                                                    <li>
                                                                        <i class="far fa-store-alt text-muted"></i>
                                                                        <span>نام فروشنده</span>
                                                                    </li>
                                                                    <li>
                                                                        <i
                                                                            class="far fa-clipboard-check text-primary"></i>
                                                                        <span>موجود در انبار</span>
                                                                    </li>
                                                                </ul>
                                                                <div class="item-quantity--item-price">
                                                                    <div class="item-quantity">
                                                                        <div class="num-block">
                                                                            <div class="num-in">
                                                                                <span class="plus"></span>
                                                                                <input type="text" class="in-num"
                                                                                       value="1" readonly>
                                                                                <span class="minus dis"></span>
                                                                            </div>
                                                                        </div>
                                                                        <button class="item-remove-btn mr-3">
                                                                            <i class="far fa-trash-alt"></i>
                                                                            حذف
                                                                        </button>
                                                                    </div>
                                                                    <div class="item-price">
                                                                        ۴,۱۶۹,۰۰۰<span class="text-sm mr-1">تومان</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="cart-item py-4 px-3">
                                                        <div class="item-thumbnail">
                                                            <a href="#">
                                                                <img src="./assets/img/cart/cart03.jpg" alt="item">
                                                            </a>
                                                        </div>
                                                        <div class="item-info flex-grow-1">
                                                            <div class="item-title">
                                                                <h2>
                                                                    <a href="#">
                                                                        لپ 15 اینچی ایسوس مدل VivoBook K543UB -
                                                                        MR</a>
                                                                </h2>
                                                            </div>
                                                            <div class="item-detail">
                                                                <ul>
                                                                    <li>
                                                                        <span class="color"
                                                                              style="background-color: #002171;"></span>
                                                                        <span>سرمه ای</span>
                                                                    </li>
                                                                    <li>
                                                                        <i class="far fa-shield-check text-muted"></i>
                                                                        <span>گارانتی ۱۸ ماهه</span>
                                                                    </li>
                                                                    <li>
                                                                        <i class="far fa-store-alt text-muted"></i>
                                                                        <span>نام فروشنده</span>
                                                                    </li>
                                                                    <li>
                                                                        <i
                                                                            class="far fa-clipboard-check text-primary"></i>
                                                                        <span>موجود در انبار</span>
                                                                    </li>
                                                                </ul>
                                                                <div class="item-quantity--item-price">
                                                                    <div class="item-quantity">
                                                                        <div class="num-block">
                                                                            <div class="num-in">
                                                                                <span class="plus"></span>
                                                                                <input type="text" class="in-num"
                                                                                       value="1" readonly>
                                                                                <span class="minus dis"></span>
                                                                            </div>
                                                                        </div>
                                                                        <button class="item-remove-btn mr-3">
                                                                            <i class="far fa-trash-alt"></i>
                                                                            حذف
                                                                        </button>
                                                                    </div>
                                                                    <div class="item-price">
                                                                        ۱۵,۹۹۰,۰۰۰<span
                                                                            class="text-sm mr-1">تومان</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
                                        <div class="dt-sn dt-sn--box border mb-2">
                                            <ul class="checkout-summary-summary">
                                                <li>
                                                    <span>مبلغ کل (۲ کالا)</span><span>۱۶,۸۹۷,۰۰۰ تومان</span>
                                                </li>
                                                <li class="checkout-summary-discount">
                                                    <span>سود شما از خرید</span><span><span>(۱٪)</span>۲۰۰,۰۰۰
                                                        تومان</span>
                                                </li>
                                                <li>
                                                    <span>هزینه ارسال<span class="help-sn" data-toggle="tooltip"
                                                                           data-html="true" data-placement="bottom"
                                                                           title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>هزینه ارسال مرسولات می‌تواند وابسته به شهر و آدرس گیرنده متفاوت باشد. در صورتی که هر یک از مرسولات حداقل ارزشی برابر با ۱۵۰هزار تومان داشته باشد، آن مرسوله بصورت رایگان ارسال می‌شود.<br>'حداقل ارزش هر مرسوله برای ارسال رایگان، می تواند متغیر باشد.'</p></div>">
                                                            <span class="mdi mdi-information-outline"></span>
                                                        </span></span><span>وابسته به آدرس</span>
                                                </li>
                                                <li class="checkout-club-container">
                                                    <span>کلاب<span class="help-sn" data-toggle="tooltip"
                                                                    data-html="true" data-placement="bottom"
                                                                    title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>با امتیازهای خود در باشگاه مشتریان دیجی کالا (دیجی کلاب) از بین جوایز متنوع انتخاب کنید.</p></div>">
                                                            <span class="mdi mdi-information-outline"></span>
                                                        </span></span><span><span>۱۵۰+</span><span> امتیاز</span></span>
                                                </li>
                                            </ul>
                                            <div class="checkout-summary-devider">
                                                <div></div>
                                            </div>
                                            <div class="checkout-summary-content">
                                                <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                                                <div class="checkout-summary-price-value">
                                                    <span class="checkout-summary-price-value-amount">۱۶,۶۹۷,۰۰۰</span>
                                                    تومان
                                                </div>
                                                <a href="#" class="mb-2 d-block">
                                                    <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0">
                                                        <i class="mdi mdi-arrow-left"></i>
                                                        ادامه ثبت سفارش
                                                    </button>
                                                </a>
                                                <div>
                                                    <span>
                                                        کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش
                                                        مراحل بعدی را تکمیل کنید.
                                                    </span><span class="help-sn" data-toggle="tooltip" data-html="true"
                                                                 data-placement="bottom"
                                                                 title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش برای شما رزرو می‌شوند. در صورت عدم ثبت سفارش، دیجی‌کالا هیچگونه مسئولیتی در قبال تغییر قیمت یا موجودی این کالاها ندارد.</p></div>">
                                                        <span class="mdi mdi-information-outline"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dt-sn dt-sn--box checkout-feature-aside pt-4">
                                            <ul>
                                                <li class="checkout-feature-aside-item">
                                                    <img src="./assets/img/svg/return-policy.svg" alt="">
                                                    هفت روز ضمانت تعویض
                                                </li>
                                                <li class="checkout-feature-aside-item">
                                                    <img src="./assets/img/svg/payment-terms.svg" alt="">
                                                    پرداخت در محل با کارت بانکی
                                                </li>
                                                <li class="checkout-feature-aside-item">
                                                    <img src="./assets/img/svg/delivery.svg" alt="">
                                                    تحویل اکسپرس
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                 aria-labelledby="nav-profile-tab">
                                <div class="row">
                                    <div class="col-xl-9 col-lg-8 col-12 px-0">
                                        <div class="table-responsive checkout-content dt-sl">
                                            <div class="checkout-header checkout-header--express">
                                                <span class="checkout-header-title">ارسال عادی</span>
                                                <span class="checkout-header-extra-info">(2 کالا)</span>
                                                <a class="checkout-add-all-to-cart">
                                                    افزودن همه به سبد خرید
                                                </a>
                                            </div>
                                            <div class="checkout-section-content-dd-k">
                                                <div class="cart-items-dd-k">
                                                    <div class="cart-item py-4 px-3">
                                                        <div class="item-thumbnail">
                                                            <a href="#">
                                                                <img src="./assets/img/cart/cart01.jpg" alt="item">
                                                            </a>
                                                        </div>
                                                        <div class="item-info flex-grow-1">
                                                            <div class="item-title">
                                                                <h2>
                                                                    <a href="#">
                                                                        گوشی موبایل شیائومی مدل Mi 10 Lite 5G M2002J9G
                                                                        دو
                                                                        سیم‌ کارت
                                                                        ظرفیت
                                                                        128 گیگابایت</a>
                                                                </h2>
                                                            </div>
                                                            <div class="item-detail">
                                                                <ul>
                                                                    <li>
                                                                        <span class="color"
                                                                              style="background-color: #9E9E9E;"></span>
                                                                        <span>خاکستری</span>
                                                                    </li>
                                                                    <li>
                                                                        <i class="far fa-shield-check text-muted"></i>
                                                                        <span>گارانتی ۱۸ ماهه</span>
                                                                    </li>
                                                                    <li>
                                                                        <i class="far fa-store-alt text-muted"></i>
                                                                        <span>نام فروشنده</span>
                                                                    </li>
                                                                    <li>
                                                                        <i
                                                                            class="far fa-clipboard-check text-primary"></i>
                                                                        <span>موجود در انبار</span>
                                                                    </li>
                                                                </ul>
                                                                <div class="item-quantity--item-price">
                                                                    <div class="item-quantity">
                                                                        <div class="num-block">
                                                                            <div class="num-in">
                                                                                <span class="plus"></span>
                                                                                <input type="text" class="in-num"
                                                                                       value="1" readonly>
                                                                                <span class="minus dis"></span>
                                                                            </div>
                                                                        </div>
                                                                        <button class="item-remove-btn mr-3">
                                                                            <i class="far fa-trash-alt"></i>
                                                                            حذف
                                                                        </button>
                                                                    </div>
                                                                    <div class="item-price">
                                                                        ۱۰,۷۰۹,۰۰۰<span
                                                                            class="text-sm mr-1">تومان</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
                                        <div class="dt-sn dt-sn--box border">
                                            <div
                                                class="section-title text-sm-title title-wide mb-1 no-after-title-wide mb-2">
                                                <h2 class="text-dark">لیست خرید بعدی چیست؟</h2>
                                            </div>
                                            <p class="text-secondary text-justify">
                                                شما می‌توانید محصولاتی که به سبد خرید
                                                خود افزوده اید و موقتا قصد خرید آن‌ها را ندارید، در لیست خرید بعدی خود
                                                قرار داده و
                                                هر زمان مایل بودید آن‌ها را مجدداً به سبد خرید اضافه کرده و خرید آن‌ها
                                                را تکمیل کنید.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endif
@endsection
