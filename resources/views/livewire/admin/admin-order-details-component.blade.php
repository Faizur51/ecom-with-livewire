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
    </style>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> My Account
            </div>
        </div>
    </div>
    <section class="pt-10 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="row">
                        @include('livewire.admin.page-link')
                        <div class="col-md-10 shadow">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="card mb-3 mb-lg-0 shadow-sm">
                                                    <div class="text-center m-2">
                                                        <h5 class="mb-0 text-muted">My Order (2 Items)</h5>
                                                    </div>
                                                    @foreach($order->orderItems as $item)
                                                        <div style="border-bottom:1px solid #e2e9e1">
                                                            <div class="row card-body d-flex align-items-center">
                                                                <div class="col-md-4">
                                                                    @if(!$item->product->image)
                                                                        <img src="{{asset('frontend/assets/images/product')}}/{{$item->product->image}}" alt="#">
                                                                    @else
                                                                        <img src="{{asset('frontend/assets/imgs/shop/product-1-2.jpg')}}" alt="" style="width: 100px">
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <p class="text-muted" style="font-size: 18px">Name: {{ucwords($item->product->name)}}</p>
                                                                    <p>Quantity:{{$item->quantity}}</p>
                                                                    <p>Category: {{$item->product->category->name}}</p>
                                                                    @if($item->product->subCategories)
                                                                    <p>Sub Category: {{$item->product->subCategories->name}}</p>
                                                                    @endif
                                                                    <p>Brand: {{$item->product->brand->name}}</p>
                                                                    <p>Total: &#2547; {{$item->price*$item->quantity}}</p>
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
                                                                <p>Shipping</p><span>&#2547; 0</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <p>Total</p><span>&#2547; {{$order->total}}</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <p>Discount (points)</p><span>&#2547; 0</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <p>Payable Total</p><span>&#2547; {{$order->total}}</span>
                                                            </li>

                                                        </ul>

                                                        <div class="text-center m-2">
                                                            <h5 class="mb-0 text-muted">Shipping Info</h5>
                                                        </div>

                                                            <div class="card-body">
                                                                <p>Full Name :{{ucwords($order->name)}}</p>
                                                                <p>Phone No: {{$order->phone}}</p>
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
</main>
