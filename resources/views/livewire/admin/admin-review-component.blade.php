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
                        @include('livewire.admin.page-link')
                        <div class="col-md-10 shadow">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <h5 class="mb-0">Review </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table" style="border-bottom: 1px solid #dee2e6">
                                                    <thead>
                                                    <tr>
                                                        <th>Sl</th>
                                                        <th>Display</th>
                                                        <th>Rating</th>
                                                        <th>Comment</th>
                                                        <th>Name</th>
                                                        <th>Mobile</th>
                                                        <th>Product Name</th>
                                                        <th>Product Image</th>
                                                        <th>Created At</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse($reviews as $review)
                                                        <tr>
                                                            <td>{{$review->id}}</td>
                                                            <td>
                                                                <div class="product-rate d-inline-block">
                                                                    @if($review->rating==5)
                                                                        <div class="product-rating" style="width:{{$review->rating*20}}%"></div>
                                                                    @elseif($review->rating==4)
                                                                        <div class="product-rating" style="width:{{$review->rating*20}}%"></div>
                                                                    @elseif($review->rating==3)
                                                                        <div class="product-rating" style="width:{{$review->rating*20}}%"></div>
                                                                    @elseif($review->rating==2)
                                                                        <div class="product-rating" style="width:{{$review->rating*20}}%"></div>
                                                                    @elseif($review->rating==1)
                                                                        <div class="product-rating" style="width:{{$review->rating*20}}%"></div>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td>{{$review->rating}}</td>
                                                            <td>{{ucwords($review->comment)}}</td>
                                                            <td>{{ucwords($review->orderItem->order->name)}}</td>

                                                            <td>{{$review->orderItem->order->phone}}</td>
                                                            <td>{{ucwords($review->orderItem->product->name)}}</td>
                                                             <td>
                                                                 <div>
                                                                     @if(strlen($review->orderItem->product->image)>25)
                                                                         <a href="{{route('product.details',['slug'=>$review->orderItem->product->slug])}}"><img src="{{$review->orderItem->product->image}}" alt="#"></a>
                                                                     @else
                                                                         <a href="{{route('product.details',['slug'=>$review->orderItem->product->slug])}}"><img src="{{asset('frontend/assets/images/product')}}/{{$review->orderItem->product->image}}" alt="#" style="width: 60px"></a>
                                                                     @endif
                                                                 </div>
                                                             </td>
                                                            <td>{{Carbon\Carbon::parse($review->created_at)->format('M d, Y')}}</td>
                                                          {{-- <td>
                                                               <p class="text-center {{$review->status==1?'bg-3':'bg-6'}}">
                                                                   <a href="javascript:void(0)">{{$review->status==1?'Active':'Inactive'}}</a>
                                                               </p>
                                                           </td>--}}

                                                         <td wire:ignore>
                                                                @livewire('admin.toggle-switch', [
                                                                'model' => $review,
                                                                'field' => 'status'
                                                                ])
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="10"><h5 class="text-center">Product Review Not Found</h5></td>
                                                        </tr>
                                                    @endforelse
                                                    </tbody>
                                                </table>
                                                {{ $reviews->links() }}
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

