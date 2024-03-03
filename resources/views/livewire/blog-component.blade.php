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

    <section class="mt-20 mb-20">
        <div class="container custom">
            <div class="row">
                <div class="col-lg-9">
                    <div class="single-header mb-10">
                        <h1 class="font-xl text-brand">Our Product</h1>
                    </div>
                    <div class="loop-grid pr-30">
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-lg-6">
                                <article class="wow fadeIn animated hover-up mb-30">
                                    <div class="post-thumb img-hover-scale">
                                            @if(strlen($product->image > 25))
                                                <a href="{{route('blogdetails.product',['slug'=>$product->slug])}}"><img src="{{$product->image}}" alt="" style="width:1200px;height:400px"></a>
                                            @else
                                                <a href="{{route('blogdetails.product',['slug'=>$product->slug])}}"><img src="{{asset('frontend/assets/images/product')}}/{{$product->image}}" alt=""></a>
                                            @endif
                                        <div class="entry-meta">
                                            <a class="entry-meta meta-2" href="{{route('singleblog',['slug'=>$product->slug])}}">New</a>
                                        </div>
                                    </div>
                                    <div class="entry-content-2">
                                        <h3 class="post-title mb-15"><a href="{{route('blogdetails.product',['slug'=>$product->slug])}}">{{ucwords($product->name)}}</a></h3>
                                        <p class="post-exerpt mb-30">{!! Str::limit($product->short_description, 100) !!} </p>
                                        <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                            <div>
                                                <span class="post-on"> <i class="fi-rs-clock"></i> {{\Carbon\Carbon::parse($product->created_at)->format('d M Y')}}</span>
                                                <span class="hit-count has-dot">126k Views</span>
                                            </div>
                                            <a href="{{route('blogdetails.product',['slug'=>$product->slug])}}" class="text-brand">Read more <i class="fi-rs-arrow-right"></i></a>
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
                                {{$products->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
                @include('livewire.blog-sidebar-component')
            </div>
        </div>
    </section>
</main>
