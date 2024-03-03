<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home</a>
                <span></span> Blog
            </div>
        </div>
    </div>
    <section class="mt-20 mb-20">
        <div class="container custom">
            <div class="row">
                <div class="col-lg-9">
                    <div class="single-page pr-30">
                        <div class="single-header style-2">
                            <h2 class="mb-30">{{ucwords($product->name)}}</h2>
                            <div class="single-header-meta">
                                <div class="entry-meta meta-1 font-xs mt-15 mb-15">
                                    <span class="post-by">By <a href="#">Rafa</a></span>
                                    <span class="post-on has-dot">{{\Carbon\Carbon::parse($product->created_at)->format('d M Y')}}</span>
                                    <span class="time-reading has-dot">{{\Carbon\Carbon::parse($product->created_at)->diffForHumans()}}</span>
                                    <span class="hit-count  has-dot">{{$product->orderItems->where('rstatus',1)->count()}} reviews</span>
                                </div>
                                <div class="social-icons single-share">
                                    <ul class="text-grey-5 d-inline-block">
                                        <li><strong class="mr-10">Share this:</strong></li>
                                        <li class="social-facebook"><a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a></li>
                                        <li class="social-twitter"> <a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-twitter.svg')}}" alt=""></a></li>
                                        <li class="social-instagram"><a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a></li>
                                        <li class="social-linkedin"><a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-pinterest.svg')}}" alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <figure class="single-thumbnail text-center">
                            @if(strlen($product->image > 25))
                                <a href="{{route('product.details',['slug'=>$product->slug])}}"><img src="{{$product->image}}" alt=""></a>
                            @else
                                <a href="{{route('product.details',['slug'=>$product->slug])}}"><img src="{{asset('frontend/assets/images/product')}}/{{$product->image}}" alt=""></a>
                            @endif
                        </figure>
                        <div class="single-content">
                            <p>{!! $product->short_description !!}</p>
                            <p>Details:</p>
                            <h6>{{ucwords($product->name)}}</h6>
                            <p>{!! $product->long_description !!}</p>
                        </div>
                        <div class="entry-bottom mt-50 mb-30 wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
                            <div class="tags w-50 w-sm-100">
                                <a href="{{route('product.details',['slug'=>$product->slug])}}" rel="tag" class="hover-up btn btn-sm btn-rounded mr-10">SHOP NOW</a>
                            </div>
                            <div class="social-icons single-share">
                                <ul class="text-grey-5 d-inline-block">
                                    <li><strong class="mr-10">Share this:</strong></li>
                                    <li class="social-facebook"><a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a></li>
                                    <li class="social-twitter"> <a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-twitter.svg')}}" alt=""></a></li>
                                    <li class="social-instagram"><a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a></li>
                                    <li class="social-linkedin"><a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-pinterest.svg')}}" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="comments-area">
                            <div class="row">
                                @php
                                    $avgrating = 0;
                                @endphp

                                @foreach($product->orderItems->where('rstatus',1) as $orderItem)
                                    @php
                                        $avgrating=$avgrating+$orderItem->review->rating;
                                    @endphp
                                @endforeach
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
                                                                <span class="ml-5">{{$orderItem->order->user->name}}</span>
                                                                <span class="text-muted ml-20">{{Carbon\Carbon::parse($orderItem->review->created_at)->diffForHumans()}}</span>
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

                    </div>
                </div>
                @include('livewire.blog-sidebar-component')
            </div>
        </div>
    </section>
</main>
