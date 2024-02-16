<div>
    <main id="main" class="main-site">
        <div class="container">
            <div class="page-header breadcrumb-wrap">
                <div class="container">
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow">Home</a>
                        <span></span> Shop
                    </div>
                </div>
            </div>
        </div>

        <div class="container pt-60 pb-60">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="shadow p-3 mb-5 bg-body rounded">
                       <div class="row">
                          <div class="col-lg-8 offset-md-2">
                              <div class="toggle_info mb-2">
                                  <h2>Order ID# {{$order->id}}</h2>
                                  <h3>Thank you for your order!</h3>
                                  <p>We will contact you soon to verify the order.</p>
                                  <p>Should you have any questions about your order, feel free to call us on 16793 / 09678002003 (10 AM - 5 PM).</p>
                                  <p>Have a minute? Like us on <a href="https://www.facebook.com" class="text-danger">Facebook</a> to keep you up to date with all our offers and announcements.</p>
                                  <p>A confirmation email was sent.</p>
                              </div>
                          </div>
                       </div>
                        <div class="row">
                            <div class="col-lg-8 offset-md-2">
                                <div class="toggle_info d-flex justify-content-around align-items-center mb-2">
                                        <div>
                                            <p>Name: {{ucwords($order->name)}}</p>
                                            <p>Phone No: {{$order->phone}}</p>
                                            <p>Email:{{$order->email}}</p>
                                            <p>City: {{ucwords($order->city)}}</p>
                                            <p>Shipping Address:{{ucwords($order->address)}}</p>
                                        </div>
                                        <div>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <td class="cart_total_label">Cart Subtotal</td>
                                                        <td class="cart_total_amount">&#2547;{{$order->subtotal}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cart_total_label">Shipping Charge</td>
                                                        <td class="cart_total_amount">&#2547;{{$order->shipping_charge}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cart_total_label">Total Amount</td>
                                                        <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">&#2547;{{$order->total}}</span></strong></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <div class="d-flex mt-5 align-items-center toggle_info">
                                    <div class="flex-shrink-0">
                                        <a href="https://www.facebook.com"><img src="{{asset('frontend/assets/images/thankyou/find-us.png')}}" alt="..." style="width: 200px"></a>
                                    </div>
                                    <div class="flex-grow-1 ms-3 text-start">
                                       <p> You may return product if you find any manufacturing flaw in it. You have 24 hours after delivery to return us the product. If it does not reach our office within 24 hours it will be considered as a warranty issue. The product should be returned with box and other included accessories. It has to be claimed by physically coming to the relative branch of Star Tech.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="/" class="btn btn-submit mt-20">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </main>
</div>
