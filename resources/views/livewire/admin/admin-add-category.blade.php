<div wire:ignore.self class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Category Name</label>
                        <div class="input-style mb-2 col-sm-9">
                            <input name="top_title" placeholder="Enter Top Title" type="text" wire:model="name" wire:keyup="generateSlug" id="input">
                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>

                    <div class="row hidden">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Slug</label>
                        <div class="input-style mb-2 col-sm-9">
                            <input name="telephone" placeholder="Slug" type="text" wire:model="slug">
                            @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Category Image</label>
                        <div class="input-style mb-2 col-sm-9">
                            <input  placeholder="Image" type="file" class="form-control" wire:model="image">
                            @if($image)
                                <img src="{{$image->temporaryUrl()}}" style="width: 300px;height: 120px" alt="">
                            @endif
                            @error('image') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Root Category</label>
                        <div class="input-style mb-20 col-sm-9">
                            <select name="" id="" class="form-control" wire:model="category_id">
                                <option value="">None</option>
                               @foreach($category as $row)
                                <option value="{{$row->id}}">{{ucwords($row->name)}}</option>
                                @endforeach
                            </select>
                            @error('status') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Status</label>
                        <div class="input-style mb-20 col-sm-9">
                            <select name="" id="" class="form-control" wire:model="status">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('status') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" wire:click.prevent="addCategory()"><i class="fi-rs-label mr-5"></i>Add Category</button>
            </div>
        </div>
    </div>
</div>
