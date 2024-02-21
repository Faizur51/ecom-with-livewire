     <main class="main" wire:ignore>
         <style>
             /* CSS */
             .button-62 {
                 background: linear-gradient(to bottom right, #EF4765, #FF9A5A);
                 border: 0;
                 border-radius: 12px;
                 color: #FFFFFF;
                 cursor: pointer;
                 display: inline-block;
                 font-family: -apple-system,system-ui,"Segoe UI",Roboto,Helvetica,Arial,sans-serif;
                 font-size: 16px;
                 font-weight: 500;
                 line-height: 2.5;
                 outline: transparent;
                 padding: 0 1rem;
                 text-align: center;
                 text-decoration: none;
                 transition: box-shadow .2s ease-in-out;
                 user-select: none;
                 -webkit-user-select: none;
                 touch-action: manipulation;
                 white-space: nowrap;
             }

             .button-62:not([disabled]):focus {
                 box-shadow: 0 0 .25rem rgba(0, 0, 0, 0.5), -.125rem -.125rem 1rem rgba(239, 71, 101, 0.5), .125rem .125rem 1rem rgba(255, 154, 90, 0.5);
             }

             .button-62:not([disabled]):hover {
                 box-shadow: 0 0 .25rem rgba(0, 0, 0, 0.5), -.125rem -.125rem 1rem rgba(239, 71, 101, 0.5), .125rem .125rem 1rem rgba(255, 154, 90, 0.5);
             }

             .button-3 {
                 appearance: none;
                 background-color: #2ea44f;
                 border: 1px solid rgba(27, 31, 35, .15);
                 border-radius: 6px;
                 box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
                 box-sizing: border-box;
                 color: #fff;
                 cursor: pointer;
                 display: inline-block;
                 font-family: -apple-system,system-ui,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji";
                 font-size: 14px;
                 font-weight: 600;
                 line-height: 20px;
                 padding: 6px 16px;
                 position: relative;
                 text-align: center;
                 text-decoration: none;
                 user-select: none;
                 -webkit-user-select: none;
                 touch-action: manipulation;
                 vertical-align: middle;
                 white-space: nowrap;
             }

             .button-3:focus:not(:focus-visible):not(.focus-visible) {
                 box-shadow: none;
                 outline: none;
             }

             .button-3:hover {
                 background-color: #2c974b;
             }

             .button-3:focus {
                 box-shadow: rgba(46, 164, 79, .4) 0 0 0 3px;
                 outline: none;
             }

             .button-3:disabled {
                 background-color: #94d3a2;
                 border-color: rgba(27, 31, 35, .1);
                 color: rgba(255, 255, 255, .8);
                 cursor: default;
             }

             .button-3:active {
                 background-color: #298e46;
                 box-shadow: rgba(20, 70, 32, .2) 0 1px 0 inset;
             }
         </style>

        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Fashion
                    <span></span> {{ucwords($product->name)}}
                </div>
            </div>
        </div>
        <section class="mt-20 mb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery" wire:ignore>
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            @foreach($images as $image)
                                                @if(strlen($image > 25))
                                            <figure class="border-radius-10" >
                                                <img src="{{$image}}" alt="product image" style="width: 1100px;height: 500px">
                                            </figure>
                                                @else
                                                    <figure class="border-radius-10" >
                                                        <img src="{{asset('frontend/assets/images/product')}}/{{$image}}" alt="product image">
                                                    </figure>
                                                @endif
                                            @endforeach
                                        </div>

                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                            @foreach($images as $image)
                                                @if(strlen($image > 25))
                                                       <div><img src="{{$image}}" alt="product image" style="height: 90px"></div>
                                                @else
                                                    <div><img src="{{asset('frontend/assets/images/product')}}/{{$image}}" alt="product image"></div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                    <div class="social-icons single-share">
                                        <ul class="text-grey-5 d-inline-block">
                                            <li><strong class="mr-10">Share this:</strong></li>

                                            <?php
                                            $url = "http://127.0.0.1:8000/";
                                            ?>

                                            <li class="social-facebook"><a href="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo $url ?>', '_blank', 'width=400,height=500');void(0);"><img src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-facebook.svg" alt=""></a></li>
                                            <li class="social-twitter"> <a href="#"><img src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-twitter.svg" alt=""></a></li>
                                            <li class="social-instagram"><a href="#"><img src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-instagram.svg" alt=""></a></li>
                                            <li class="social-linkedin"><a href="#"><img src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h3 class="title-detail">{{ucwords($product->name)}}</h3>
                                        <div class="product-detail-rating">
                                            <div class="pro-details-brand">
                                                <span> Brands: <a href="javascript:void(0)">{{$product->brand->name}}</a></span>
                                            </div>
                                            @php
                                                $avgrating = 0;
                                            @endphp

                                            @foreach($product->orderItems->where('rstatus',1) as $orderItem)
                                                @php
                                                    $avgrating=$avgrating+$orderItem->review->rating;
                                                @endphp
                                            @endforeach
                                                <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    @if($avgrating)
                                                      <div class="product-rating" style="width:{{$avgrating/$product->orderItems->where('rstatus',1)->count()*20}}%"></div>
                                                    @else
                                                         <div class="product-rating" style="width:0%"></div>
                                                    @endif
                                                </div>

                                                <span class="font-small ml-5 text-muted"> ({{$product->orderItems->where('rstatus',1)->count()}} reviews)</span>
                                               </div>
                                         </div>
                                        <div class="clearfix product-price-cover">
                                            @php
                                                $loss=$product->regular_price-$product->sale_price;
                                                $percent=($loss/$product->regular_price)*100;
                                            @endphp
                                            <div class="product-price primary-color float-left">
                                                <ins><span class="text-brand">&#2547; {{$product->sale_price}}</span></ins>
                                                <ins><span class="old-price font-md ml-15">&#2547; {{$product->regular_price}}</span></ins>
                                                <span class="save-price  font-md color3 ml-15 mr-15">{{round($percent)}}% Off</span>
                                                @if($product->quantity)
                                                    <button class="button-3" role="button">Instock</button>
                                                @else
                                                    <button class="button-62" role="button">Outstock</button>
                                                @endif
                                                
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <p>{!! $product->short_description !!}</p>
                                        </div>
                                        {{--<div class="product_sort_info font-xs mb-30">
                                            <ul>
                                                <li class="mb-10"><i class="fi-rs-crown mr-5"></i> Warranty not available</li>
                                                <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 100% Authentic from Trusted Brand</li>
                                                <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 15 Day Easy Return Policy</li>
                                                <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                            </ul>
                                        </div>--}}

                                        @if(json_decode($product->color))
                                        <div class="attr-detail attr-color mb-15">
                                            <strong class="mr-10">Color</strong>
                                            <ul class="list-filter color-filter">
                                                @foreach(json_decode($product->color) as $color)
                                                <li value="{{$color}}" wire:click="showColor('{{ $color }}')"><a href="#" data-color="{{$color}}"><span class="product-color-{{$color}}"></span></a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        @if(json_decode($product->size))
                                        <div class="attr-detail attr-size">
                                            <strong class="mr-10">Size</strong>
                                            <ul class="list-filter size-filter font-small">
                                                @foreach(json_decode($product->size) as $size)
                                                <li value="{{$size}}" wire:click="showSize('{{ $size }}')"><a href="#">{{$size}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">
                                            <div class="detail-qty border radius">
                                                <a href="#" class="qty-down" wire:click.prevent="decreaseQuantity"><i class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val" wire:model="qty">{{$qty}}</span>
                                                <a href="#" class="qty-up" wire:click.prevent="increaseQuantity"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>


                                            <div class="product-extra-link2">
                                                <button type="submit" class="button button-add-to-cart" {{ $product->quantity == 0 ?'disabled':'' }} wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})">Add to cart</button>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#"><i class="fi-rs-heart"></i></a>
                                            </div>
                                        </div>
                                        <ul class="product-meta font-xs color-grey mt-10">
                                            <li class="mb-5">SKU: <a href="#">{{$product->sku_code}}</a></li>
                                            <li class="mb-5">Category: <a href="{{route('category.product',['slug'=>$product->category->slug])}}" rel="tag">{{$product->category->name}}</a></li>
                                            <li>Availability:<span class="in-stock text-success ml-5">{{$product->quantity}} Items</span></li>
                                        </ul>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews ({{$product->orderItems->where('rstatus',1)->count()}})</a>
                                    </li>
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                           <p>{!! $product->long_description !!}</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Additional-info">
                                        <table class="font-md">
                                            <tbody>
                                            <tr class="stand-up">
                                                <th>Stand Up</th>
                                                <td>
                                                    <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                                                </td>
                                            </tr>
                                            <tr class="folded-wo-wheels">
                                                <th>Folded (w/o wheels)</th>
                                                <td>
                                                    <p>32.5″L x 18.5″W x 16.5″H</p>
                                                </td>
                                            </tr>
                                            <tr class="folded-w-wheels">
                                                <th>Folded (w/ wheels)</th>
                                                <td>
                                                    <p>32.5″L x 24″W x 18.5″H</p>
                                                </td>
                                            </tr>
                                            <tr class="door-pass-through">
                                                <th>Door Pass Through</th>
                                                <td>
                                                    <p>24</p>
                                                </td>
                                            </tr>
                                            <tr class="frame">
                                                <th>Frame</th>
                                                <td>
                                                    <p>Aluminum</p>
                                                </td>
                                            </tr>
                                            <tr class="weight-wo-wheels">
                                                <th>Weight (w/o wheels)</th>
                                                <td>
                                                    <p>20 LBS</p>
                                                </td>
                                            </tr>
                                            <tr class="weight-capacity">
                                                <th>Weight Capacity</th>
                                                <td>
                                                    <p>60 LBS</p>
                                                </td>
                                            </tr>
                                            <tr class="width">
                                                <th>Width</th>
                                                <td>
                                                    <p>24″</p>
                                                </td>
                                            </tr>
                                            <tr class="handle-height-ground-to-handle">
                                                <th>Handle height (ground to handle)</th>
                                                <td>
                                                    <p>37-45″</p>
                                                </td>
                                            </tr>
                                            <tr class="wheels">
                                                <th>Wheels</th>
                                                <td>
                                                    <p>12″ air / wide track slick tread</p>
                                                </td>
                                            </tr>
                                            <tr class="seat-back-height">
                                                <th>Seat back height</th>
                                                <td>
                                                    <p>21.5″</p>
                                                </td>
                                            </tr>
                                            <tr class="head-room-inside-canopy">
                                                <th>Head room (inside canopy)</th>
                                                <td>
                                                    <p>25″</p>
                                                </td>
                                            </tr>
                                            <tr class="pa_color">
                                                <th>Color</th>
                                                <td>
                                                    <p>Black, Blue, Red, White</p>
                                                </td>
                                            </tr>
                                            <tr class="pa_size">
                                                <th>Size</th>
                                                <td>
                                                    <p>M, S</p>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="Reviews">
                                        <!--Comments-->
                                        <div class="comments-area">
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <h4 class="mb-30">Customer questions & answers</h4>
                                                    <div class="comment-list">
                                                        @foreach($product->orderItems->where('rstatus',1) as $orderItem)
                                                            @if($orderItem->review->status==1)
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="desc">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="product-rate d-inline-block">
                                                                            <div class="product-rating" style="width:{{$orderItem->review->rating*20}}%"></div>
                                                                        </div>
                                                                        <span>{{$orderItem->order->user->name}}</span>
                                                                        <p class="text-muted" style="padding-left: 500px">{{Carbon\Carbon::parse($orderItem->review->created_at)->diffForHumans()}}</p>
                                                                    </div>
                                                                    <p>{{ucwords($orderItem->review->comment)}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                            @endif
                                                        @endforeach
                                                    </div>

                                                </div>
                                                <div class="col-lg-3">
                                                    <h4 class="mb-30">Customer reviews</h4>
                                                    <div class="d-flex mb-30">
                                                        <div class="product-rate d-inline-block mr-15">
                                                            @if($avgrating)
                                                                <div class="product-rating" style="width:{{$avgrating/$product->orderItems->where('rstatus',1)->count()*20}}%"></div>
                                                            @else
                                                                <div class="product-rating" style="width:0%"></div>
                                                            @endif
                                                        </div>
                                                        @if($avgrating)
                                                        <h6>{{$avgrating/$product->orderItems->where('rstatus',1)->count()}} out of 5</h6>
                                                        @endif
                                                    </div>

                                                    <div class="progress">
                                                        <span>5 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                                    </div>

                                                    <div class="progress">
                                                        <span>4 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">40%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>3 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">30%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>2 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">5%</div>
                                                    </div>
                                                    <div class="progress mb-30">
                                                        <span>1 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">5%</div>
                                                    </div>
                                                    <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--comment form-->
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-60">
                                <div class="col-12">
                                    <h3 class="section-title style-1 mb-30">Related products</h3>
                                </div>
                                <div class="col-12">
                                    <div class="row related-products">
                                        @foreach($rproducts as $rproduct)
                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap small hover-up">
                                                <div class="product-img-action-wrap">
                                                        <div class="product-img product-img-zoom">
                                                            @if(strlen($rproduct->image > 25))
                                                                <a href="{{route('product.details',['slug'=>$rproduct->slug])}}"><img class="default-img" src="{{$rproduct->image}}" alt=""></a>
                                                            @else
                                                                <a href="{{route('product.details',['slug'=>$rproduct->slug])}}"><img class="default-img" src="{{asset('frontend/assets/images/product')}}/{{$rproduct->image}}" alt=""></a>
                                                            @endif
                                                        </div>
                                                    <div class="product-action-1">
                                                        <a  aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal" wire:click="quickView({{$rproduct}})"><i class="fi-rs-search"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                    </div>

                                                    @php
                                                        $loss=$rproduct->regular_price-$rproduct->sale_price;
                                                        $percent=($loss/$rproduct->regular_price)*100;
                                                    @endphp

                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">{{round($percent)}}% </span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2><a href="{{route('product.details',['slug'=>$rproduct->slug])}}" tabindex="0">{{ucwords($rproduct->name)}}</a></h2>

                                                    @php
                                                        $avgrating = 0;
                                                    @endphp

                                                    @foreach($rproduct->orderItems->where('rstatus',1) as $orderItem)
                                                        @php
                                                            $avgrating=$avgrating+$orderItem->review->rating;
                                                        @endphp
                                                    @endforeach

                                                    <div class="product-rate-cover">
                                                        <div class="product-rate d-inline-block">
                                                            @if($avgrating)
                                                                <div class="product-rating" style="width:{{$avgrating/$rproduct->orderItems->where('rstatus',1)->count()*20}}%"></div>
                                                            @else
                                                                <div class="product-rating" style="width:0%"></div>
                                                            @endif
                                                        </div>
                                                        <span class="font-small ml-5 text-muted"> ({{$rproduct->orderItems->where('rstatus',1)->count()}} reviews)</span>
                                                    </div>
                                                    <div class="product-price">
                                                        <span>&#2547;{{$rproduct->sale_price}} </span>
                                                        <span class="old-price">&#2547; {{$rproduct->regular_price}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="sidebar-widget product-sidebar  mb-3 p-3 bg-light border-radius-10">
                            <div class="widget-header position-relative mb-2 pb-2">
                                <p class="widget-title mb-2">Delivery</p>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            <div class="single-post clearfix">
                                <div class="row">
                                    <div class="col-8">
                                        <p><i class="fi-rs-marker mr-5"></i>Rafa Shop</p>
                                    </div>
                                    <div class="col-4">
                                        <a href="javascript:void(0)" class="text-info">CHANGE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post clearfix">
                                <div class="row">
                                    <div class="col-12">
                                        <p><i class="fi-rs-credit-card mr-5"></i>Cash on Delivery Available</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post clearfix">
                                <div class="row">
                                    <div class="col-12">
                                        <p><i class="fi-rs-crown mr-5"></i>Warranty not available</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post clearfix">
                                <div class="row">
                                    <div class="col-12">
                                        <p><i class="fi-rs-refresh mr-5"></i>15 Day Easy Return Policy</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post clearfix">
                                <div class="row">
                                    <div class="col-12">
                                        <p><i class="fi-rs-shop mr-5"></i>100% Authentic from Trusted Brand</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                            <ul class="categories">
                                @foreach($categories as $category)
                                <li><a href="{{route('category.product',['slug'=>$category->slug])}}">{{$category->name}} ({{$category->product->count() }})</a></li>
                                @endforeach
                            </ul>
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
                                    <div class="product-img product-img-zoom">
                                        @if(strlen($nproduct->image > 25))
                                            <a href="{{route('product.details',['slug'=>$nproduct->slug])}}"><img class="default-img" src="{{$nproduct->image}}" alt=""></a>
                                        @else
                                            <a href="{{route('product.details',['slug'=>$nproduct->slug])}}"><img class="default-img" src="{{asset('frontend/assets/images/product')}}/{{$nproduct->image}}" alt="">
                                            </a>
                                        @endif
                                    </div>
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

         <!-- Quick view -->
         <div wire:ignore.self class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     <div class="modal-body">
                         <div class="row">
                             <div class="col-md-6 col-sm-12 col-xs-12">
                                 <div class="detail-gallery">
                                     <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                     <!-- MAIN SLIDES -->
                                     <div class="product-image-slider">
                                         <figure class="border-radius-10">
                                             <img src="assets/imgs/shop/product-16-2.jpg" alt="product image">
                                         </figure>
                                         <figure class="border-radius-10">
                                             <img src="assets/imgs/shop/product-16-1.jpg" alt="product image">
                                         </figure>
                                         <figure class="border-radius-10">
                                             <img src="assets/imgs/shop/product-16-3.jpg" alt="product image">
                                         </figure>
                                         <figure class="border-radius-10">
                                             <img src="assets/imgs/shop/product-16-4.jpg" alt="product image">
                                         </figure>
                                         <figure class="border-radius-10">
                                             <img src="assets/imgs/shop/product-16-5.jpg" alt="product image">
                                         </figure>
                                         <figure class="border-radius-10">
                                             <img src="assets/imgs/shop/product-16-6.jpg" alt="product image">
                                         </figure>
                                         <figure class="border-radius-10">
                                             <img src="assets/imgs/shop/product-16-7.jpg" alt="product image">
                                         </figure>
                                     </div>
                                     <!-- THUMBNAILS -->
                                     <div class="slider-nav-thumbnails pl-15 pr-15">
                                         <div><img src="assets/imgs/shop/thumbnail-3.jpg" alt="product image"></div>
                                         <div><img src="assets/imgs/shop/thumbnail-4.jpg" alt="product image"></div>
                                         <div><img src="assets/imgs/shop/thumbnail-5.jpg" alt="product image"></div>
                                         <div><img src="assets/imgs/shop/thumbnail-6.jpg" alt="product image"></div>
                                         <div><img src="assets/imgs/shop/thumbnail-7.jpg" alt="product image"></div>
                                         <div><img src="assets/imgs/shop/thumbnail-8.jpg" alt="product image"></div>
                                         <div><img src="assets/imgs/shop/thumbnail-9.jpg" alt="product image"></div>
                                     </div>
                                 </div>
                                 <!-- End Gallery -->
                                 <div class="social-icons single-share">
                                     <ul class="text-grey-5 d-inline-block">
                                         <li><strong class="mr-10">Share this:</strong></li>
                                         <li class="social-facebook"><a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a></li>
                                         <li class="social-twitter"> <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a></li>
                                         <li class="social-instagram"><a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a></li>
                                         <li class="social-linkedin"><a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="col-md-6 col-sm-12 col-xs-12">
                                 <div class="detail-info">
                                     <h3 class="title-detail mt-30"></h3>
                                     <div class="product-detail-rating">
                                         <div class="pro-details-brand">
                                             <span> Brands: <a href="shop.html">Bootstrap</a></span>
                                         </div>
                                         <div class="product-rate-cover text-end">
                                             <div class="product-rate d-inline-block">
                                                 <div class="product-rating" style="width:90%">
                                                 </div>
                                             </div>
                                             <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                         </div>
                                     </div>
                                     <div class="clearfix product-price-cover">
                                         <div class="product-price primary-color float-left">
                                             <ins><span class="text-brand">$120.00</span></ins>
                                             <ins><span class="old-price font-md ml-15">$200.00</span></ins>
                                             <span class="save-price  font-md color3 ml-15">25% Off</span>
                                         </div>
                                     </div>
                                     <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                     <div class="short-desc mb-30">
                                         <p class="font-sm">Lorem ipsum dolor,sit amet consectetur adipisicing elit. Aliquam rem officia, corrupti reiciendis minima nisi modi,!</p>
                                     </div>
                                     <div class="attr-detail attr-color mb-15">
                                         <strong class="mr-10">Color</strong>
                                         <ul class="list-filter color-filter">
                                             <li><a href="#" data-color="Red"><span class="product-color-red"></span></a></li>
                                             <li><a href="#" data-color="Yellow"><span class="product-color-yellow"></span></a></li>
                                             <li class="active"><a href="#" data-color="White"><span class="product-color-white"></span></a></li>
                                             <li><a href="#" data-color="Orange"><span class="product-color-orange"></span></a></li>
                                             <li><a href="#" data-color="Cyan"><span class="product-color-cyan"></span></a></li>
                                             <li><a href="#" data-color="Green"><span class="product-color-green"></span></a></li>
                                             <li><a href="#" data-color="Purple"><span class="product-color-purple"></span></a></li>
                                         </ul>
                                     </div>
                                     <div class="attr-detail attr-size">
                                         <strong class="mr-10">Size</strong>
                                         <ul class="list-filter size-filter font-small">
                                             <li><a href="#">S</a></li>
                                             <li class="active"><a href="#">M</a></li>
                                             <li><a href="#">L</a></li>
                                             <li><a href="#">XL</a></li>
                                             <li><a href="#">XXL</a></li>
                                         </ul>
                                     </div>
                                     <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                     <div class="detail-extralink">
                                         <div class="detail-qty border radius">
                                             <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                             <span class="qty-val">1</span>
                                             <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                         </div>
                                         <div class="product-extra-link2">
                                             <button type="submit" class="button button-add-to-cart">Add to cart</button>
                                             <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                             <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                         </div>
                                     </div>
                                     <ul class="product-meta font-xs color-grey mt-50">
                                         <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>

                                         <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">Women</a>, <a href="#" rel="tag">Dress</a> </li>
                                         <li>Availability:<span class="in-stock text-success ml-5">8 Items In Stock</span></li>
                                     </ul>
                                 </div>
                                 <!-- Detail Info -->
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

     </main>









