<div class="col-md-2" wire:ignore>
    <div class="dashboard-menu shadow-sm">
        <div class="thumb text-center ">
            @if(auth()->user()->avatar)
                <img src="{{auth()->user()->avatar}}" alt="#" class="rounded-circle" style="width: 120px">
            @else
                <img src="{{asset('frontend/assets/images/profile/user/images3.png')}}" alt="#" class="rounded-circle" style="width: 120px">
            @endif
            <h5><a href="#">{{auth()->user()->name}}</a></h5>
            <p class="font-xxs">{{auth()->user()->email}}</p>
        </div>
        <ul class="nav flex-column" role="tablist">
            <li class="nav-item">
                <a class="{{ (request()->is('user/dashboard')) ? 'nav-link active' : 'nav-link' }}"  href="{{route('user.dashboard')}}" ><i class="fi-rs-settings-sliders mr-10"></i>Basic Information</a>
            </li>
            <li class="nav-item">
                <a class="{{ (request()->is('user/address')) ? 'nav-link active' : 'nav-link' }}" href="{{route('user.address')}}" ><i class="fi-rs-shopping-cart-check mr-10"></i>Address</a>
            </li>
            <li class="nav-item">
                <a class="{{ (request()->is('user/order')) ? 'nav-link active' : 'nav-link' }}" href="{{route('user.order')}}"><i class="fi-rs-marker mr-10"></i>Order List</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('user.review')}}"><i class="fi-rs-star mr-10"></i>Review</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.changepassword')}}"><i class="fi-rs-lock mr-10"></i>Change Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fi-rs-shopping-bag mr-10"></i>Transaction</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('userwishlist.product')}}"><i class="fi-rs-heart mr-10"></i>Wishlist</a>
            </li>

            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();this.closest('form').submit();">
                        <i class="fi-rs-sign-out mr-10"></i>{{ __('Log Out') }}
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>
