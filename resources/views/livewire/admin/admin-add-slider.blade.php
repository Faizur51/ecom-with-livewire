<div wire:ignore.self class="modal fade" id="addSliderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Top Title</label>
                        <div class="input-style mb-2 col-sm-10">
                            <input name="top_title" placeholder="Enter Top Title" type="text" wire:model="top_title" wire:keyup="generateSlug" id="input">
                            @error('top_title') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Slug</label>
                        <div class="input-style mb-2 col-sm-10">
                            <input name="telephone" placeholder="Slug" type="text" wire:model="slug">
                            @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <label for="inputPassword" class="col-sm-2 col-form-label"> Title</label>
                        <div class="input-style mb-2 col-sm-10">
                            <input name="telephone" placeholder="Title" type="text" wire:model="title">
                            @error('title') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Sub Title</label>
                        <div class="input-style mb-2 col-sm-10">
                            <input name="telephone" placeholder="Sub Title" type="text" wire:model="sub_title">
                            @error('sub_title') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Offer</label>
                        <div class="input-style mb-2 col-sm-10">
                            <input name="telephone" placeholder="Offer" type="number" wire:model="offer">
                            @error('offer') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Link</label>
                        <div class="input-style mb-2 col-sm-10">
                            <input name="telephone" placeholder="Link" type="text" wire:model="link">
                            @error('link') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Image</label>
                        <div class="input-style mb-2 col-sm-10">
                            <input  placeholder="Image" type="file" class="form-control" wire:model="image">
                            @if($image)
                                <img src="{{$image->temporaryUrl()}}" style="width: 300px;height: 120px" alt="">
                            @endif
                            @error('image') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>

                  {{--  <div class="row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                        <div class="input-style mb-20 col-sm-10">
                            <select name="" id="" class="form-control" wire:model="status">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('status') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>--}}

                    <div class="row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                        <div class="input-style mb-2 col-sm-10">
                            <div class="icheck-material-teal icheck-inline">
                                <input type="radio" id="chb1" wire:model="status" value="1"/>
                                <label for="chb1">Active</label>
                            </div>
                            <div class="icheck-material-red icheck-inline">
                                <input type="radio" id="chb2" wire:model="status" value="0"/>
                                <label for="chb2">Inactive</label>
                            </div>
                            @error('status') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>



                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm" wire:click.prevent="addSlider"><i class="fi-rs-label mr-5"></i>Add Slider</button>
            </div>
        </div>
    </div>
</div>


