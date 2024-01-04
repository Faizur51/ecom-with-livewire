<main class="main">
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
            <div class="row ">
                <div class="col-lg-12 m-auto">
                    <div class="row">
                        @include('livewire.admin.page-link')
                        <div class="col-md-10 shadow">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="shop-product-fillter" style="margin-bottom: 0px">
                                                <div class="search-form">
                                                    <form action="#">
                                                        <input type="text" placeholder="Search…" wire:model="search">
                                                        <button type="submit"> <i class="fi-rs-search"></i> </button>
                                                    </form>
                                                </div>
                                                <div class="sort-by-product-area">
                                                    <div class="sort-by-cover mr-10">
                                                        <div class="sort-by-product-wrap">
                                                            <div class="sort-by">
                                                                <span><i class="fi-rs-apps"></i>Show:</span>
                                                            </div>
                                                            <div class="sort-by-dropdown-wrap">
                                                                <span>{{$pageSize}}<i class="fi-rs-angle-small-down"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="sort-by-dropdown">
                                                            <ul>
                                                                <li><a class="{{$pageSize==12?'active':''}}" href="#" wire:click.prevent="changePageSize(12)">12</a></li>
                                                                <li><a class="{{$pageSize==15?'active':''}}" href="#" wire:click.prevent="changePageSize(15)">15</a></li>
                                                                <li><a class="{{$pageSize==20?'active':''}}" href="#" wire:click.prevent="changePageSize(20)">20</a></li>
                                                                <li><a class="{{$pageSize==24?'active':''}}" href="#" wire:click.prevent="changePageSize(24)">24</a></li>
                                                                <li><a class="{{$pageSize==32?'active':''}}" href="#" wire:click.prevent="changePageSize(32)">32</a></li>
                                                                <li><a class="{{$pageSize==60?'active':''}}" href="#" wire:click.prevent="changePageSize(60)">60</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="sort-by-cover">
                                                        <a class="text-white btn btn-sm btn-primary" href="#" ><i class="fi-rs-label mr-5"></i>Excel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-sm" style="border-bottom: 1px solid #dee2e6">
                                                    <thead class="table-light">
                                                    <tr>
                                                        <th>OrderID</th>
                                                        <th>Sub Total</th>
                                                        <th>Total</th>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>City</th>
                                                        <th>Address</th>
                                                        <th>Status</th>
                                                        <th class="text-center" colspan="2" style="width: 50px">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td>{{$order->id}}</td>
                                                            <td>&#2547; {{$order->subtotal}}</td>
                                                            <td>&#2547; {{$order->total}}</td>
                                                            <td>{{$order->name}}</td>
                                                            <td>{{$order->phone}}</td>
                                                            <td>{{$order->city}}</td>
                                                            <td>{{$order->address}}</td>
                                                            <td>{{ucwords($order->status)}}</td>
                                                            <td>
                                                                <div class="dropdown dropend"  style="width: 40px">
                                                                    <a class="dropdown-toggle btn-sm {{$order->status=='delivery'?'disabled':''}}"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="fi-rs-edit-alt" style="font-size:18px"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu shadow-lg dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                                                                        <li><a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'processed')">Processed</a></li>
                                                                        <li><a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'shipping')">Shipping</a></li>
                                                                        <li><a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'delivery')">Delivery</a></li>
                                                                        <li><a class="dropdown-item disabled" href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'cancel')">Cancel</a></li>
                                                                    </ul>
                                                                </div>

                                                            </td>
                                                            <td><a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn-small"> <i class="fi-rs-eye" style="font-size:18px"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $orders->links() }}
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

    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Are you sure want to delete?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click.prevent="delete()" >Yes,Delete</button>
                </div>
            </div>
        </div>
    </div>

</main>


