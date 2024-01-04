<main class="main">
    <style>
        .icon-stat {
            display: block;
            overflow: hidden;
            position: relative;
            padding: 15px;
            margin-bottom: 1em;
            background-color: #F7F8F9;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .icon-stat-label {
            display: block;
            color: #999;
            font-size: 13px;
        }

        .icon-stat-value {
            display: block;
            font-size: 28px;
            font-weight: 600;

        }

        .icon-stat-visual {
            position: relative;
            display: inline-block;
            width: 32px;
            height: 32px;
            border-radius: 4px;
            text-align: center;
            font-size: 16px;
            padding-top: 6px;

        }

        .bg-primary {
            color: #fff;
            background: #d74b4b;
        }

        .bg-secondary {
            color: #fff;
            background: #6685a4;
        }

        .icon-stat-footer {
            padding: 10px 0 0;
            margin-top: 10px;
            color: #aaa;
            font-size: 12px;
            border-top: 1px solid #eee;
        }
    </style>
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
                        @include('livewire.admin.page-link')
                        <div class="col-md-10">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                     aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Hello Rosie! </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="icon-stat">
                                                        <div class="row">
                                                            <div class="col-xs-8 text-left">
                                                                <span class="icon-stat-label">Total Amount</span>
                                                                <span class="icon-stat-value">&#2547;{{$totalAmount}}</span>
                                                            </div>

                                                            <div class="col-xs-4 text-end">
                                                                <i class="fi-rs-star icon-stat-visual bg-primary"></i>
                                                            </div>
                                                        </div>
                                                        <div class="icon-stat-footer">
                                                            <i class="fi-rs-time-oclock"></i> Updated Now
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="icon-stat">
                                                        <div class="row">
                                                            <div class="col-xs-8 text-left">
                                                                <span class="icon-stat-label">Total Sales</span>
                                                                <span class="icon-stat-value">{{$totalSales}}</span>
                                                            </div>
                                                            <div class="col-xs-4 text-end">
                                                                <i class="fi-rs-info icon-stat-visual bg-secondary"></i>
                                                            </div>
                                                        </div>
                                                        <div class="icon-stat-footer">
                                                            <i class="fi-rs-time-oclock"></i> Updated Now
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="icon-stat">
                                                        <div class="row">
                                                            <div class="col-xs-8 text-left">
                                                                <span class="icon-stat-label">Today Amount</span>
                                                                <span
                                                                    class="icon-stat-value">&#2547;{{$todayAmount}}</span>
                                                            </div>
                                                            <div class="col-xs-4 text-end">
                                                                <i class="fi-rs-heart icon-stat-visual bg-success"></i>
                                                            </div>
                                                        </div>
                                                        <div class="icon-stat-footer">
                                                            <i class="fi-rs-time-oclock"></i> Updated Now
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="icon-stat">
                                                        <div class="row">
                                                            <div class="col-xs-8 text-left">
                                                                <span class="icon-stat-label">Today Sales</span>
                                                                <span class="icon-stat-value">{{$todaySales}}</span>
                                                            </div>
                                                            <div class="col-xs-4 text-end">
                                                                <i class="fi-rs-shopping-bag icon-stat-visual bg-warning"></i>
                                                            </div>
                                                        </div>
                                                        <div class="icon-stat-footer">
                                                            <i class="fi-rs-time-oclock"></i> Updated Now
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 shadow">
                                        <div class="tab-content dashboard-content">
                                            <div class="tab-pane fade active show" id="orders" role="tabpanel"
                                                 aria-labelledby="orders-tab">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4>Order List</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-sm"
                                                                   style="border-bottom: 1px solid #dee2e6">
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
                                                                    <th class="text-center" style="width: 50px">Action
                                                                    </th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($orders as $order)
                                                                    <tr>
                                                                        <td>{{$order->id}}</td>
                                                                        <td>&#2547; {{$order->subtotal}}</td>
                                                                        <td>&#2547; {{$order->total}}</td>
                                                                        <td>{{ucwords($order->name)}}</td>
                                                                        <td>{{$order->phone}}</td>
                                                                        <td>{{ucwords($order->city)}}</td>
                                                                        <td>{{ucwords($order->address)}}</td>
                                                                        <td>{{ucwords(ucwords($order->status))}}</td>
                                                                        <td>
                                                                            <a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn-small"> <i class="fi-rs-eye" style="font-size:18px"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
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
                </div>
            </div>
        </div>
    </section>
</main>
