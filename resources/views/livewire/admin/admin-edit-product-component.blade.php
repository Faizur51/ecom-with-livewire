<main class="main position-relative wow fadeIn animated animated animated">
    <style>
        .bg-square {
            position: absolute;
            left: auto;
            top: 150px;
            right: 0%;
            bottom: auto;
            width: 100%;
            height: 100%;
            max-height: 70%;
            max-width: 45%;
            min-width: 300px;
            background-color: #f3fbf5;
            z-index: -1;
        }
    </style>

    <div class="bg-square"></div>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> My Account
            </div>
        </div>
    </div>
    <section class="pt-10 pb-10">
        <div class="container " >
            <form wire:submit.prevent="editProduct">
                <div class="row">
                    @include('livewire.admin.page-link')
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Edit Product</h5>
                            </div>
                            <div class="card-body contact-from-area">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="contact-form-style  mb-1">
                                            <div class="input-style mb-2">
                                                <label>Product Name</label>
                                                <div class="input-style mb-2">
                                                    <input name="top_title" placeholder="Product Name" type="text" wire:model="name" wire:keyup="generateSlug" id="input">
                                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>
                                            <div class="input-style mb-2 hidden">
                                                <label>Slug</label>
                                                <input name="telephone" placeholder="Slug" type="text" wire:model="slug">
                                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>

                                            <div class="input-style mb-2" wire:ignore>
                                                <label>Short Description</label>
                                                <div>
                                                    <textarea id="editor1" wire:model="short_description"></textarea>
                                                </div>
                                                @error('short_description') <p
                                                    class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="col-lg-12 mb-sm-15" wire:ignore>
                                                <div class="toggle_info">
                                                    <span><i class="fi-rs-user mr-10"></i><span class="text-muted">Already have an account?</span> <a href="#ldescription" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click here</a></span>
                                                </div>
                                                <div class="panel-collapse login_form collapse" id="ldescription" style="">
                                                    <div class="input-style mb-2">
                                                        <label>Long Description</label>
                                                        <div>
                                                            <textarea id="editor2" wire:model="long_description"></textarea>
                                                        </div>
                                                        @error('long_description') <p class="text-danger">{{$message}}</p> @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="input-style mb-2">
                                                <label>SKU Code</label>
                                                <input name="telephone" placeholder="SKU Code" type="text" wire:model="sku_code">
                                                @error('sku_code') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>

                                            <div class="row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">Stock Status</label>
                                                <div class="input-style mb-2 col-sm-9">
                                                    <div class="icheck-material-teal icheck-inline">
                                                        <input type="radio" id="chb11" wire:model="stock_status" value="1"/>
                                                        <label for="chb11">Instock</label>
                                                    </div>
                                                    <div class="icheck-material-red icheck-inline">
                                                        <input type="radio" id="chb22" wire:model="stock_status" value="0"/>
                                                        <label for="chb22">Outstock</label>
                                                    </div>
                                                    @error('stock_status') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">Quantity</label>
                                                <div class="input-style mb-2 col-sm-9">
                                                    <input name="telephone" placeholder="Quantity" type="number" wire:model="quantity">
                                                    @error('quantity') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">Regular Price</label>
                                                <div class="input-style mb-2 col-sm-9">
                                                    <input name="top_title" placeholder="Regular Price" type="number" wire:model="regular_price"  id="input">
                                                    @error('regular_price') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">Sale Price</label>
                                                <div class="input-style mb-2 col-sm-9">
                                                    <input name="telephone" placeholder="Sale Price" type="number" wire:model="sale_price">
                                                    @error('sale_price') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">

                        <div class="card">
                            <div class="card-header">
                                <a class="mb-0 btn btn-primary btn-sm" href="{{route('admin.manage.product')}}">Manage Product</a>
                            </div>
                            <div class="card-body contact-from-area">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="contact-form-style mb-1">
                                            <div class="row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">Size</label>
                                                <div class="input-style mb-2" wire:ignore>
                                                    @foreach($sizes as $size)
                                                        <div class="icheck-material-grey icheck-inline" >
                                                            <input type="checkbox" id="{{$size->name}}" value="{{$size->name}}" wire:model="size"/>
                                                            <label for="{{$size->name}}">{{ucwords($size->name)}}</label>
                                                        </div>
                                                    @endforeach
                                                    @error('size') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">Color</label>
                                              <div class="input-style mb-2" wire:ignore>
                                                    @foreach($colors as $color)
                                                        <div class="icheck-material-{{$color->name}} icheck-inline">
                                                            <input type="checkbox" id="{{$color->name}}" value="{{$color->name}}" wire:model="color"/>
                                                            <label for="{{$color->name}}">{{ucwords($color->name)}}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                @error('color') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>

                                            <div class="row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">Image</label>
                                                <div class="input-style mb-2">
                                                    <input placeholder="Image" type="file" class="form-control" wire:model="new_image">
                                                    @if($new_image)
                                                        <img src="{{$new_image->temporaryUrl()}}" style="width: 300px;height: 200px" alt="">
                                                    @else
                                                        <img src="{{asset('frontend/assets/images/product')}}/{{$image}}" style="width: 300px;height: 200px" alt="">
                                                    @endif
                                                    @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">Galary Images</label>
                                                <div class="input-style mb-2">
                                                    <input placeholder="Image" type="file" class="form-control" multiple wire:model="new_images">
                                                    @if($new_images)
                                                        @foreach($new_images as $image)
                                                            @if($image)
                                                            <img src="{{$image->temporaryUrl()}}" style="width: 77px;height: 70px" alt="">
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        @foreach($images as $image)
                                                            @if($image)
                                                                <img src="{{asset('frontend/assets/images/product')}}/{{$image}}" style="width: 77px;height: 70px" alt="">
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    @error('images') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>


                                            <div class="row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">Category</label>
                                                <div class="input-style mb-2">
                                                    <select name="" id="" class="form-control" wire:model="category_id">
                                                        <option value="">Select Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">Sub
                                                    Category</label>
                                                <div class="input-style mb-2">
                                                    <select name="" id="" class="form-control" wire:model="subcategory_id">
                                                        <option value="">Select SubCategory</option>
                                                        @foreach($scategories as $scategory)
                                                            <option value="{{$scategory->id}}">{{ucwords($scategory->name)}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('subcategory_id') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">Brand</label>
                                                <div class="input-style mb-2">
                                                    <select name="" id="" class="form-control" wire:model="brand_id">
                                                        <option value="0">Select Brand</option>
                                                        @foreach($brands as $brand)
                                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('brand_id') <p class="text-danger">{{$message}}</p> @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">Status</label>
                                                <div class="input-style mb-2 col-sm-9">
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
                                            <button class="submit submit-auto-width btn-sm" type="submit">Edit Product</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>

@push('scripts')
    <script>
        const editor = CKEDITOR.replace('editor1', {
            height: 100,
            removeButtons: 'Cut,Copy,Undo,Redo,Anchor,Source,About',
        });
        editor.on('change', function (event) {
        @this.set('short_description', event.editor.getData());
        })
        window.addEventListener('resetEvent', event => {
            CKEDITOR.instances['editor1'].setData('')
        })

        const editor2 = CKEDITOR.replace('editor2', {
            height: 100,
            removeButtons: 'Cut,Copy,Paste,Undo,Redo,Anchor,Source,About',
        });
        editor2.on('change', function (event) {
        @this.set('long_description', event.editor.getData());
        })
        window.addEventListener('resetEvent', event => {
            CKEDITOR.instances['editor2'].setData('')
        })

        document.addEventListener('livewire:load', function () {
            $('.select-active').select2();
            $('.select-active').on('change', function () {
            @this.set('stock_status', this.value);
            })
        })

    </script>

@endpush
