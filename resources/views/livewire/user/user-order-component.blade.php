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
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="row">
                        @include('livewire.user.page-link')
                        <div class="col-md-10 shadow">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <h5 class="mb-0">Order List</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table" style="border-bottom: 1px solid #dee2e6">
                                                    <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Delivery Status</th>
                                                        <th>Payment Status</th>
                                                        <th>Payment Type</th>
                                                        <th>SubTotal</th>
                                                        <th>Shipping Charge</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td>#{{$order->id}}</td>
                                                            <td>{{\Carbon\Carbon::parse($order->created_at)->format('d M,Y')}}</td>
                                                            <td>{{ucwords($order->status)}}</td>
                                                            <td style="width:130px;background-color: #F15412;color:white">{{ucwords($order->transaction->status)}}</td>
                                                            <td>{{strtoupper($order->transaction->mode)}}</td>
                                                            <td>&#2547; {{$order->subtotal}}</td>
                                                            <td>&#2547; {{number_format($order->shipping_charge,2)}}</td>
                                                            <td>&#2547; {{number_format($order->total)}}</td>
                                                            <td><a href="{{route('user.orderdetails',['order_id'=>$order->id])}}" class="btn-small d-block"><i class="fi-rs-eye mr-5" style="font-size:20px"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{$orders->links()}}
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
