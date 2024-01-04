<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
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
                                                    <div class="sort-by-cover">
                                                        <button class="btn bg-dark text-white btn-sm" type="submit" data-bs-toggle="modal" data-bs-target="#addSettingModal"><i class="fi-rs-label mr-5"></i>Add Slider</button>
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
                                                        <th>Phone</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Address</th>
                                                        <th>Facebook</th>
                                                        <th>youtube</th>
                                                        <th>twitter</th>
                                                        <th>instagram</th>
                                                        <th>Image</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($settings as $setting)
                                                        <tr>
                                                            <td>{{$setting->id}}</td>
                                                            <td>{{$setting->phone}}</td>
                                                            <td>{{$setting->mobile}}</td>
                                                            <td>{{$setting->email}}</td>
                                                            <td>{{$setting->address}}</td>
                                                            <td>{{$setting->facebook}}</td>
                                                            <td>{{$setting->youtube}}</td>
                                                            <td>{{$setting->twitter}}</td>
                                                            <td>{{$setting->instagram}}</td>

                                                         <td><img src="{{asset('frontend/assets/images/setting')}}/{{$setting->image}}" alt="" style="width: 100px;height: 50px"></td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
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
    <div wire:ignore.self class="modal fade" id="addSettingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Setting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Phone</label>
                            <div class="input-style mb-2 col-sm-10">
                                <input name="top_title" placeholder="Phone" type="text" wire:model="phone">
                                @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Mobile</label>
                            <div class="input-style mb-2 col-sm-10">
                                <input name="telephone" placeholder="Mobile" type="text" wire:model="mobile">
                                @error('mobile') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label for="inputPassword" class="col-sm-2 col-form-label"> Email</label>
                            <div class="input-style mb-2 col-sm-10">
                                <input name="telephone" placeholder="Email" type="text" wire:model="email">
                                @error('email') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                            <div class="input-style mb-2 col-sm-10">
                                <input name="telephone" placeholder="Address" type="text" wire:model="address">
                                @error('address') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Facebook</label>
                            <div class="input-style mb-2 col-sm-10">
                                <input name="telephone" placeholder="Facebook" type="text" wire:model="facebook">
                                @error('facebook') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Youtube</label>
                            <div class="input-style mb-2 col-sm-10">
                                <input name="telephone" placeholder="youtube" type="text" wire:model="youtube">
                                @error('youtube') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Twitter</label>
                            <div class="input-style mb-2 col-sm-10">
                                <input name="telephone" placeholder="Twitter" type="text" wire:model="twitter">
                                @error('twitter') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">instagram</label>
                            <div class="input-style mb-2 col-sm-10">
                                <input name="telephone" placeholder="Instagram" type="text" wire:model="instagram">
                                @error('instagram') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                      <div class="row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Image</label>
                            <div class="input-style mb-2 col-sm-10">
                                <input  placeholder="Image" type="file" class="form-control" wire:model="image">
                                @if($image)
                                    <img src="{{$image->temporaryUrl()}}" style="width: 300px;height: 120px" alt="">
                                @else
                                    <img src="{{asset('frontend/assets/images/setting')}}/{{$old_image}}" style="width: 300px;height: 120px" alt="">
                                @endif

                                @error('image') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-sm" wire:click.prevent="addSetting()"><i class="fi-rs-label mr-5"></i>Add Setting</button>
                </div>
            </div>
        </div>
    </div>

</main>
