<div>
    <style>
        body{
            height: 100vh;
        }
    </style>
    <main class="main">
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
        <section class="product-tabs section-padding position-relative wow fadeIn animated">
            <div class="bg-square"></div>
            <div class="container">
                <div class="tab-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Featured</button>
                        </li>
                    </ul>
                    <a href="#" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a>
                </div>

                <!--End nav-tabs-->
                <div class="tab-content wow fadeIn animated" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @foreach($products as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                    <div class="product-cart-wrap mb-20">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                @if(strlen($product->image > 25))
                                                    <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                                        <img class="default-img" src="{{$product->image}}" alt="">
                                                    </a>
                                                @else
                                                    <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                                        <img class="default-img" src="{{asset('frontend/assets/images/product')}}/{{$product->image}}" alt="">
                                                    </a>
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
                </div>
                <!--End tab-content-->
            </div>
        </section>
    </main>
</div>


@push('scripts')
    <script>
        window.onscroll=function (ev){
            if((window.innerHeight+window.scrollY)>=document.body.offsetHeight){
                window.livewire.emit('load-more')
            }
        }
    </script>
@endpush

