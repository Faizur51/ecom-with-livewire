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
        .icon-stat:hover{
            border-bottom: 2px solid #7952B3;
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
        .bg-primary {
            color: #fff;
        }
        .bg-secondary {
            color: #fff;
        }
        .bg-warning {
            color: #fff;
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
        <div class="container d-flex justify-content-between align-items-center">
            <div class="breadcrumb d-flex">
                <a href="/" rel="nofollow">Home</a><span></span> Dashboard
            </div>
            <div class="header-action-right">
                <div class="header-action-2">
                    <div class="header-action-icon-2">
                        <a class="mini-cart-icon" href="cart.html" style="font-size: 24px">
                            <i class="fi-rs-bell" ></i>
                            <span class="pro-count blue">{{count(auth()->user()->unreadNotifications)}}</span>
                        </a>
                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                            <ul>
                                    @forelse(auth()->user()->unreadNotifications as $notification)
                                        <div class="alert alert-success" role="alert">
                                            [{{ $notification->created_at }}] User {{ $notification->data['name'] }} ({{ $notification->data['email'] }}) has just registered.
                                            <a href="#" class="float-right mark-as-read" wire:click.prevent="markAsRead('{{ $notification->id }}')" >
                                                Mark as read
                                            </a>
                                        </div>
                                        @if($loop->last)
                                            <a href="#" id="mark-all" wire:click.prevent="markAll()">
                                                Mark all as read
                                            </a>
                                        @endif
                                    @empty
                                        There are no new notifications
                                    @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="pt-10 pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="row">
                        @include('livewire.admin.page-link')
                        <div class="col-md-10 shadow">
                            <div class="row ">
                                <div class="col-md-3 col-sm-6">
                                    <div class="icon-stat shadow bg-light">
                                        <div class="row">
                                            <div class="col-xs-8 text-left">
                                                <span class="icon-stat-label">Total Amount</span>
                                                <span class="icon-stat-value">&#2547; {{$totalAmount}}</span>
                                            </div>
                                        </div>
                                        <div class="icon-stat-footer">
                                            <i class="fi-rs-time-oclock"></i> Updated Now
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="icon-stat shadow bg-warning">
                                        <div class="row">
                                            <div class="col-xs-8 text-left">
                                                <span class="icon-stat-label text-white">Total Sales</span>
                                                <span class="icon-stat-value">{{$totalSales}}</span>
                                            </div>
                                        </div>
                                        <div class="icon-stat-footer text-white">
                                            <i class="fi-rs-time-oclock"></i> Updated Now
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="icon-stat shadow bg-primary">
                                        <div class="row">
                                            <div class="col-xs-8 text-left">
                                                <span class="icon-stat-label text-white">Today Amount</span>
                                                <span
                                                    class="icon-stat-value">&#2547; {{$todayAmount}}</span>
                                            </div>
                                        </div>
                                        <div class="icon-stat-footer text-white">
                                            <i class="fi-rs-time-oclock"></i> Updated Now
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 ">
                                    <div class="icon-stat shadow bg-secondary">
                                        <div class="row ">
                                            <div class="col-xs-8 text-left ">
                                                <span class="icon-stat-label text-white">Today Sales</span>
                                                <span class="icon-stat-value">{{$todaySales}}</span>
                                            </div>
                                        </div>
                                        <div class="icon-stat-footer text-white">
                                            <i class="fi-rs-time-oclock "></i> Updated Now
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                     aria-labelledby="dashboard-tab">
                                    <div class="col-md-12">
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
                                                                    <th>Shipping Charge</th>
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
                                                                        <td>&#2547; {{number_format($order->shipping_charge,2)}}</td>
                                                                        <td>&#2547; {{number_format($order->total,2)}}</td>
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
