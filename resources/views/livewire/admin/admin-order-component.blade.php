<main class="main">
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
                                                        <a class="text-white btn btn-sm btn-primary" wire:click.prevent="excelDownload" href="#" ><i class="fi-rs-label mr-5"></i>Excel</a>
                                                        <a class="text-white btn btn-sm btn-primary" href="{{route('admin.orderpdf')}}"><i class="fi-rs-label mr-5"></i>PDF</a>
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
                                                        <th>Ship Charge</th>
                                                        <th>Total</th>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>City</th>
                                                        <th>Address</th>
                                                        <th>Status</th>
                                                   {{--     <th>Barcode</th>--}}
                                                        <th>Created At</th>
                                                        <th>Progress</th>
                                                        <th class="text-center" colspan="4" style="width: 50px">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td>{{$order->id}}</td>
                                                            <td>&#2547; {{$order->subtotal}}</td>
                                                            <td>&#2547; {{number_format($order->shipping_charge,2)}}</td>
                                                            <td>&#2547; {{number_format($order->total,2)}}</td>
                                                            <td>{{ucwords($order->name)}}</td>
                                                            <td>{{$order->phone}}</td>
                                                            <td>{{ucwords($order->city)}}</td>
                                                            <td>{{ucwords($order->address)}}</td>
                                                            <td class="{{$order->status=='delivery'?'text-success':'text-danger'}}" style="font-size: 17px">{{ucwords($order->status)}}</td>
                                                           {{-- <td>
                                                                @php
                                                                        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                                                @endphp
                                                                {!! $generator->getBarcode($order->phone,$generator::TYPE_CODE_128,1,20) !!}
                                                            </td>--}}
                                                            <td>{{Carbon\Carbon::parse($order->created_at)->format('M d,y')}}</td>

                                                            <td>
                                                                <div class="progress">
                                                                    @if($order->status=='ordered')
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 45%">45%</div>
                                                                    @elseif($order->status=='processed')
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 55%">55%</div>
                                                                    @elseif($order->status=='shipping')
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%</div>
                                                                    @elseif($order->status=='delivery')
                                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%">100%</div>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="dropdown" style="width: 50px">
                                                                    <a class="dropdown-toggle btn-sm {{$order->status=='delivery' || $order->status=='canceled'?'disabled':''}}"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="fi-rs-edit-alt" style="font-size:18px"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu shadow-lg dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                                                                        <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#exampleOrderModal" href="#" wire:click.prevent="updateOrderIdStatus({{$order->id}},'processed')">Processed</a></li>
                                                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleOrderModal" href="#" wire:click.prevent="updateOrderIdStatus({{$order->id}},'shipping')">Shipping</a></li>
                                                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleOrderModal" href="#" wire:click.prevent="updateOrderIdStatus({{$order->id}},'delivery')">Delivery</a></li>
                                                                        <li><a class="dropdown-item disabled" data-bs-toggle="modal" data-bs-target="#exampleOrderModal" href="#" wire:click.prevent="updateOrderIdStatus({{$order->id}},'cancel')">Cancel</a></li>
                                                                    </ul>
                                                                </div>
                                                            </td>

                                                            <td><a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn-small"> <i class="fi-rs-eye" style="font-size:18px"></i></a></td>

                                                            <td><a href="{{route('admin.orderinvoice',['order_id'=>$order->id])}}" class="btn-small"> <i class="fi-rs-notebook mr-10" style="font-size:18px"></i></a></td>
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

    <div wire:ignore.self class="modal fade" id="exampleOrderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Order Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Are you sure want to update status?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click.prevent="updateOrderStatus()" >Yes,Update</button>
                </div>
            </div>
        </div>
    </div>
</main>


