<div class="col-md-2" wire:ignore>
    <div class="dashboard-menu shadow">
        <div class="thumb text-center ">
            <img src="{{asset('frontend')}}/assets/imgs/shop/product-1-1.jpg" alt="#" class="rounded-circle" style="width: 120px">
            <h5><a href="#">{{auth()->user()->name}}</a></h5>
            <p class="font-xxs">{{auth()->user()->email}}</p>
        </div>
        <ul class="nav flex-column" role="tablist">
            <li class="nav-item">
                <a class="{{ (request()->is('admin/dashboard')) ? 'nav-link active' : 'nav-link' }}"  href="{{route('admin.dashboard')}}" ><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="{{ (request()->is('admin/category')) ? 'nav-link active' : 'nav-link' }}" href="{{route('admin.category')}}" ><i class="fi-rs-shopping-cart-check mr-10"></i>Category</a>
            </li>
            <li class="nav-item">
                <a class="{{ (request()->is('admin/slider')) ? 'nav-link active' : 'nav-link' }}" href="{{route('admin.slider')}}"><i class="fi-rs-marker mr-10"></i>Slider</a>
            </li>
            <li class="nav-item">
                @if(request()->is('admin/add/product'))
                <a class="{{ (request()->is('admin/add/product')) ? 'nav-link active' : 'nav-link' }}" href="{{route('admin.add.product')}}" ><i class="fi-rs-user mr-10"></i>Add Product</a>
                @elseif(request()->is('admin/edit/product'))
                    <a class="{{ (request()->is('admin/edit/product')) ? 'nav-link active' : 'nav-link' }}" href="{{route('admin.edit.product')}}" ><i class="fi-rs-user mr-10"></i>Product</a>
                @else
                    <a class="{{ (request()->is('admin/manage/product')) ? 'nav-link active' : 'nav-link' }}" href="{{route('admin.manage.product')}}" ><i class="fi-rs-user mr-10"></i>Manage Product</a>
                @endif
            </li>

            <li class="nav-item">
                <a class="{{ (request()->is('admin/order')) ? 'nav-link active' : 'nav-link' }}"  href="{{route('admin.order')}}" ><i class="fi-rs-settings-sliders mr-10"></i>Orders</a>
            </li>

            <li class="nav-item">
                <a class="nav-link"  href="{{route('admin.setting')}}"><i class="fi-rs-shopping-bag mr-10"></i>Setting</a>
            </li>

            <li class="nav-item">
                <a class="nav-link"  href="#"><i class="fi-rs-shopping-bag mr-10"></i>Coupons</a>
            </li>

            <li class="nav-item">
                <a class="nav-link"  href="#"><i class="fi-rs-shopping-bag mr-10"></i>Customers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.html"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
            </li>
        </ul>
    </div>
</div>
