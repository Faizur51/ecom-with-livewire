    <header class="header-area header-style-1 header-height-2">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                            <ul>
                                <li>
                                    <a class="language-dropdown-active" href="#"> <i class="fi-rs-world"></i> English <i class="fi-rs-angle-small-down"></i></a>
                                    <ul class="language-dropdown">
                                        <li><a href="#"><img src="{{asset('frontend')}}/assets/imgs/theme/flag-fr.png" alt="">Français</a></li>
                                        <li><a href="#"><img src="{{asset('frontend')}}/assets/imgs/theme/flag-dt.png" alt="">Deutsch</a></li>
                                        <li><a href="#"><img src="{{asset('frontend')}}/assets/imgs/theme/flag-ru.png" alt="">Pусский</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    <li>Get great devices up to 50% off <a href="{{route('shop')}}">View details</a></li>
                                    <li>Supper Value Deals - Save more with coupons</li>
                                    <li>Trendy 25silver jewelry, save up 35% off today <a href="{{route('shop')}}">Shop now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            <ul>
                                @auth
                                    @if(Auth::user()->utype === 'admin')
                                    <li>
                                        <i class="fi-rs-user"></i>
                                        <a class="language-dropdown-active" href="{{route('login')}}"> {{Str::limit(ucwords(auth()->user()->name),30,'.....')}} <i class="fi-rs-angle-small-down"></i></a>
                                        <ul class="language-dropdown" style="width: 220px;padding: 10px;font-size: 18px">
                                            <li><a href="{{route('admin.dashboard')}}"><i class="fi-rs-marker mr-10"></i>Manage Dashboard</a></li>
                                            <li><a href="{{route('admin.setting')}}"><i class="fi-rs-settings mr-10"></i>Manage Setting</a></li>
                                            <li><a href="{{route('admin.review')}}"><i class="fi-rs-star mr-10"></i>Manage Review</a></li>
                                            <li><a href="{{route('admin.slider')}}"><i class="fi-rs-settings-sliders mr-10"></i>Manage Slider</a></li>
                                            <li><a href="{{route('admin.customer')}}"><i class="fi-rs-users mr-10"></i>Manage Customers</a></li>
                                            <li><a href="{{route('admin.manage.product')}}"><i class="fi-rs-shopping-bag mr-10"></i>Manage Product</a></li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a href="route('logout')"
                                                       onclick="event.preventDefault();
                                                           this.closest('form').submit();">
                                                        <i class="fi-rs-sign-out mr-10"></i> {{ __('Log Out') }}
                                                    </a>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                    @else
                                        <li>
                                            <i class="fi-rs-user"></i>
                                            <a class="language-dropdown-active" href="{{route('login')}}">{{Str::limit(ucwords(auth()->user()->name),30,'.....')}}<i class="fi-rs-angle-small-down"></i></a>
                                            <ul class="language-dropdown" style="width: 220px;padding: 10px;font-size: 18px">
                                                <li><a href="{{route('user.dashboard')}}"><i class="fi-rs-settings mr-10"></i>Manage Dashboard</a></li>
                                                <li><a href="{{route('user.order')}}"><i class="fi-rs-marker mr-10"></i>Manage Order</a></li>
                                                <li><a href="{{route('user.review')}}"><i class="fi-rs-star mr-10"></i>Manage Review</a></li>
                                                <li><a href="{{route('user.address')}}"><i class="fi-rs-shopping-bag mr-10"></i>Manage Address</a></li>
                                                <li>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <a href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                            <i class="fi-rs-sign-out mr-10"></i> {{ __('Log Out') }}
                                                        </a>
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif
                                @else
                                    <li>
                                        <i class="fi-rs-key"></i>
                                        <a href="{{route('login')}}">Log In </a>/
                                        <a href="{{route('register')}}">Sign Up</a>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                       @if($setting)
                        <a href="/"><img src="{{asset('frontend/assets/images/setting')}}/{{$setting->image}}" alt="logo"></a>
                        @else
                            <a href="/"><img src="{{asset('frontend')}}/assets/imgs/logo/logo.png" alt="logo"></a>
                        @endif

                    </div>
                    <div class="header-right">
                        @livewire('header-search-component')
                        <div class="header-action-right">
                            <div class="header-action-2">
                                @livewire('wishlist-icon-component')
                                @livewire('cart-icon-component')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="/"><img src="{{asset('frontend')}}/assets/imgs/logo/logo.png" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        @livewire('category-component')
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a class="active" href="/">Home </a></li>
                                    <li><a href="javascript:void(0)">About</a></li>
                                    <li><a href="{{route('shop')}}">Shop</a></li>
                                    <li><a href="javascript:void(0)">Blog </a></li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                    <li><a href="#">Offer<i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="{{route('product.offer')}}">Online Offer 2024 </a></li>
                                            <li><a href="#">New Year</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="hotline d-none d-lg-block">
                        <p><i class="fi-rs-smartphone"></i><span>Toll Free</span>01717578265</p>
                    </div>
                    <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="{{route('wishlist.product')}}">
                                    <img alt="Surfside Media" src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-heart.svg">
                                    @if(Cart::instance('wishlist')->count()>0)
                                    <span class="pro-count white">{{Cart::instance('wishlist')->count()}}</span>
                                    @endif
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="{{route('cart')}}">
                                    <img alt="Surfside Media" src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-cart.svg">
                                    @if(Cart::instance('cart')->count()>0)
                                    <span class="pro-count white">{{Cart::instance('cart')->count()}}</span>
                                    @endif
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        @foreach(Cart::instance('cart')->content() as $item)
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="{{route('product.details',['slug'=>$item->model->slug])}}"><img alt="Surfside Media" src="{{$item->model->image}}"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="{{route('product.details',['slug'=>$item->model->slug])}}">{{ucwords(substr($item->model->name,0,18))}}</a></h4>
                                                <h4><span>{{$item->qty}} × </span>&#2547; {{$item->model->sale_price}}</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#" wire:click.prevent="destroy('{{$item->rowId}}')"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>&#2547; {{Cart::instance('cart')->total()}}</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="{{route('cart')}}">View cart</a>
                                            <a href="#" wire:click.prevent="checkout">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


