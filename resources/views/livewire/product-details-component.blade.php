     <main class="main" wire:ignore>

        <style>
            .rate {
                float: left;
                height: 46px;
                padding: 0 10px;
            }
            .rate:not(:checked) > input {
                position:absolute;
                top:-9999px;
            }
            .rate:not(:checked) > label {
                float:right;
                width:1em;
                overflow:hidden;
                white-space:nowrap;
                cursor:pointer;
                font-size:30px;
                color:#ccc;
            }
            .rate:not(:checked) > label:before {
                content: '★ ';
            }
            .rate > input:checked ~ label {
                color: #ffc700;
            }
            .rate:not(:checked) > label:hover,
            .rate:not(:checked) > label:hover ~ label {
                color: #deb217;
            }
            .rate > input:checked + label:hover,
            .rate > input:checked + label:hover ~ label,
            .rate > input:checked ~ label:hover,
            .rate > input:checked ~ label:hover ~ label,
            .rate > label:hover ~ input:checked ~ label {
                color: #c59b08;
            }

        </style>

        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Fashion
                    <span></span> Abstract Print Patchwork Dress
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{$product->image}}" alt="product image">
                                            </figure>

                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                            <div><img src="{{asset('frontend')}}/assets/imgs/shop/thumbnail-3.jpg" alt="product image"></div>
                                            <div><img src="{{asset('frontend')}}/assets/imgs/shop/thumbnail-4.jpg" alt="product image"></div>
                                            <div><img src="{{asset('frontend')}}/assets/imgs/shop/thumbnail-5.jpg" alt="product image"></div>
                                            <div><img src="{{asset('frontend')}}/assets/imgs/shop/thumbnail-6.jpg" alt="product image"></div>
                                            <div><img src="{{asset('frontend')}}/assets/imgs/shop/thumbnail-7.jpg" alt="product image"></div>
                                            <div><img src="{{asset('frontend')}}/assets/imgs/shop/thumbnail-8.jpg" alt="product image"></div>
                                            <div><img src="{{asset('frontend')}}/assets/imgs/shop/thumbnail-9.jpg" alt="product image"></div>
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                    <div class="social-icons single-share">
                                        <ul class="text-grey-5 d-inline-block">
                                            <li><strong class="mr-10">Share this:</strong></li>
                                            <li class="social-facebook"><a href="#"><img src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-facebook.svg" alt=""></a></li>
                                            <li class="social-twitter"> <a href="#"><img src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-twitter.svg" alt=""></a></li>
                                            <li class="social-instagram"><a href="#"><img src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-instagram.svg" alt=""></a></li>
                                            <li class="social-linkedin"><a href="#"><img src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail">{{ucwords($product->name)}}</h2>
                                        <div class="product-detail-rating">
                                            <div class="pro-details-brand">
                                                <span> Brands: <a href="shop.html">{{$product->brand->name}}</a></span>
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
                                            <div class="product-price primary-color float-left">
                                                <ins><span class="text-brand">&#2547; {{$product->sale_price}}</span></ins>
                                                <ins><span class="old-price font-md ml-15">&#2547; {{$product->regular_price}}</span></ins>
                                                <span class="save-price  font-md color3 ml-15">25% Off</span>
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <p>{{$product->short_description}}</p>
                                        </div>
                                        <div class="product_sort_info font-xs mb-30">
                                            <ul>
                                                <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera Brand Warranty</li>
                                                <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy</li>
                                                <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                            </ul>
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
                                                <a href="#" class="qty-down" wire:click.prevent="decreaseQuantity"><i class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val" wire:model="qty">{{$qty}}</span>
                                                <a href="#" class="qty-up" wire:click.prevent="increaseQuantity"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                            <div class="product-extra-link2">
                                                <button type="submit" class="button button-add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})">Add to cart</button>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                        </div>
                                        <ul class="product-meta font-xs color-grey mt-50">
                                            <li class="mb-5">SKU: <a href="#">{{$product->sku_code}}</a></li>
                                            <li class="mb-5">Category: <a href="{{route('category.product',['slug'=>$product->category->slug])}}" rel="tag">{{$product->category->name}}</a></li>
                                            <li>Availability:<span class="in-stock text-success ml-5">8 Items In Stock</span></li>
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
                                           <p>{{$product->long_description}}</p>
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
                                                <div class="col-lg-8">
                                                    <h4 class="mb-30">Customer questions & answers</h4>
                                                    <div class="comment-list">
                                                        @foreach($product->orderItems->where('rstatus',1) as $orderItem)
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="{{asset('frontend/assets/images/profile')}}/{{$orderItem->order->user->profile->image}}" alt="">
                                                                    <h6><a href="#">{{$orderItem->order->user->name}}</a></h6>
                                                                    <p class="font-xxs">{{Carbon\Carbon::parse($orderItem->review->created_at)->format('d-m-Y')}}</p>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="product-rate d-inline-block">
                                                                        <div class="product-rating" style="width:{{$orderItem->review->rating*20}}%">
                                                                        </div>
                                                                    </div>
                                                                    <p>{{ucwords($orderItem->review->comment)}}</p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <p class="font-xs mr-30">{{Carbon\Carbon::parse($orderItem->review->created_at)->format('d F Y g:i A')}} </p>
                                                                            <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
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
                                                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>3 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>2 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                                    </div>
                                                    <div class="progress mb-30">
                                                        <span>1 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
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
                                                        <a href="{{route('product.details',['slug'=>$rproduct->slug])}}" tabindex="0">
                                                            <img class="default-img" src="{{$rproduct->image}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a  aria-label="Quick view" class="action-btn small hover-up"  data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">Hot </span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2><a href="product-details.html" tabindex="0">{{ucwords($rproduct->name)}}</a></h2>
                                                    <div class="rating-result" title="90%">
                                                        <span>
                                                        </span>
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
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                            <ul class="categories">
                                @foreach($categories as $category)
                                <li><a href="shop.html">{{$category->name}} ({{$category->product->count() }})</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none">
                            <img src="{{asset('frontend')}}/assets/imgs/banner/banner-11.jpg" alt="">
                            <div class="banner-text">
                                <span>Women Zone</span>
                                <h4>Save 17% on <br>Office Dress</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
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
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:90%"></div>
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









