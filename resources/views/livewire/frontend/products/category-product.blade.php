<div class="col-lg-9 col-md-12 col-sm-12 search-card-res">
    <div class="d-md-none">
        <button class="btn-filter-sidebar">
            جستجوی پیشرفته <i class="fad fa-sliders-h"></i>
        </button>
    </div>
    <div class="dt-sl dt-sn px-0 search-amazing-tab">
        <div class="ah-tab-wrapper dt-sl">
            <div class="ah-tab dt-sl">
                <a class="ah-tab-item" wire:click.prevent="allProducts" @if(count($products) >0) data-ah-tab-active="true" @endif  href="">همه محصولات</a>
                <a class="ah-tab-item" wire:click.prevent="moreViewedProducts" @if(count($more_viewed) >0) data-ah-tab-active="true" @endif href="">پربازدید ترین</a>
                <a class="ah-tab-item" wire:click.prevent="newestProducts" @if(count($newest) >0) data-ah-tab-active="true" @endif href="">جدید ترین</a>
                <a class="ah-tab-item" wire:click.prevent="moreSoldProducts" @if(count($more_sold) >0) data-ah-tab-active="true" @endif href="">پرفروش ترین</a>
                <a class="ah-tab-item" wire:click.prevent="cheapestProducts" @if(count($cheapest) >0) data-ah-tab-active="true" @endif href="">ارزان ترین</a>
                <a class="ah-tab-item" wire:click.prevent="mostExpensiveProducts" @if(count($most_expensive) >0) data-ah-tab-active="true" @endif href="">گران ترین</a>
            </div>
        </div>
        <div class="ah-tab-content-wrapper dt-sl px-res-0">
            <div class="ah-tab-content dt-sl" @if(count($products) >0) data-ah-tab-active="true" @endif>
                <div class="row mb-3 mx-0 px-res-0">
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                            <div class="product-card mb-2 mx-res-0">
                                @if($product->spacial_expiration !=null && $product->spacial_expiration > now())
                                    <div class="promotion-badge">
                                        فروش ویژه
                                    </div>
                                @endif
                                <div class="product-head">
                                    <div class="rating-stars">
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                    </div>
                                    <div class="discount">
                                        @if($product->discount != 0)
                                            <span>{{$product->discount}}%</span>
                                        @endif
                                    </div>
                                </div>
                                <a class="product-thumb"
                                   href="{{route('single.product',$product->slug)}}">
                                    <img src="{{url('images/products/big/'.$product->image)}}"
                                         alt="Product Thumbnail">
                                </a>
                                <div class="product-card-body">
                                    <div class="add-to-compare">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="customCheck100">
                                            <label class="custom-control-label"
                                                   for="customCheck100">مقایسه</label>
                                        </div>
                                    </div>
                                    <h5 class="product-title">
                                        <a href="{{route('single.product',$product->slug)}}">{{$product->name}}</a>
                                    </h5>
                                    <a class="product-meta"
                                       href="shop-categories.html">{{$product->category->name}}</a>
                                    <span
                                        class="product-price">{{number_format($product->price)}} تومان</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="pagination">
                            <a href="#" class="prev"><i
                                    class="mdi mdi-chevron-double-right"></i></a>
                            <a href="#">1</a>
                            <a href="#" class="active-page">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">...</a>
                            <a href="#">7</a>
                            <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ah-tab-content dt-sl" @if(count($more_viewed) >0) data-ah-tab-active="true" @endif>
                <div class="row mb-3 mx-0 px-res-0">
                    @foreach($more_viewed as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                            <div class="product-card mb-2 mx-res-0">
                                @if($product->spacial_expiration !=null && $product->spacial_expiration > now())
                                    <div class="promotion-badge">
                                        فروش ویژه
                                    </div>
                                @endif
                                <div class="product-head">
                                    <div class="rating-stars">
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                    </div>
                                    <div class="discount">
                                        @if($product->discount != 0)
                                            <span>{{$product->discount}}%</span>
                                        @endif
                                    </div>
                                </div>
                                <a class="product-thumb"
                                   href="{{route('single.product',$product->slug)}}">
                                    <img src="{{url('images/products/big/'.$product->image)}}"
                                         alt="Product Thumbnail">
                                </a>
                                <div class="product-card-body">
                                    <div class="add-to-compare">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="customCheck100">
                                            <label class="custom-control-label"
                                                   for="customCheck100">مقایسه</label>
                                        </div>
                                    </div>
                                    <h5 class="product-title">
                                        <a href="{{route('single.product',$product->slug)}}">{{$product->name}}</a>
                                    </h5>
                                    <a class="product-meta"
                                       href="shop-categories.html">{{$product->category->name}}</a>
                                    <span
                                        class="product-price">{{number_format($product->price)}} تومان</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="pagination">
                            <a href="#" class="prev"><i
                                    class="mdi mdi-chevron-double-right"></i></a>
                            <a href="#">1</a>
                            <a href="#" class="active-page">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">...</a>
                            <a href="#">7</a>
                            <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ah-tab-content dt-sl" @if(count($newest) >0) data-ah-tab-active="true" @endif>
                <div class="row mb-3 mx-0 px-res-0">
                    @foreach($newest as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                            <div class="product-card mb-2 mx-res-0">
                                @if($product->spacial_expiration !=null && $product->spacial_expiration > now())
                                    <div class="promotion-badge">
                                        فروش ویژه
                                    </div>
                                @endif
                                <div class="product-head">
                                    <div class="rating-stars">
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                    </div>
                                    <div class="discount">
                                        @if($product->discount != 0)
                                            <span>{{$product->discount}}%</span>
                                        @endif
                                    </div>
                                </div>
                                <a class="product-thumb"
                                   href="{{route('single.product',$product->slug)}}">
                                    <img src="{{url('images/products/big/'.$product->image)}}"
                                         alt="Product Thumbnail">
                                </a>
                                <div class="product-card-body">
                                    <div class="add-to-compare">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="customCheck100">
                                            <label class="custom-control-label"
                                                   for="customCheck100">مقایسه</label>
                                        </div>
                                    </div>
                                    <h5 class="product-title">
                                        <a href="{{route('single.product',$product->slug)}}">{{$product->name}}</a>
                                    </h5>
                                    <a class="product-meta"
                                       href="shop-categories.html">{{$product->category->name}}</a>
                                    <span
                                        class="product-price">{{number_format($product->price)}} تومان</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="pagination">
                            <a href="#" class="prev"><i
                                    class="mdi mdi-chevron-double-right"></i></a>
                            <a href="#">1</a>
                            <a href="#" class="active-page">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">...</a>
                            <a href="#">7</a>
                            <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ah-tab-content dt-sl" @if(count($more_sold) >0) data-ah-tab-active="true" @endif>
                <div class="row mb-3 mx-0 px-res-0">
                    @foreach($more_sold as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                            <div class="product-card mb-2 mx-res-0">
                                @if($product->spacial_expiration !=null && $product->spacial_expiration > now())
                                    <div class="promotion-badge">
                                        فروش ویژه
                                    </div>
                                @endif
                                <div class="product-head">
                                    <div class="rating-stars">
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                    </div>
                                    <div class="discount">
                                        @if($product->discount != 0)
                                            <span>{{$product->discount}}%</span>
                                        @endif
                                    </div>
                                </div>
                                <a class="product-thumb"
                                   href="{{route('single.product',$product->slug)}}">
                                    <img src="{{url('images/products/big/'.$product->image)}}"
                                         alt="Product Thumbnail">
                                </a>
                                <div class="product-card-body">
                                    <div class="add-to-compare">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="customCheck100">
                                            <label class="custom-control-label"
                                                   for="customCheck100">مقایسه</label>
                                        </div>
                                    </div>
                                    <h5 class="product-title">
                                        <a href="{{route('single.product',$product->slug)}}">{{$product->name}}</a>
                                    </h5>
                                    <a class="product-meta"
                                       href="shop-categories.html">{{$product->category->name}}</a>
                                    <span
                                        class="product-price">{{number_format($product->price)}} تومان</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="pagination">
                            <a href="#" class="prev"><i
                                    class="mdi mdi-chevron-double-right"></i></a>
                            <a href="#">1</a>
                            <a href="#" class="active-page">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">...</a>
                            <a href="#">7</a>
                            <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ah-tab-content dt-sl" @if(count($cheapest) >0) data-ah-tab-active="true" @endif>
                <div class="row mb-3 mx-0 px-res-0">
                    @foreach($cheapest as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                            <div class="product-card mb-2 mx-res-0">
                                @if($product->spacial_expiration !=null && $product->spacial_expiration > now())
                                    <div class="promotion-badge">
                                        فروش ویژه
                                    </div>
                                @endif
                                <div class="product-head">
                                    <div class="rating-stars">
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                    </div>
                                    <div class="discount">
                                        @if($product->discount != 0)
                                            <span>{{$product->discount}}%</span>
                                        @endif
                                    </div>
                                </div>
                                <a class="product-thumb"
                                   href="{{route('single.product',$product->slug)}}">
                                    <img src="{{url('images/products/big/'.$product->image)}}"
                                         alt="Product Thumbnail">
                                </a>
                                <div class="product-card-body">
                                    <div class="add-to-compare">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="customCheck100">
                                            <label class="custom-control-label"
                                                   for="customCheck100">مقایسه</label>
                                        </div>
                                    </div>
                                    <h5 class="product-title">
                                        <a href="{{route('single.product',$product->slug)}}">{{$product->name}}</a>
                                    </h5>
                                    <a class="product-meta"
                                       href="shop-categories.html">{{$product->category->name}}</a>
                                    <span
                                        class="product-price">{{number_format($product->price)}} تومان</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="pagination">
                            <a href="#" class="prev"><i
                                    class="mdi mdi-chevron-double-right"></i></a>
                            <a href="#">1</a>
                            <a href="#" class="active-page">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">...</a>
                            <a href="#">7</a>
                            <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ah-tab-content dt-sl" @if(count($most_expensive) >0) data-ah-tab-active="true" @endif>
                <div class="row mb-3 mx-0 px-res-0">
                    @foreach($most_expensive as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                            <div class="product-card mb-2 mx-res-0">
                                @if($product->spacial_expiration !=null && $product->spacial_expiration > now())
                                    <div class="promotion-badge">
                                        فروش ویژه
                                    </div>
                                @endif
                                <div class="product-head">
                                    <div class="rating-stars">
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                        <i class="mdi mdi-star active"></i>
                                    </div>
                                    <div class="discount">
                                        @if($product->discount != 0)
                                            <span>{{$product->discount}}%</span>
                                        @endif
                                    </div>
                                </div>
                                <a class="product-thumb"
                                   href="{{route('single.product',$product->slug)}}">
                                    <img src="{{url('images/products/big/'.$product->image)}}"
                                         alt="Product Thumbnail">
                                </a>
                                <div class="product-card-body">
                                    <div class="add-to-compare">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="customCheck100">
                                            <label class="custom-control-label"
                                                   for="customCheck100">مقایسه</label>
                                        </div>
                                    </div>
                                    <h5 class="product-title">
                                        <a href="{{route('single.product',$product->slug)}}">{{$product->name}}</a>
                                    </h5>
                                    <a class="product-meta"
                                       href="shop-categories.html">{{$product->category->name}}</a>
                                    <span
                                        class="product-price">{{number_format($product->price)}} تومان</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="pagination">
                            <a href="#" class="prev"><i
                                    class="mdi mdi-chevron-double-right"></i></a>
                            <a href="#">1</a>
                            <a href="#" class="active-page">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">...</a>
                            <a href="#">7</a>
                            <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
