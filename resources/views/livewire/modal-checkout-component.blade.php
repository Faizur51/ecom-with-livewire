<div class="modal fade custom-modal"  id="showModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Order Confirmation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <section class="mt-5 mb-50">
                        <div class="container">
                            <div class="row">
                                <div class="alert alert-danger text-center" role="alert">Online Payment</div>
                                <table class="table shopping-summery text-center">
                                    <thead style="background-color: #f5f5f5">
                                    <tr class="main-heading">
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Cart::instance('cart')->content() as $item)
                                        <tr>
                                            <td class="image product-thumbnail">
                                                @if(strlen($item->model->image) <30)
                                                    <img src="{{asset('frontend/assets/images/product')}}/{{$item->model->image}}" alt="#">
                                                @else
                                                    <img src="{{$item->model->image}}" alt="#">
                                                @endif
                                            </td>
                                            <td class="product-des product-name">
                                                <h5 class="product-name"><a href="product-details.html">{{ucwords($item->model->name)}}</a></h5>
                                            </td>
                                            <td class="price" data-title="Price"><span>&#2547; {{$item->model->regular_price}} </span></td>
                                            <td class="price" data-title="Price"><span>{{$item->qty}} </span></td>
                                            <td class="text-right" data-title="Cart">
                                                <span>&#2547; {{$item->subtotal}} </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                        <tr>
                                                            <td class="cart_total_label">Cart Subtotal</td>
                                                            <td class="cart_total_amount"><span class="font-lg fw-900 text-brand">&#2547; {{Cart::instance('cart')->subtotal()}}</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">Shipping</td>
                                                            <td class="cart_total_amount"> <i class="ti-gift mr-5"></i> Free Shipping</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="cart_total_label">Total</td>
                                                            <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">&#2547; {{Cart::instance('cart')->total()}}</span></strong></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">
                                            <div class="product-extra-link2">
                                                <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                                                        token="if you have any token validation"
                                                        postdata="your javascript arrays or objects which requires in backend"
                                                        order="If you already have the transaction generated for current order"
                                                        endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>


