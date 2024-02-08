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
                        @include('livewire.user.page-link')
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
                                                        <th>Image</th>
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
                                                            <td><img src="{{$review->orderItem->product->image}}" alt="" style="width: 60px"></td>
                                                            <td>{{Carbon\Carbon::parse($review->created_at)->diffForHumans()}}</td>
                                                            <td>
                                                                @if($review->status==1)
                                                                    <li class="text-success">Approved</li>
                                                                @else
                                                                    <li class="text-danger">Not Approved</li>
                                                                @endif
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

