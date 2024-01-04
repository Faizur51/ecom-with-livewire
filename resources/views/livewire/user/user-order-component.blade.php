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
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="row">
                        @include('livewire.user.page-link')
                        <div class="col-md-10 shadow">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <h5 class="mb-0">Hello Rosie! </h5>
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
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td>#{{$order->id}}</td>
                                                            <td>{{$order->created_at}}</td>
                                                            <td>{{ucwords($order->status)}}</td>
                                                            <td style="width:130px;background-color: #F15412;color:white">Pending FIXES</td>
                                                            <td>&#2547;{{$order->total}}</td>
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
