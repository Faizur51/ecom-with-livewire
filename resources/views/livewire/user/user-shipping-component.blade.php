<main class="main">
    @include('livewire.add-shipping-addressmodal')
    @include('livewire.edit-shipping-addressmdal')
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
                                            <h5 class="mb-0">Hello {{auth()->user()->name}} </h5>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addShippingAddress" data-bs-whatever="@mdo">+ Add New Address</button>
                                        </div>
                                        <div class="card-body" >
                                            <div class="table-responsive">
                                                <table class="table" style="border-bottom: 1px solid #dee2e6">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Address Type</th>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>City</th>
                                                        <th>Post Code</th>
                                                        <th>Address</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($shippings as $shipping)
                                                        <tr>
                                                            <td>#{{$shipping->id}}</td>
                                                            <td>{{ucwords($shipping->address_type)}}</td>
                                                            <td>{{ucwords($shipping->name)}}</td>
                                                            <td>{{$shipping->phone}}</td>
                                                            <td>{{ucwords($shipping->city)}}</td>
                                                            <td>{{$shipping->post_code}}</td>
                                                            <td>{{ucwords($shipping->address)}}</td>
                                                            <td>
                                                                <a class="btn-small" data-bs-toggle="modal" data-bs-target="#editShippingAddress" wire:click.prevent="editShippinfo({{$shipping->id}})"><i class="fi-rs-pencil mr-5"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{$shippings->links()}}
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
