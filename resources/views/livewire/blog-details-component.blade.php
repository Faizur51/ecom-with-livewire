<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home</a>
                <span></span> Blog Details
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
                            <div class="w-100 w-sm-100 text-center">
                                <a href="{{route('product.details',['slug'=>$product->slug])}}" rel="tag" class="hover-up btn btn-sm btn-rounded mr-10">SHOP NOW</a>
                            </div>
                        </div>
                    </div>

                    @foreach($rproducts as $rproduct)
                    <div class="single-page pr-30">
                        <div class="single-header style-2">
                            <h2 class="mb-30">{{ucwords($rproduct->name)}}</h2>
                            <div class="single-header-meta">
                                <div class="entry-meta meta-1 font-xs mt-15 mb-15">
                                    <span class="post-by">By <a href="#">Rafa</a></span>
                                    <span class="post-on has-dot">{{\Carbon\Carbon::parse($rproduct->created_at)->format('d M Y')}}</span>
                                    <span class="time-reading has-dot">8 mins read</span>
                                    <span class="hit-count  has-dot">29k Views</span>
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
                            @if(strlen($rproduct->image > 25))
                                <a href="{{route('product.details',['slug'=>$rproduct->slug])}}"><img src="{{$rproduct->image}}" alt=""></a>
                            @else
                                <a href="{{route('product.details',['slug'=>$rproduct->slug])}}"><img src="{{asset('frontend/assets/images/product')}}/{{$rproduct->image}}" alt=""></a>
                            @endif
                        </figure>
                        <div class="single-content">
                            <p>{!! $rproduct->short_description !!}</p>
                            <p>Details:</p>
                            <h6>{{ucwords($rproduct->name)}}</h6>
                            <p>{!! $rproduct->long_description !!}</p>
                        </div>
                        <div class="entry-bottom mt-50 mb-30 wow fadeIn animated" style="visibility: visible; animation-name: fadeIn">
                            <div class="w-100 w-sm-100 text-center">
                                <a href="{{route('product.details',['slug'=>$rproduct->slug])}}" rel="tag" class="hover-up btn btn-sm btn-rounded mr-10">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @include('livewire.blog-sidebar-component')
            </div>
        </div>
    </section>
</main>
