<main class="main">
    <style>
        .wishlisted {
            background-color: #F15412 !important;
            border: 1px solid transparent !important;
        }
        .wishlisted i {
            color: #fff !important;
        }
    </style>

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home</a>
                <span></span> My Account
            </div>
        </div>
    </div>
    <section class="pt-10 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="row">
                        @include('livewire.user.page-link')
                        <div class="col-md-10 shadow">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <h5 class="mb-0">Wishlist Item</h5>
                                        </div>
                                        <div class="card-body">
                                            <section class="mt-5 mb-5">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="row product-grid-3">
                                                                @if(Cart::instance('wishlist')->content()->count() >0)
                                                                    @foreach(Cart::instance('wishlist')->content() as $item)
                                                                        <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                                                            <div class="product-cart-wrap mb-30">
                                                                                <div class="product-img-action-wrap">
                                                                                    <div class="product-img product-img-zoom">
                                                                                        <a href="{{route('product.details',['slug'=>$item->model->slug])}}">
                                                                                            <img class="default-img" src="{{$item->model->image}}" alt="">
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                                                        @php
                                                                                            $loss=$item->model->regular_price-$item->model->sale_price;
                                                                                            $percent=($loss/$item->model->regular_price)*100;
                                                                                        @endphp
                                                                                        <span class="hot">{{round($percent)}}%</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="product-content-wrap">
                                                                                    <div class="product-category">
                                                                                        <a href="javascript:void(0)">{{$item->model->category->name}}</a>
                                                                                    </div>
                                                                                    <h2>
                                                                                        <a href="{{route('product.details',['slug'=>$item->model->slug])}}">{{ucwords($item->model->name)}}</a>
                                                                                    </h2>

                                                                                    <div class="product-rate-cover">
                                                                                        @php
                                                                                            $avgrating = 0;
                                                                                        @endphp
                                                                                        @foreach($item->model->orderItems->where('rstatus',1) as $orderItem)
                                                                                            @php
                                                                                                $avgrating=$avgrating+$orderItem->review->rating;
                                                                                            @endphp
                                                                                        @endforeach
                                                                                        <div class="product-rate d-inline-block">
                                                                                            @if($avgrating)
                                                                                                <div class="product-rating" style="width:{{$avgrating/$item->model->orderItems->where('rstatus',1)->count()*20}}%"></div>
                                                                                            @else
                                                                                                <div class="product-rating" style="width:0%"></div>
                                                                                            @endif
                                                                                        </div>
                                                                                        <span class="font-small ml-5 text-muted"> ({{$item->model->orderItems->where('rstatus',1)->count()}} reviews)</span>
                                                                                    </div>
                                                                                    <div class="product-price">
                                                                                        <span>&#2547; {{$item->model->sale_price}}</span>
                                                                                        <span class="old-price">&#2547; {{$item->model->regular_price}}</span>
                                                                                    </div>
                                                                                    <div class="product-action-1 show">
                                                                                        <a aria-label="Remove From Wishlist" class="action-btn hover-up wishlisted" href="#" wire:click.prevent="removeFromWishlist('{{$item->rowId}}')"> {{--$item->model->id--}} <i class="fi-rs-heart"></i></a>
                                                                                        <a aria-label="Move To Cart" class="action-btn hover-up" href="#" wire:click.prevent="moveProductFromWishlistToCart('{{$item->rowId}}')"><i class="fi-rs-heart"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    <div class="text-center">
                                                                        <img src="{{asset('frontend/assets/images/wishlist/wishlist4.jpg')}}" alt="" style="width: 80px">
                                                                        <p>There are no favorites yet</p>
                                                                        <p>Add your favorites to wishlist and they will show here</p>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
