<div>
    <main class="main">
        @include('livewire.add-shipping-addressmodal')
        @include('livewire.edit-shipping-addressmdal')

        <style>
            .faizbtn {
                width: 500px;
            }
        </style>
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <form action="#" wire:submit.prevent="placeOrder">
                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-25 d-flex justify-content-between">
                            <h4>Billing Details</h4>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addShippingAddress" data-bs-whatever="@mdo">+ Add New Address</button>
                        </div>

                        <div class="col-lg-12 mb-sm-15">
                            @if($shippings->count()>0)
                            @foreach($shippings as $shipping)
                            <div class="toggle_info d-flex justify-content-between align-items-center mb-2" >
                                <div class="icheck-material-teal icheck-inline" >
                                        <input type="radio" id="{{$shipping->address_type}}" name="someGroupName" checked wire:ignore value="{{$shipping->address_type}}"/>
                                        <label for="{{$shipping->address_type}}">{{ucwords($shipping->address_type)}}</label>
                                </div>
                                <div>
                                   <p>Address Type: {{ucwords($shipping->address_type)}}</p>
                                    <p>City: {{ucwords($shipping->city)}}</p>
                                    <p>Post Code: {{$shipping->post_code}}</p>
                                    <p>Primary Phone No: {{$shipping->phone}}</p>
                                    <p>Secondary Phone No:N/A</p>
                                    <p>Shipping Address:{{ucwords($shipping->address)}}</p>
                                </div>
                                <div>
                                    <a class="btn-small" data-bs-toggle="modal" data-bs-target="#deleteShippingAddress" wire:click.prevent="deleteId({{$shipping->id}})"><i class="fi-rs-trash"></i></a>
                                    <a class="btn-small" data-bs-toggle="modal" data-bs-target="#editShippingAddress" wire:click.prevent="editShippinfo({{$shipping->id}})"><i class="fi-rs-pencil"></i></a>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <h4 class="text-muted mb-2">No Address Found! Please add an address</h4>
                            @endif
                        </div>

                        <div class="mb-20">
                            <h5>Additional information</h5>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="5" placeholder="Order notes" wire:model="additional_info"></textarea>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach(Cart::instance('cart')->content() as $item)
                                    <tr>
                                        <td class="image product-thumbnail">
                                            @if(!$item->model->image)
                                                <img src="{{asset('frontend/assets/images/product')}}/{{$item->model->image}}" alt="#">
                                            @else
                                                <img src="{{asset('frontend')}}/assets/imgs/shop/product-1-1.jpg" alt="#">
                                            @endif
                                        </td>
                                        <td>
                                            <h5><a href="product-details.html">{{ucwords($item->model->name)}}</a> <span class="product-qty">x {{$item->qty}}</span></h5>
                                        </td>
                                        <td>&#2547; {{$item->subtotal()}}</td>
                                    </tr>
                                  @endforeach
                                    <tr>
                                        <th>Cart SubTotal</th>
                                        <td class="product-subtotal text-end" colspan="2">&#2547; {{Cart::subtotal()}}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Charge</th>
                                        <td colspan="2" class="text-end"><em>Free Shipping</em></td>
                                    </tr>
                                    <tr>
                                        <th>Order Total</th>
                                        <td colspan="2" class="product-subtotal text-end"><span class="font-xl text-brand fw-900">&#2547; {{Cart::total()}}</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-10 mb-10"></div>
                            <div class="payment_method">
                                <div class="mb-10">
                                    <h4>Select Payment Type</h4>
                                </div>
                                <div class="form-group">
                                    <div class="icheck-material-teal icheck-inline">
                                        <input type="radio" id="someRadioId1" name="someGroupName" value="cod"  wire:model="paymentmode"/>
                                        <label for="someRadioId1">Cash On Delivery</label>
                                    </div>
                                    <div class="icheck-material-teal icheck-inline">
                                        <input type="radio" id="someRadioId2" name="someGroupName" value="bkash" wire:model="paymentmode"/>
                                        <label for="someRadioId2">Bkash</label>
                                    </div>
                                    <div class="icheck-material-teal icheck-inline">
                                        <input type="radio" id="someRadioId3" name="someGroupName" value="card" wire:model="paymentmode" />
                                        <label for="someRadioId3">Online Payment</label>
                                    </div>
                                    @error('paymentmode') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <button class="btn btn-fill-out btn-block mt-5 btn-sm" type="submit">Place Order</button>

                        </div>
                    </div>
                </div>
                </form>
            </div>
        </section>
    </main>


    <div wire:ignore.self class="modal fade" id="deleteShippingAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

</div>
