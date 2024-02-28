<div class="col-md-2" wire:ignore>
    <div class="dashboard-menu shadow">
        <div class="thumb text-center ">
            <img src="{{asset('frontend')}}/assets/images/profile/admin/images.png" alt="#" class="rounded-circle" style="width: 120px">
            <h5><a href="#">{{auth()->user()->name}}</a></h5>
            <p class="font-xxs">{{auth()->user()->email}}</p>
        </div>
        <ul class="nav flex-column" role="tablist">
            <li class="nav-item">
                <a class="{{ (request()->is('admin/dashboard')) ? 'nav-link active' : 'nav-link' }}"  href="{{route('admin.dashboard')}}" ><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="{{ (request()->is('admin/chart')) ? 'nav-link active' : 'nav-link' }}"  href="{{route('admin.chart')}}" ><i class="fi-rs-settings-sliders mr-10"></i>Chart</a>
            </li>
            <li class="nav-item">
                <a class="{{ (request()->is('admin/category')) ? 'nav-link active' : 'nav-link' }}" href="{{route('admin.category')}}" ><i class="fi-rs-shopping-cart-check mr-10"></i>Category</a>
            </li>
            <li class="nav-item">
                <a class="{{ (request()->is('admin/slider')) ? 'nav-link active' : 'nav-link' }}" href="{{route('admin.slider')}}"><i class="fi-rs-marker mr-10"></i>Slider</a>
            </li>
            <li class="nav-item">
                @if(request()->is('admin/add/product'))
                <a class="{{ (request()->is('admin/add/product')) ? 'nav-link active' : 'nav-link' }}" href="{{route('admin.add.product')}}" ><i class="fi-rs-shop mr-10"></i>Add Product</a>
                @elseif(request()->is('admin/edit/product'))
                    <a class="{{ (request()->is('admin/edit/product')) ? 'nav-link active' : 'nav-link' }}" href="{{route('admin.edit.product')}}" ><i class="fi-rs-shop mr-10"></i>Product</a>
                @else
                    <a class="{{ (request()->is('admin/manage/product')) ? 'nav-link active' : 'nav-link' }}" href="{{route('admin.manage.product')}}" ><i class="fi-rs-shop mr-10"></i>Product</a>
                @endif
            </li>

            <li class="nav-item">
                <a class="{{ (request()->is('admin/order')) ? 'nav-link active' : 'nav-link' }}"  href="{{route('admin.order')}}" ><i class="fi-rs-settings-sliders mr-10"></i>Orders</a>
            </li>

            <li class="nav-item">
                <a class="{{ (request()->is('admin/setting')) ? 'nav-link active' : 'nav-link' }}"  href="{{route('admin.setting')}}"><i class="fi-rs-settings mr-10"></i>Setting</a>
            </li>

            <li class="nav-item">
                <a class="{{ (request()->is('admin/review')) ? 'nav-link active' : 'nav-link' }}"  href="{{route('admin.review')}}"><i class="fi-rs-star mr-10"></i>Review</a>
            </li>

            <li class="nav-item">
                <a class="{{ (request()->is('admin/customer')) ? 'nav-link active' : 'nav-link' }}"  href="{{route('admin.customer')}}"><i class="fi-rs-users mr-10"></i>Customers</a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" class="nav-link" onclick="event.preventDefault();this.closest('form').submit();">
                        <i class="fi-rs-sign-out mr-10"></i>{{ __('Log Out') }}
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>
