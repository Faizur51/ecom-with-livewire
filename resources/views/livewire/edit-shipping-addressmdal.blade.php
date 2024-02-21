<div class="modal fade" id="editShippingAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Shipping Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <div class="icheck-material-teal icheck-inline">
                            <input type="radio" id="someRadioId110" name="someGroupNameship" value="home" wire:model="address_type" />
                            <label for="someRadioId110">Home</label>
                        </div>
                        <div class="icheck-material-teal icheck-inline">
                            <input type="radio" id="someRadioId220" name="someGroupNameship" value="office" wire:model="address_type" />
                            <label for="someRadioId220">Office</label>
                        </div>
                        <div class="icheck-material-teal icheck-inline">
                            <input type="radio" id="someRadioId330" name="someGroupNameship" value="other" wire:model="address_type" />
                            <label for="someRadioId330">Other</label>
                        </div>
                        @error('address_type') <p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="form-group" >
                        <input type="text" required="" name="name" placeholder="Your Full Name" wire:model="name">
                        @error('name') <p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="Phone Number" placeholder="Phone Number" wire:model="phone">
                        @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="Phone Number" placeholder="Your Email" wire:model="email">
                        @error('email') <p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="form-group">

                        <select name="" id="" wire:model="city" class="form-control">
                            <option value="">Select City</option>
                            @foreach($districts as $district)
                                <option value="{{$district->name}}">{{$district->name}}</option>
                            @endforeach
                        </select>
                        @error('city') <p class="text-danger">{{$message}}</p> @enderror

                    </div>
                    <div class="form-group">
                        <input type="text" name="Phone Number" placeholder="Your Post Code" wire:model="post_code">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Phone Number" placeholder="Your Shipping Address" wire:model="address">
                        @error('address') <p class="text-danger">{{$message}}</p> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" wire:click.prevent="UpdateShipinfo()">Edit Shipping</button>
            </div>
        </div>
    </div>
</div>
