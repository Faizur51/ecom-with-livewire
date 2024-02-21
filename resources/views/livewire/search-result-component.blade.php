
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Shop
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> We found <strong class="text-brand">{{$products->count()}}</strong> items for you!</p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{$pageSize}} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{$pageSize==12?'active':''}}" href="#" wire:click.prevent="changePageSize(12)">12</a></li>
                                            <li><a class="{{$pageSize==24?'active':''}}" href="#" wire:click.prevent="changePageSize(24)">24</a></li>
                                            <li><a class="{{$pageSize==36?'active':''}}" href="#" wire:click.prevent="changePageSize(36)">36</a></li>
                                            <li><a class="{{$pageSize==48?'active':''}}" href="#" wire:click.prevent="changePageSize(48)">48</a></li>
                                            <li><a class="{{$pageSize==60?'active':''}}" href="#" wire:click.prevent="changePageSize(60)">60</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span>{{$orderBy}}<i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{$orderBy=='Default Shorting'?'active':''}}" href="#" wire:click.prevent="orderBy('Default Shorting')">Default Shorting</a></li>
                                            <li><a class="{{$orderBy=='Low to High'?'active':''}}" href="#" wire:click.prevent="orderBy('Low to High')">Price: Low to High</a></li>
                                            <li><a class="{{$orderBy=='High to Low'?'active':''}}" href="#" wire:click.prevent="orderBy('High to Low')">Price: High to Low</a></li>
                                            <li><a class="{{$orderBy=='New Product'?'active':''}}" href="#" wire:click.prevent="orderBy('New Product')">New Product</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row product-grid-3">
                            @foreach($products as $product)
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                                    <img class="default-img" src="{{$product->image}}" alt="">
                                                </a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                @php
                                                    $loss=$product->regular_price-$product->sale_price;
                                                    $percent=($loss/$product->regular_price)*100;
                                                @endphp
                                                <span class="hot">{{round($percent)}}%</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop.html">{{$product->category->name}}</a>
                                            </div>
                                            <h2><a href="{{route('product.details',['slug'=>$product->slug])}}">{{ucwords($product->name)}}</a></h2>

                                            @php
                                                $avgrating = 0;
                                            @endphp

                                            @foreach($product->orderItems->where('rstatus',1) as $orderItem)
                                                @php
                                                    $avgrating=$avgrating+$orderItem->review->rating;
                                                @endphp
                                            @endforeach
                                            <div class="product-rate-cover">
                                                <div class="product-rate d-inline-block">
                                                    @if($avgrating)
                                                        <div class="product-rating" style="width:{{$avgrating/$product->orderItems->where('rstatus',1)->count()*20}}%"></div>
                                                    @else
                                                        <div class="product-rating" style="width:0%"></div>
                                                    @endif
                                                </div>
                                                <span class="font-small ml-5 text-muted"> ({{$product->orderItems->where('rstatus',1)->count()}} reviews)</span>
                                            </div>


                                            <div class="product-price">
                                                <span>&#2547; {{$product->sale_price}}</span>
                                                <span class="old-price">&#2547; {{$product->regular_price}}</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    {{$products->links()}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                            <ul class="categories">
                                @foreach($categories as $category)
                                    <li><a href="{{route('category.product',['slug'=>$category->slug])}}">{{ucwords($category->name)}} ({{$category->product->count() }})</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Fillter By Price -->
                        <div class="sidebar-widget price_range range mb-30">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Filter by price</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="slider-range" wire:ignore></div>
                                    <div class="price_slider_amount">
                                        <div class="label-input">
                                            <span>Range:</span><span class="text-info"> &#2547; {{$min_value}} </span > - <span class="text-info"> &#2547; {{$max_value}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group">
                                <div class="list-group-item mb-10 mt-10">
                                    <label class="fw-900">Color Family</label>
                                    <div class="custome-checkbox">
                                        @foreach($colors as $color)
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="examplecolor{{$color->id}}" value="{{$color->name}}" wire:model="checkedColor">
                                            <label class="form-check-label" for="examplecolor{{$color->id}}"><span>{{ucwords($color->name)}}</span></label>
                                            <br>
                                        @endforeach
                                    </div>
                                    <label class="fw-900 mt-15">Size</label>
                                    <div class="custome-checkbox">
                                        @foreach($sizes as $size)
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="examplesize{{$size->id}}" value="{{$size->name}}" wire:model="checkedSize" >
                                            <label class="form-check-label" for="examplesize{{$size->id}}"><span>{{$size->name}}</span></label>
                                            <br>
                                        @endforeach
                                    </div>
                                    <label class="fw-900 mt-15">Brand</label>
                                    <div class="custome-checkbox">
                                        @foreach($brands as $brand)
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="examplebrand{{$brand->id}}" value="{{$brand->id}}" wire:model="checkedBrand">
                                            <label class="form-check-label" for="examplebrand{{$brand->id}}"><span>{{$brand->name}} ({{$brand->product->count() }})</span></label>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">New products</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            @foreach($nproducts as $nproduct)
                                <div class="single-post clearfix">
                                    <div class="image">
                                        <img src="{{$nproduct->image}}" alt="#">
                                    </div>
                                    <div class="content pt-10">
                                        <h5><a href="{{route('product.details',['slug'=>$nproduct->slug])}}">{{ucwords($nproduct->name)}}</a></h5>
                                        <p class="price mb-0 mt-5">&#2547; {{$nproduct->sale_price}}</p>

                                        @php
                                            $avgrating = 0;
                                        @endphp

                                        @foreach($nproduct->orderItems->where('rstatus',1) as $orderItem)
                                            @php
                                                $avgrating=$avgrating+$orderItem->review->rating;
                                            @endphp
                                        @endforeach
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                @if($avgrating)
                                                    <div class="product-rating" style="width:{{$avgrating/$nproduct->orderItems->where('rstatus',1)->count()*20}}%"></div>
                                                @else
                                                    <div class="product-rating" style="width:0%"></div>
                                                @endif
                                            </div>
                                            <span class="font-small ml-5 text-muted"> ({{$nproduct->orderItems->where('rstatus',1)->count()}} reviews)</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>

@push('scripts')
    <script>
        var sliderrange = $('#slider-range');
        //var amountprice = $('#amount');
        $(function() {
            sliderrange.slider({
                range: true,
                min: 100,
                max: 1000,
                values: [100, 1000],
                slide: function(event, ui) {
                    //amountprice.val("$" + ui.values[0] + " - $" + ui.values[1]);
                @this.set('min_value',ui.values[0]);
                @this.set('max_value',ui.values[1]);
                }
            });
        });
    </script>
@endpush
