<main class="main">
    <style>
        table, td, th {
            border: 1px solid black;
        }
    </style>
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
                        @include('livewire.admin.page-link')
                        <div class="col-md-10 shadow">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-end">
                                            <div>
                                                <div>
                                                    <a href="{{route('admin.productpdf',['order_id'=>$order->id])}}" class="btn btn-primary btn-sm mr-5 mb-3">PDF</a>
                                                </div>
                                            </div>
                                        </div>
                                      <div class="d-flex justify-content-between">
                                         <div>
                                             <div class="d-flex align-items-center">
                                                 <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8mcdA_uoJahxn3PQ-IC9WROV-GF2wuTl2FQ&usqp=CAU" alt="" style="width: 80px;height: 50px">
                                                 <h4 class="text-muted ml-5">Rafa Shop</h4>
                                             </div>
                                             <p>Office 149, 450 South Brand Brooklyn</p>
                                             <p>01717578265</p>
                                         </div>
                                          <div>
                                              <h4>INVOICE #{{$order->id}}</h4>
                                              <p>Date Issues: {{\Carbon\Carbon::parse($order->created_at)->format('M d,Y')}}</p>
                                              <p>Date Due: {{\Carbon\Carbon::today()->format('M d,Y')}}</p>
                                          </div>
                                      </div>
                                        <hr>
                                        <div class="row" style="margin-bottom: 15px">
                                            <div class="col-md-6">
                                                <h6 class="mb-1">Invoice To:</h6>
                                                <p class="mb-1">Name:{{ucwords($order->name)}}</p>
                                                <p class="mb-1">Email:{{ucwords($order->email)}}</p>
                                                <p class="mb-1">Phone:{{$order->phone}}</p>
                                                <p class="mb-0">City:{{ucwords($order->city)}}</p>
                                                <p class="mb-0">Address:{{ucwords($order->address)}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <h6 class="mb-1">Bill To:</h6>
                                                <p>Total Due:&#2547; {{$order->total}}</p>
                                                <p>Payment Type:{{ucwords($order->transaction->mode)}}</p>
                                                <p>Payment Status:{{ucwords($order->transaction->status)}}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table shopping-summery text-center clean">
                                                        <thead>
                                                        <tr class="main-heading">
                                                            <th scope="col">Image</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Subtotal</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($order->orderItems as $item)
                                                        <tr>
                                                           <td>
                                                               <div>
                                                                   @if(!$item->product->image)
                                                                       <img src="{{asset('frontend/assets/images/product')}}/{{$item->product->image}}" alt="#">
                                                                   @else
                                                                       <img src="{{asset('frontend/assets/imgs/shop/product-1-2.jpg')}}" alt="" style="width: 50px">
                                                                   @endif
                                                               </div>
                                                           </td>
                                                            <td class="product-des product-name">
                                                                <h5 class="product-name text-muted">{{ucwords($item->product->name)}}</h5>
                                                            </td>
                                                            <td class="price" data-title="Price"><span>&#2547; {{$item->price}} </span></td>
                                                            <td class="price" data-title="Price"><span>{{$item->quantity}}</span></td>


                                                            <td class="text-right" data-title="Cart">
                                                                <span>&#2547; {{$item->price*$item->quantity}}</span>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="row mb-50">
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="heading_s1 mb-3">
                                                            <h5 class="text-muted">Salesperson: Alfie Solomons</h5>
                                                            <p>Thanks for your business</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="p-md-4  border-radius cart-totals">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="cart_total_label">Cart Subtotal</td>
                                                                        <td class="cart_total_amount"><span class="font-lg text-muted">&#2547; {{$order->subtotal}}</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="cart_total_label">Shipping</td>
                                                                        <td class="cart_total_amount"> <span class="font-lg text-muted">&#2547; {{number_format($order->shipping_charge,2)}}</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="cart_total_label">Total</td>
                                                                        <td class="cart_total_amount"><span class="font-lg text-muted">&#2547; {{number_format($order->total,2)}}</span></td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <p>Note: It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance projects. Thank You!</p>
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
