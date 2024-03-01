<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home</a>
                <span></span> Blog
            </div>
        </div>
    </div>

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

    <section class="mt-50 mb-50">
        <div class="container custom">
            <div class="row">
                <div class="col-lg-9">
                    <div class="single-header mb-50">
                        <h1 class="font-xl text-brand">Our Blog</h1>
                        <div class="entry-meta meta-1 font-xs mt-15 mb-15">
                            <span class="post-by">32 Sub Categories</span>
                            <span class="post-on has-dot">1020k Article</span>
                            <span class="time-reading has-dot">480 Authors</span>
                            <span class="hit-count  has-dot">29M Views</span>
                        </div>
                    </div>
                    <div class="loop-grid pr-30">
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-lg-6">
                                <article class="wow fadeIn animated hover-up mb-30">
                                    <div class="post-thumb img-hover-scale">
                                            @if(strlen($product->image > 25))
                                                <a href="blog-details.html"><img src="{{$product->image}}" alt=""></a>
                                            @else
                                                <a href="blog-details.html"><img src="{{asset('frontend/assets/images/product')}}/{{$product->image}}" alt=""></a>
                                            @endif
                                        <div class="entry-meta">
                                            <a class="entry-meta meta-2" href="blog.html">Politic</a>
                                        </div>
                                    </div>
                                    <div class="entry-content-2">
                                        <h3 class="post-title mb-15"><a href="blog-details.html">{{$product->category->name}}</a></h3>
                                        <p class="post-exerpt mb-30">{!! $product->short_description !!}</p>
                                        <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                            <div>
                                                <span class="post-on"> <i class="fi-rs-clock"></i> 25 April 2022</span>
                                                <span class="hit-count has-dot">126k Views</span>
                                            </div>
                                            <a href="blog-details.html" class="text-brand">Read more <i class="fi-rs-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!--post-grid-->
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">16</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="widget-area">
                        <div class="sidebar-widget widget_search mb-50">
                            <div class="search-form">
                                <form action="#">
                                    <input type="text" placeholder="Search…">
                                    <button type="submit"> <i class="fi-rs-search"></i> </button>
                                </form>
                            </div>
                        </div>
                        <!--Widget categories-->
                        <div class="sidebar-widget widget_categories mb-40">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title">Categories</h5>
                            </div>
                            <div class="post-block-list post-module-1 post-module-5">
                                @if($categories->count()>0)
                                <ul>
                                    @foreach($categories as $category)
                                    <li class="cat-item cat-item-2"><a href="{{route('category.product',['slug'=>$category->slug])}}">{{$category->name}}</a> ({{$category->product->count() }})</li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                        <!--Widget latest posts style 1-->
                        <div class="sidebar-widget widget_alitheme_lastpost mb-20">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title">Trending Now</h5>
                            </div>
                            <div class="row">
                                @foreach($nproducts as $nproduct)
                                <div class="col-md-6 col-sm-6 sm-grid-content mb-30">
                                    <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                        @if(strlen($nproduct->image > 25))
                                            <a href="blog-details.html"><img src="{{$nproduct->image}}" alt=""></a>
                                        @else
                                            <a href="blog-details.html"><img  src="{{asset('frontend/assets/images/product')}}/{{$nproduct->image}}" alt=""></a>
                                        @endif
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-10 text-limit-2-row">{{ucwords($nproduct->name)}}</h6>
                                        <div class="entry-meta meta-13 font-xxs color-grey">
                                            <span class="post-on mr-10">25 April</span>
                                            <span class="hit-count has-dot ">126k Views</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!--Widget ads-->
                        <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none animated">
                            <img src="{{asset('frontend/assets/imgs/banner/banner-11.jpg')}}" alt="">
                            <div class="banner-text">
                                <span>Women Zone</span>
                                <h4>Save 17% on <br>Office Dress</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                        <!--Widget Tags-->
                        <div class="sidebar-widget widget_tags mb-50">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title">Popular tags </h5>
                            </div>
                            <div class="tagcloud">
                                <a class="tag-cloud-link" href="blog.html">beautiful</a>
                                <a class="tag-cloud-link" href="blog.html">New York</a>
                                <a class="tag-cloud-link" href="blog.html">droll</a>
                                <a class="tag-cloud-link" href="blog.html">intimate</a>
                                <a class="tag-cloud-link" href="blog.html">loving</a>
                                <a class="tag-cloud-link" href="blog.html">travel</a>
                                <a class="tag-cloud-link" href="blog.html">fighting </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
