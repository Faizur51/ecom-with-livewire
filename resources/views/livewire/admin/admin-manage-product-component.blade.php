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
            <div class="row ">
                <div class="col-lg-12 m-auto">
                    <div class="row">
                        @include('livewire.admin.page-link')
                        <div class="col-md-10 shadow">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="shop-product-fillter" style="margin-bottom: 0px">
                                                <div class="search-form">
                                                    <form action="#">
                                                        <input type="text" placeholder="Search…" wire:model="search">
                                                        <button type="submit"> <i class="fi-rs-search"></i> </button>
                                                    </form>
                                                </div>
                                                <div class="sort-by-product-area">
                                                    <div class="sort-by-cover mr-10">
                                                        <div class="sort-by-product-wrap">
                                                            <div class="sort-by">
                                                                <span><i class="fi-rs-apps"></i>Show:</span>
                                                            </div>
                                                            <div class="sort-by-dropdown-wrap">
                                                                <span>{{$pageSize}}<i class="fi-rs-angle-small-down"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="sort-by-dropdown">
                                                            <ul>
                                                                <li><a class="{{$pageSize==10?'active':''}}" href="#" wire:click.prevent="changePageSize(12)">10</a></li>
                                                                <li><a class="{{$pageSize==15?'active':''}}" href="#" wire:click.prevent="changePageSize(15)">15</a></li>
                                                                <li><a class="{{$pageSize==20?'active':''}}" href="#" wire:click.prevent="changePageSize(20)">20</a></li>
                                                                <li><a class="{{$pageSize==24?'active':''}}" href="#" wire:click.prevent="changePageSize(24)">24</a></li>
                                                                <li><a class="{{$pageSize==32?'active':''}}" href="#" wire:click.prevent="changePageSize(32)">32</a></li>
                                                                <li><a class="{{$pageSize==60?'active':''}}" href="#" wire:click.prevent="changePageSize(60)">60</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="sort-by-cover">
                                                        <a class="text-white btn btn-sm btn-primary" href="{{route('admin.add.product')}}" ><i class="fi-rs-label mr-5"></i>Add Product</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-sm" style="border-bottom: 1px solid #dee2e6">
                                                    <thead class="table-light">
                                                    <tr>
                                                        <th>S/L</th>
                                                        <th>Name</th>
                                                        <th>SKU Code</th>
                                                        <th>Sale Price</th>
                                                        <th>Quantity</th>
                                                        <th>Brand</th>
                                                        <th>Category</th>
                                                        <th>Image</th>
                                                        <th>Status</th>
                                                        <th class="text-center" colspan="2">Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($products as $product)
                                                        <tr>
                                                            <td>{{$product->id}}</td>
                                                            <td>{{ucwords($product->name)}}</td>
                                                            <td>{{$product->sku_code}}</td>
                                                            <td>{{$product->sale_price}}</td>
                                                            <td>{{$product->quantity}}</td>
                                                            <td>{{$product->brand->name}}</td>
                                                            <td>{{$product->category->name}}</td>
                                                            <td><img src="{{asset('frontend/assets/images/product')}}/{{$product->image}}" alt="" style="width: 100px;height: 50px"></td>
                                                            {{--<td>{{$product->status==1?'Active':'Inactive'}}</td>--}}

                                                            <td wire:ignore>
                                                                @livewire('admin.toggle-switch', [
                                                                'model' => $product,
                                                                'field' => 'status'
                                                                ])
                                                            </td>


                                                            <td><a  class="btn-small"  href="{{route('admin.edit.product',['product_slug'=>$product->slug])}}"><i class="fi-rs-pencil"></i></a></td>
                                                            <td><a  class="btn-small" data-bs-toggle="modal" data-bs-target="#exampleModal" wire:click.prevent="deleteId({{$product->id}})"><i class="fi-rs-trash"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $products->links() }}
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
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

</main>


