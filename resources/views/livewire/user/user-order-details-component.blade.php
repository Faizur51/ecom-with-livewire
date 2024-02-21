<main class="main">
    <style>
        .navigation_menu {
            font-family: 'Helvetica';
            font-size: 14px;
            margin-top: 5px;
            margin-left: 5px;
            margin-bottom: 10px;
        }
        .navigation_tabs {
            counter-reset: step;
            position: relative;
            padding-left: 45px;
            list-style: none;
        }
        .navigation_tabs::before {
            display: inline-block;
            content: '';
            position: absolute;
            top: 0;
            left: 18px;
            width: 10px;
            height: 100%;
            border-left: 2px solid #CCC;
        }
        .navigation_menu ul {
            list-style-type: none;
            padding-right: 0;
            margin-top: 0;
            margin-left: 0;
            margin-right: 0px;
            margin-bottom: 0;
        }
        .navigation_menu li {
            position: relative;
            counter-increment: list;
        }
        .navigation_menu li:before {
            display: inline-block;
            content: '';
            position: absolute;
            left: -30px;
            height: 100%;
            width: 10px;
        }
        .navigation_menu li:after {
            content: counter(step);
            counter-increment: step;
            display: inline-block;
            position: absolute;
            top: 0;
            left: -39px;
            width: 30px;
            height: 30px;
            line-height: 26px;
            border: 1px solid #DDD;
            border-radius: 50%;
            background-color: #FFF;
            display: block;
            text-align: center;
            margin: 0 auto 10px auto;
        }
        .navigation_menu li:not(:last-child) {
            padding-bottom: 25px;
        }
        .navigation_menu li.tab_inactive:before {
            border-left: 3px solid green;
            margin-left: 3px;
        }
        .navigation_menu li.tab_active:after {
            border: 1px solid green;
        }
        .navigation_menu li.tab_inactive:after {
            content: "\2713";
            font-size: 20px;
            color: #FFF;
            text-align: center;
            border: 1px solid green;
            background-color: green;
        }
        .navigation_tabs li a,
        .navigation_tabs li a {
            display: block;
            padding-top: 8px;
            text-decoration: none;
            color: #000;
        }
        .navigation_tabs li.tab_inactive a {
            color: green;
        }
        .navigation_tabs li.tab_disabled a {
            pointer-events: none;
            cursor: default;
            text-decoration: none;
        }
        .navigation_tabs li.tab_active a:hover,
        .navigation_tabs li.tab_inactive a:hover {
            font-weight: bold;
        }

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
                                    <div class="card-body">
                                        @if(Session::has('cancel_message'))
                                            <div class="alert alert-info">{{Session::get('cancel_message')}}</div>
                                        @endif
                                        @if(Carbon\Carbon::parse($order->created_at)->addDays(1)->format('d-m-y')>=\Carbon\Carbon::now()->format('d-m-y'))
                                        <div class="alert alert-success text-end"><a  class="btn-small" data-bs-toggle="modal" data-bs-target="#exampleModal">Cancel Order</a></div>
                                            @else
                                                <div class="alert alert-danger text-center"><a  class="btn-small">Time is over so Orders cannot be cancelled</a></div>
                                            @endif
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="card mb-3 mb-lg-0 shadow-sm">
                                                    <div class="text-center m-2">
                                                        <h5 class="mb-0 text-muted">My Order ({{count($order->orderItems)}} Items)</h5>
                                                    </div>
                                                    @foreach($order->orderItems as $item)
                                                    <div style="border-bottom:1px solid #e2e9e1">
                                                        <div class="row card-body d-flex justify-content-around align-items-center">
                                                            <div class="col-md-3">
                                                                    @if(strlen($item->product->image)>25)
                                                                        <img src="{{$item->product->image}}" alt="#">
                                                                    @else
                                                                        <img src="{{asset('frontend/assets/images/product')}}/{{$item->product->image}}" alt="#">
                                                                    @endif
                                                            </div>
                                                            <div class="col-md-7">
                                                                <a href="{{route('product.details',['slug'=>$item->product->slug])}}" class="text-default" style="font-size: 16px">{{ucwords($item->product->name)}}</a>
                                                                <br>
                                                                @if($item->options)
                                                                    @foreach(unserialize($item->options) as $key=>$value)
                                                                        @if($value)
                                                                            <span>{{ucwords($key)}}:{{ucwords($value)}}</span>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                                <p>Quantity:{{$item->quantity}}</p>
                                                                <p>Category: {{$item->product->category->name}}</p>
                                                                @if($item->product->subCategories)
                                                                    <p>Sub Category: {{$item->product->subCategories->name}}</p>
                                                                @endif
                                                                <p>Brand: {{$item->product->brand->name}}</p>
                                                                <p>Total: &#2547; {{$item->price*$item->quantity}}</p>
                                                            </div>

                                                           <div class="col-md-2">
                                                               @if($order->status=='delivery' && $item->rstatus== false)
                                                                   <a href="#" class="btn-small" data-bs-toggle="modal" data-bs-target="#productReview" wire:click.prevent="ProductReview({{$item->id}})" ><i class="fi-rs-pencil"></i></a>
                                                               @endif
                                                           </div>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                </div>

                                            </div>

                                            <div class="col-lg-4">
                                                <div class="card mb-3 mb-lg-0 shadow-sm">
                                                    <div class="text-center m-2">
                                                        <h5 class="mb-0 text-muted">Checkout Summary</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <p>Subtotal</p><span>&#2547; {{$order->subtotal}}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <p>Shipping</p><span>&#2547; {{number_format($order->shipping_charge,2)}}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <p>Total</p><span>&#2547; {{number_format($order->total,2)}}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <p>Payable Total</p><span>&#2547; {{number_format($order->total,2)}}</span>
                                                            </li>
                                                        </ul>
                                                        <div class="text-center m-2">
                                                            <hr>
                                                            <h5 class="mb-0 text-muted">Shipping Info</h5>
                                                            <hr>
                                                        </div>
                                                            <div class="card-body">
                                                                <p>Full Name :{{ucwords($order->name)}}</p>
                                                                <p>Phone No: {{$order->phone}}</p>
                                                                <p>Email: {{$order->email}}</p>
                                                                <p>City: {{ucwords($order->city)}}</p>
                                                                <p>Address: {{ucwords($order->address)}}</p>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="card mb-3 mb-lg-0 shadow-sm">
                                                    <div class="text-center m-2">
                                                        <h5 class="mb-0 text-muted">Order History</h5>
                                                    </div>
                                                    @if($order->status=='delivery')
                                                        <div class="navigation_menu" id="navigation_menu">
                                                            <ul class="navigation_tabs" id="navigation_tabs">
                                                                <li class="tab_inactive">
                                                                    <a href="#"><p>Delivery (Expected Date:({{Carbon\Carbon::parse($order->processed_date)->addDays(3)->format('d/m/Y')}}))</p>
                                                                        <p> Your package has not yet been delivered.</p></a>
                                                                </li>
                                                                <li class="tab_inactive">
                                                                    <a href="#"><p>Shipped({{Carbon\Carbon::parse($order->processed_date)->format('d/m/Y')}})</p>
                                                                        <p>Your package has been picked by a delivery man and shipped.</p></a>
                                                                </li>
                                                                <li class="tab_inactive">
                                                                    <a href="#"><p>Processed({{Carbon\Carbon::parse($order->processed_date)->format('d/m/Y')}})</p>
                                                                        <p>Your package has been processed.</p></a>
                                                                </li>
                                                                <li class="tab_inactive">
                                                                    <a href="#"><p>Confirmed</p>
                                                                        <p>Your order has been placed and confirmed.</p></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @elseif($order->status=='shipping')
                                                        <div class="navigation_menu" id="navigation_menu">
                                                            <ul class="navigation_tabs" id="navigation_tabs">
                                                                <li class="tab_disabled">
                                                                    <a href="#"><p>Delivery (Expected Date)</p>
                                                                        <p> Your package has not yet been delivered.</p></a>
                                                                </li>
                                                                <li class="tab_inactive">
                                                                    <a href="#"><p>Shipped({{Carbon\Carbon::parse($order->processed_date)->format('d/m/Y')}})</p>
                                                                        <p>Your package has been picked by a delivery man and shipped.</p></a>
                                                                </li>
                                                                <li class="tab_inactive">
                                                                    <a href="#"><p>Processed({{Carbon\Carbon::parse($order->processed_date)->format('d/m/Y')}})</p>
                                                                        <p>Your package has been processed.</p></a>
                                                                </li>
                                                                <li class="tab_inactive">
                                                                    <a href="#"><p>Confirmed</p>
                                                                        <p>Your order has been placed and confirmed.</p></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @elseif($order->status==='processed')
                                                        <div class="navigation_menu" id="navigation_menu">
                                                            <ul class="navigation_tabs" id="navigation_tabs">
                                                                <li class="tab_disabled">
                                                                    <a href="#"><p>Delivery (Expected Date)</p>
                                                                        <p> Your package has not yet been delivered.</p></a>
                                                                </li>
                                                                <li class="tab_disabled">
                                                                    <a href="#"><p>Shipped</p>
                                                                        <p>Your package has been picked by a delivery man and shipped.</p></a>
                                                                </li>
                                                                <li class="tab_inactive">
                                                                    <a href="#"><p>Processed({{Carbon\Carbon::parse($order->processed_date)->format('d/m/Y')}})</p>
                                                                        <p>Your package has been processed.</p></a>
                                                                </li>
                                                                <li class="tab_inactive">
                                                                    <a href="#"><p>Confirmed</p>
                                                                        <p>Your order has been placed and confirmed.</p></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @elseif($order->status==='ordered')
                                                        <div class="navigation_menu" id="navigation_menu">
                                                            <ul class="navigation_tabs" id="navigation_tabs">
                                                                <li class="tab_disabled">
                                                                    <a href="#"><p>Delivery (Expected Date)</p>
                                                                        <p> Your package has not yet been delivered.</p></a>
                                                                </li>
                                                                <li class="tab_disabled">
                                                                    <a href="#"><p>Shipped</p>
                                                                        <p>Your package has been picked by a delivery man and shipped.</p></a>
                                                                </li>
                                                                <li class="tab_disabled">
                                                                    <a href="#"><p>Processed</p>
                                                                        <p>Your package has been processed.</p></a>
                                                                </li>
                                                                <li class="tab_inactive">
                                                                    <a href="#"><p>Confirmed</p>
                                                                        <p>Your order has been placed and confirmed.</p></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @elseif($order->status==='canceled')
                                                        <div class="navigation_menu" id="navigation_menu">
                                                            <ul class="navigation_tabs" id="navigation_tabs">
                                                                <li class="tab_disabled">
                                                                    <a href="#"><p>Delivery (Expected Date)</p>
                                                                        <p> Your package has not yet been delivered.</p></a>
                                                                </li>
                                                                <li class="tab_disabled">
                                                                    <a href="#"><p>Shipped</p>
                                                                        <p>Your package has been picked by a delivery man and shipped.</p></a>
                                                                </li>
                                                                <li class="tab_disabled">
                                                                    <a href="#"><p>Processed</p>
                                                                        <p>Your package has been processed.</p></a>
                                                                </li>
                                                                <li class="tab_inactive">
                                                                    <a href="#"><p class="text-danger">Canceled</p>
                                                                        <p>Order has been canceled.</p></a>
                                                                        <p>Reason:{{ucwords($order->cancel_reason)}}</p>
                                                                        <p>{{\Carbon\Carbon::parse($order->cancel_date)->format('d M Y,i:m:a')}}</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
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

    <div class="modal fade" id="productReview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
         wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="col-lg-12">
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex ">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb text-center mr-10">
                                            @if(strlen($image > 25))
                                                <img src="{{$image}}" alt="" style="width: 100px">
                                            @else
                                                <img src="{{asset('frontend/assets/images/product')}}/{{$image}}" alt="" style="width: 100px">
                                            @endif
                                        </div>
                                        <div class="desc">
                                            <h5 class="text-muted">{{ucwords($name)}}</h5>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <p class="font-xs mr-30">December 4, 2020 at 3:12 pm </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment_form">
                            <div class="product-rate d-inline-block mb-30" style=" visibility: hidden;"></div>
                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" wire:model="rating"/>
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" wire:model="rating"/>
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" wire:model="rating" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" wire:model="rating" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" wire:model="rating"/>
                                <label for="star1" title="text">1 star</label>
                            </div>
                            @error('rating') <p class="text-danger">{{$message}}</p> @enderror
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <form class="form-contact comment_form" action="#" id="commentForm">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea class="form-control w-100 h-25" wire:model="comment" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                </div>
                                                @error('comment') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm faizbtn" wire:click.prevent="addReview()">Submit Review</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to cancel this order?</h5>
                    <p>Please provide cancellation reason:</p>
                    <textarea wire:model="cancel_reason"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="width: 100%" wire:click.prevent="cancelOrder()" >Submit</button>
                </div>
            </div>
        </div>
    </div>
</main>
