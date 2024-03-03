 <main class="main">
        <section class="home-slider position-relative pt-20" >
            <div class="hero-slider-1 dot-style-1 dot-style-1-position-1" wire:ignore>
                @foreach($homeSliders as $homeSlider)
                <div class="single-hero-slider single-animation-wrap" >
                    <div class="container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-5 col-md-6">
                                <div class="hero-slider-content-2">
                                    <h4 class="animated">{{$homeSlider->top_title}}</h4>
                                    <h2 class="animated fw-900">{{$homeSlider->title}}</h2>
                                    <h1 class="animated fw-900 text-brand">{{$homeSlider->sub_title}}</h1>
                                    <p class="animated">Save more with coupons & up to {{$homeSlider->offer}}% off</p>
                                    <a class="animated btn btn-brush btn-brush-3" href="{{$homeSlider->link}}"> Shop Now </a>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="single-slider-img single-slider-img-1">
                                    @if(strlen($homeSlider->image > 25))
                                    <img class="animated slider-1-1" src="{{$homeSlider->image}}" alt="">
                                    @else
                                        <img class="animated slider-1-1" src="{{asset('frontend/assets/images/slider')}}/{{$homeSlider->image}}" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </section>

     <section class="featured section-padding position-relative">
         @if($categories->count()>0)
         <div class="container">
             <h3 class="section-title mb-2 wow fadeIn animated"><span>Featured</span> Category</h3>
             <div class="row">
                 @foreach($categories as $category)
                 <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0 mt-10">
                     <div class="banner-features wow fadeIn animated hover-up">

                         @if(strlen($category->image > 25))
                         <a href="{{route('category.product',['slug'=>$category->slug])}}"><img src="{{$category->image}}" alt=""></a>
                         @else
                             <a href="{{route('category.product',['slug'=>$category->slug])}}"><img src="{{asset('frontend/assets/images/category')}}/{{$category->image}}" alt=""></a>
                         @endif

                         <h4 class="bg-3"><a href="{{route('category.product',['slug'=>$category->slug])}}">{{$category->name}}</a></h4>
                     </div>
                 </div>
                 @endforeach
             </div>
         </div>
         @endif
     </section>

        <section class="product-tabs section-padding position-relative wow fadeIn animated">
            <div class="bg-square"></div>
            <div class="container">
                <div class="tab-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <h3 class="section-title mb-2 wow fadeIn animated"><span>Featured</span> Product</h3>
                        </li>
                    </ul>
                    <a href="javascript:void(0)" class="view-more d-none d-md-flex" wire:click.prevent="loadMore">View More<i class="fi-rs-angle-double-small-right"></i></a>
                </div>

                <!--End nav-tabs-->
                <div class="tab-content wow fadeIn animated" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @foreach($products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            @if(strlen($product->image > 25))
                                            <a href="{{route('product.details',['slug'=>$product->slug])}}"><img class="default-img" src="{{$product->image}}" alt=""></a>
                                            @else
                                                <a href="{{route('product.details',['slug'=>$product->slug])}}"><img class="default-img" src="{{asset('frontend/assets/images/product')}}/{{$product->image}}" alt=""></a>
                                            @endif
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
                                            <a href="{{route('category.product',['slug'=>$product->category->slug])}}">{{$product->category->name}}</a> |
                                            <a href="#">{{$product->brand->name}}</a>
                                        </div>
                                        <h2><a href="{{route('product.details',['slug'=>$product->slug])}}">{{ucwords($product->name)}}</a></h2>

                                        <div class="product-rate-cover">
                                            @php
                                                $avgrating = 0;
                                            @endphp

                                            @foreach($product->orderItems->where('rstatus',1) as $orderItem)
                                                @php
                                                    $avgrating=$avgrating+$orderItem->review->rating;
                                                @endphp
                                            @endforeach
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
                                            <span>&#2547; {{$product->sale_price}} </span>
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
                        <!--End product-grid-4-->
                    </div>

                    <div class="d-flex justify-content-center">
                        <a href="javascript:void(0)" wire:click.prevent="loadMore" class="btn btn-primary btn-sm load">LOAD MORE</a>
                    </div>

                </div>
                <!--End tab-content-->
            </div>
        </section>

        <section class="banner-2 section-padding pb-0">
            <div class="container">
                <div class="banner-img banner-big wow fadeIn animated f-none">
                    <img src="{{asset('frontend')}}/assets/imgs/banner/banner-4.png" alt="">
                    <div class="banner-text d-md-block d-none">
                        <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                        <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
                        <a href="shop.html" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="popular-categories section-padding mt-15 mb-25" wire:ignore>
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                    <div class="carausel-6-columns" id="carausel-6-columns">
                        @foreach($categories as $category)
                        <div class="card-1">
                            <figure class=" img-hover-scale overflow-hidden">
                                <a href="{{route('category.product',['slug'=>$category->slug])}}"><img src="{{$category->image}}" alt=""></a>
                            </figure>
                            <h5><a href="{{route('category.product',['slug'=>$category->slug])}}">{{$category->name}}</a></h5>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>


        <section class="banners mb-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img src="{{asset('frontend')}}/assets/imgs/banner/banner-1.png" alt="">
                            <div class="banner-text">
                                <span>Smart Offer</span>
                                <h4>Save 20% on <br>Woman Bag</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img src="{{asset('frontend')}}/assets/imgs/banner/banner-2.png" alt="">
                            <div class="banner-text">
                                <span>Sale off</span>
                                <h4>Great Summer <br>Collection</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img wow fadeIn animated  mb-sm-0">
                            <img src="{{asset('frontend')}}/assets/imgs/banner/banner-3.png" alt="">
                            <div class="banner-text">
                                <span>New Arrivals</span>
                                <h4>Shop Today’s <br>Deals & Offers</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding" wire:ignore>
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
                    <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                        @foreach($nproducts as $nproduct)
                            <div class="product-cart-wrap small hover-up">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    @if(strlen($nproduct->image > 25))
                                        <a href="{{route('product.details',['slug'=>$nproduct->slug])}}"><img class="default-img" src="{{$nproduct->image}}" alt=""></a>
                                    @else
                                        <a href="{{route('product.details',['slug'=>$nproduct->slug])}}"><img class="default-img" src="{{asset('frontend/assets/images/product')}}/{{$nproduct->image}}" alt=""></a>
                                    @endif
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    @php
                                        $loss=$nproduct->regular_price-$nproduct->sale_price;
                                        $percent=($loss/$nproduct->regular_price)*100;
                                    @endphp

                                        <span class="hot">{{round($percent)}}%</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="product-details.html">{{ucwords($nproduct->name)}}</a></h2>

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

                                <div class="product-price">
                                    <span>&#2547; {{$nproduct->sale_price}} </span>
                                    <span class="old-price">&#2547; {{$nproduct->regular_price}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>

     <section class="featured section-padding position-relative">
         <div class="container">
             <h3 class="section-title mb-20 wow fadeIn animated"><span>Our</span> Support</h3>
             <div class="row">
                 <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                     <div class="banner-features wow fadeIn animated hover-up">
                         <img src="{{asset('frontend')}}/assets/imgs/theme/icons/feature-1.png" alt="">
                         <h4 class="bg-1">Free Shipping</h4>
                     </div>
                 </div>
                 <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                     <div class="banner-features wow fadeIn animated hover-up">
                         <img src="{{asset('frontend')}}/assets/imgs/theme/icons/feature-2.png" alt="">
                         <h4 class="bg-3">Online Order</h4>
                     </div>
                 </div>
                 <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                     <div class="banner-features wow fadeIn animated hover-up">
                         <img src="{{asset('frontend')}}/assets/imgs/theme/icons/feature-3.png" alt="">
                         <h4 class="bg-2">Save Money</h4>
                     </div>
                 </div>
                 <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                     <div class="banner-features wow fadeIn animated hover-up">
                         <img src="{{asset('frontend')}}/assets/imgs/theme/icons/feature-4.png" alt="">
                         <h4 class="bg-4">Promotions</h4>
                     </div>
                 </div>
                 <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                     <div class="banner-features wow fadeIn animated hover-up">
                         <img src="{{asset('frontend')}}/assets/imgs/theme/icons/feature-5.png" alt="">
                         <h4 class="bg-5">Happy Sell</h4>
                     </div>
                 </div>
                 <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                     <div class="banner-features wow fadeIn animated hover-up">
                         <img src="{{asset('frontend')}}/assets/imgs/theme/icons/feature-6.png" alt="">
                         <h4 class="bg-6">24/7 Support</h4>
                     </div>
                 </div>
             </div>
         </div>
     </section>
    </main>

