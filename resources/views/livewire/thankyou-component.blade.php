{{--

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

        <div class="container pt-20 pb-20">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="bg-light p-3 mb-5 rounded">
                       <div class="row">
                          <div class="col-lg-8 offset-md-2">
                              <div class="shadow-md bg-white mb-10 p-10">
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
                                <div class="shadow-md bg-white d-flex justify-content-around align-items-center mb-5">
                                        <div>
                                            <p>Name: {{ucwords($order->name)}}</p>
                                            <p>Phone No: {{$order->phone}}</p>
                                            <p>Email:{{$order->email}}</p>
                                            <p>City: {{ucwords($order->city)}}</p>
                                            <p>Shipping Address:{{ucwords($order->address)}}</p>
                                        </div>
                                        <div>
                                            <div class="table-responsive" style="padding: 10px">
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
                                <div class="shadow-md d-flex mt-10 align-items-center bg-white p-10">
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

--}}

<div class="pt-50 pb-50 d-flex justify-content-center align-items-center">
       <div class="col-md-4">
           <div class="card bg-light shadow p-5">
               <div class="mb-4 text-center">
                   <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75"
                        fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                       <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                       <path
                           d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                   </svg>
               </div>
               <div class="text-center">
                   <h1>Thank You !</h1>
                   <p>We've send the link to your inbox. Lorem ipsum dolor sit,lorem lorem </p>
                   <p class="text-center text-lowercase">YOUR ORDER HAS BEEN RECEIVED, it’s processing</p>


                   <p class="text-center">Your order # is: {{$order->id}}</p>
                   <p class="text-center">You will receive an order confirmation email with details of your order and a
                       link to track your process.</p>
                   <a href="/" class="btn btn-outline-success">Back Home</a>
               </div>
           </div>
       </div>
</div>



