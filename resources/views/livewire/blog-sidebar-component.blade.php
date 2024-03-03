<div class="col-lg-3 primary-sidebar sticky-sidebar" >
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
                                <a href="{{route('blogdetails.product',['slug'=>$nproduct->slug])}}"><img src="{{$nproduct->image}}" class="img-thumbnail rounded" alt=""></a>
                            @else
                                <a href="{{route('blogdetails.product',['slug'=>$nproduct->slug])}}"><img  src="{{asset('frontend/assets/images/product')}}/{{$nproduct->image}}" alt=""></a>
                            @endif
                        </div>
                        <div class="post-content media-body">
                            <h6 class="post-title mb-10 text-limit-2-row">{{ucwords($nproduct->name)}}</h6>
                            <div class="entry-meta meta-13 font-xxs color-grey">
                                <span class="post-on mr-10">{{\Carbon\Carbon::parse($nproduct->created_at)->format('d M Y')}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!--Widget ads-->
        <div class="banner-img fadeIn mb-45 animated d-lg-block d-none animated">
            <img src="{{asset('frontend/assets/imgs/banner/banner-11.jpg')}}" alt="" >
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
