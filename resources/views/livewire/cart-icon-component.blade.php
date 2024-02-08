<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="{{route('cart')}}">
        <img alt="Surfside Media" src="{{asset('frontend')}}/assets/imgs/theme/icons/icon-cart.svg">
        @if(Cart::instance('cart')->count()>0)
        <span class="pro-count blue">{{Cart::instance('cart')->count()}}</span>
        @endif
    </a>
    @if(Cart::instance('cart')->count()>0)
    <div class="cart-dropdown-wrap cart-dropdown-hm2 overflow-auto" style="max-height: 550px">
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
                <a href="{{route('cart')}}" class="btn btn-primary" style="width: 100%">VIEW CART</a>
               {{-- <a href="{{route('checkout')}}" class="btn btn-primary mt-5" style="width: 100%">CHECKOUT</a>--}}
               <a href="#" class="btn btn-primary mt-5" wire:click.prevent="checkout" style="width: 100%">CHECKOUT</a>
            </div>
        </div>
    </div>
    @endif
</div>
