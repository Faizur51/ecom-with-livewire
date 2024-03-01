<div>
    <main class="main">
        @include('livewire.add-shipping-addressmodal')
        @include('livewire.edit-shipping-addressmdal')
        @if($paymentmode=='card')
            @include('livewire.modal-checkout-component')
        @endif
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-20 mb-20">
            <div class="container">
                <form action="#" wire:submit.prevent="placeOrder">
                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-25 d-flex justify-content-between">
                            <h5>Shipping Details</h5>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addShippingAddress" data-bs-whatever="@mdo">+ Add New Address</button>
                        </div>

                        <div class="col-lg-12 mb-sm-15">
                            @if($shippings->count()>0)
                            @foreach($shippings as $shipping)
                            <div class="toggle_info d-flex justify-content-between align-items-center mb-2" >
                                <div class="icheck-material-red icheck-inline" >
                                        <input type="radio" id="{{$shipping->address_type}}" name="someGroupName" wire:ignore value="{{$shipping->address_type}}"   wire:model="address_type"/>
                                        <label for="{{$shipping->address_type}}">{{ucwords($shipping->address_type)}}</label>
                                </div>
                                <div>
                                   <p>Address Type: {{ucwords($shipping->address_type)}}</p>
                                    <p>Name: {{ucwords($shipping->name)}}</p>
                                    <p>Phone No: {{$shipping->phone}}</p>
                                    <p>Email:{{$shipping->email}}</p>
                                    <p>City: {{ucwords($shipping->city)}}</p>
                                    <p>Post Code: {{$shipping->post_code}}</p>
                                    <p>Shipping Address:{{ucwords($shipping->address)}}</p>
                                </div>
                                <div>
                                    <a class="btn-small" data-bs-toggle="modal" data-bs-target="#deleteShippingAddress" wire:click.prevent="deleteId({{$shipping->id}})"><i class="fi-rs-trash mr-10"></i></a>
                                    <a class="btn-small" data-bs-toggle="modal" data-bs-target="#editShippingAddress" wire:click.prevent="editShippinfo({{$shipping->id}})"><i class="fi-rs-pencil"></i></a>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <h5 class="text-muted mb-10">No Address Found! Please add an address</h5>
                            @endif
                        </div>
                        <div class="mb-10">
                            <h5>Additional information</h5>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="5" placeholder="Order notes" wire:model="additional_info"></textarea>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="order_review">
                            <div class="mb-10">
                                <h5>Your Orders</h5>
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
                                                @if(strlen($item->model->image)>25)
                                                    <img src="{{$item->model->image}}" alt="#">
                                                @else
                                                    <img src="{{asset('frontend/assets/images/product')}}/{{$item->model->image}}" alt="#">
                                                @endif
                                        </td>
                                        <td>
                                            <h5><a href="{{route('product.details',['slug'=>$item->model->slug])}}">{{ucwords($item->model->name)}}</a> <span class="product-qty text-muted">x {{$item->qty}}</span></h5>
                                            @if($item->options->color)
                                                <strong class="mr-5 text-muted">Color:{{ucwords($item->options->color)}},</strong>
                                            @endif
                                            @if($item->options->size)
                                                <strong class="mr-5 text-muted">Size:{{$item->options->size}}</strong>
                                            @endif
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
                                       {{-- @php
                                        $shippings=\App\Models\Shipping::where('user_id',auth()->user()->id)->first();
                                          if($shippings->city=='Dhaka'){
                                              $shipCost=70.00;
                                          }else{
                                              $shipCost=120.00;
                                          }
                                        @endphp--}}

                                        <td colspan="2" class="text-end">
                                              <em>&#2547; {{number_format(shippingCharge(),2)}}</em>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Order Total</th>
                                            <td colspan="2" class="product-subtotal text-end"><span class="font-xl text-brand fw-900">&#2547; {{number_format(str_replace(',','',Cart::subtotal())+shippingCharge(),2)}}</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-10 mb-10"></div>
                            <div class="payment_method">
                                <div class="mb-10">
                                    <h5>Select Payment Type</h5>
                                </div>
                                <div class="form-group">
                                    <div class="icheck-material-red icheck-inline">
                                        <input type="radio" id="someRadioId1" name="cod" value="cod"  wire:model="paymentmode"/>
                                        <label for="someRadioId1">Cash On Delivery</label>
                                    </div>
                                    <div class="icheck-material-red icheck-inline">
                                        <input type="radio" id="someRadioId2" name="bkash" value="bkash" wire:model="paymentmode"/>
                                        <label for="someRadioId2">Bkash</label>
                                    </div>
                                    <div class="icheck-material-red icheck-inline">
                                        <input type="radio" id="someRadioId3" name="card" value="card" wire:model="paymentmode" />
                                        <label for="someRadioId3">Online Payment</label>
                                    </div>
                                    @error('paymentmode') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                                 @if($paymentmode == 'bkash')
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="{{asset('frontend/assets/images/payment/bkash.png')}}" alt="..." style="width:100px;height: 80px">
                                    </div>
                                    <div class="flex-grow-1 ms-1">
                                        <strong class="text-danger">Bkash</strong>
                                        <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                                    </div>
                                </div>
                                 @elseif($paymentmode == 'card')

                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="{{asset('frontend/assets/images/payment/pay5.png')}}" alt="..." style="width:100px;height: 80px">
                                    </div>
                                    <div class="flex-grow-1 ms-1">
                                        <strong class="text-danger">Card</strong>
                                        <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                                    </div>
                                </div>
                                @else
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="{{asset('frontend/assets/images/payment/cod4.png')}}" alt="..." style="width:100px;height: 80px">
                                    </div>
                                    <div class="flex-grow-1 ms-1">
                                        <strong class="text-danger">Cash on delivery</strong>
                                        <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                                    </div>
                                </div>
                                 @endif

                            <div class="icheck-material-red icheck-inline">
                                <input type="checkbox" id="checksome" name="some"  value="1" wire:model="disabled" />
                                <label for="checksome">I have read and agree to the website <a href="{{route('warranty.policy')}}" class="text-danger" target="_blank">Terms and Conditions</a>,and
                                    <a href="{{route('refund.policy')}}" class="text-danger" target="_blank">Return & Refund Policy</a></label>
                            </div>
                            <br>

                            @if($paymentmode=='card')
                            <button class="btn btn-block mt-5 btn-sm" data-bs-toggle="modal" data-bs-target="#showModal" wire:click="checkoutModal" type="submit" {{ $disabled == 0 ?'disabled':'' }} style="width: 100%">PLACE ORDER CARD</button>
                            @elseif($paymentmode=='bkash')
                                <button class="btn btn-block mt-5 btn-sm" wire:click="checkoutModal" type="submit" {{ $disabled == 0 ?'disabled':'' }} style="width: 100%">PLACE ORDER BKASH</button>
                            @else
                                <button class="btn btn-block mt-5 btn-sm" wire:click="checkoutModal" type="submit" {{ $disabled == 0 ?'disabled':'' }} style="width: 100%">PLACE ORDER COD</button>
                            @endif

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
                    <h5 class="modal-title" id="exampleModalLabel">Shipping Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Are you sure want to delete?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click.prevent="delete()" >Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
