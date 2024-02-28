<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Your Cart
                </div>
            </div>
        </div>
        <section class="mt-20 mb-20">
            <div class="container">
                @if(Cart::instance('cart')->count()>0)
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            @if(Cart::instance('cart')->content()->count() > 0)
                            <table class="table shopping-summery text-center">
                                <thead class="bg-light">
                                <tr class="main-heading">
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Cart::instance('cart')->content() as $item)
                                <tr>
                                    <td class="image product-thumbnail">
                                            @if(strlen($item->model->image)>25)
                                            <img src="{{$item->model->image}}" alt="#">
                                            @else
                                                <img src="{{asset('frontend/assets/images/product')}}/{{$item->model->image}}" alt="#">
                                            @endif
                                    </td>
                                    <td class="product-des product-name">
                                        <h5 class="product-name">
                                            <a href="{{route('product.details',['slug'=>$item->model->slug])}}">
                                                {{ucwords($item->model->name)}}
                                                @if($item->options->color)
                                                    <strong class="mr-2">;Color:{{ucwords($item->options->color)}}</strong>
                                                @endif
                                                @if($item->options->size)
                                                    <strong>,Size:{{$item->options->size}}</strong>
                                                @endif
                                            </a>
                                        </h5>
                                    </td>
                                    <td class="price" data-title="Price"><span>&#2547; {{$item->model->sale_price}} </span></td>
                                    <td class="text-center" data-title="Stock">
                                        <div class="detail-qty border radius  m-auto">
                                            <a href="#" class="qty-down" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"><i class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val">{{$item->qty}}</span>
                                            <a href="#" class="qty-up" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        <span>&#2547; {{$item->subtotal}} </span>
                                    </td>
                                    <td class="action" data-title="Remove"><a href="#" wire:click.prevent="destroy('{{$item->rowId}}')" class="text-muted"><i class="fi-rs-trash"></i></a></td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6" class="text-end">
                                        <a href="#" class="text-muted" wire:click.prevent="clearAll('{{$item->rowId}}')"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            @else
                                <h1>Cart Item Not Found</h1>
                            @endif
                        </div>
                        <div class="cart-action text-end">
                            <a class="btn text-uppercase btn-sm" href="/"><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                        </div>
                        <div class="divider center_icon mt-20 mb-20"><i class="fi-rs-fingerprint"></i></div>
                        <div class="row mb-20">
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-20 mt-20">
                                    <div class="heading_s1 mb-3">
                                        <h4>Apply Coupon</h4>
                                    </div>
                                    <div class="total-amount">
                                        <div class="left">
                                            <div class="coupon">
                                                <form action="#" target="_blank">
                                                    <div class="form-row row justify-content-center">
                                                        <div class="form-group col-lg-6">
                                                            <input class="font-medium" name="Coupon" placeholder="Enter Your Coupon">
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <button class="btn  btn-sm text-uppercase"><i class="fi-rs-label mr-10"></i>Apply</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>Cart Totals</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td class="cart_total_label bg-light">Cart Subtotal</td>
                                                <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">&#2547; {{Cart::instance('cart')->subtotal()}}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label bg-light">Shipping</td>
                                                <td class="cart_total_amount">
                                                    <p>Flat rate (inside Dhaka) : &#2547; 70</p>
                                                    <p>Note: Shipping outside Dhaka will be &#2547; 120</p>
                                                    <p>Shipping options will be updated during checkout.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label bg-light">Total</td>
                                                <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">&#2547; {{Cart::instance('cart')->total()}}</span></strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="#" class="btn text-uppercase btn-sm" wire:click.prevent="checkout"> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <div class="text-center" style="padding: 5px 0">
                        <h1>Your Cart is empty</h1>
                        <p>Add items to it now!</p>
                        <img src="{{asset('frontend/assets/images/cart/cart1.jpeg')}}" alt="" >
                        <br>
                        <a href="/" class="btn btn-primary ">Shop Now</a>
                    </div>
                @endif
            </div>
        </section>
    </main>

