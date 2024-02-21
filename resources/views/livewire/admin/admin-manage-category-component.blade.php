<main class="main">
    @include('livewire.admin.admin-add-category')
    @include('livewire.admin.admin-edit-category')
    @include('livewire.admin.admin-edit-subcategory')

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
                                <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="shop-product-fillter" style="margin-bottom: 0px">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="search-form">
                                                        <form action="#">
                                                            <input type="text" placeholder="Search…" wire:model="search">
                                                            <button type="submit"> <i class="fi-rs-search"></i> </button>
                                                        </form>
                                                    </div>
                                                    @if($checked)
                                                    <div class="dropdown ml-10">
                                                        <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fi-rs-refresh mr-5"></i> Action ({{count($checked)}})
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <li><a href="#"  data-bs-toggle="modal" data-bs-target="#multirecorddeleteModel" class="dropdown-item" type="button" {{--onclick="confirm('Are you sure you want to delete this records?') || event.stopImmediatePropagation()"--}} > <i class="fi-rs-trash mr-5"></i>Delete</a></li>
                                                            <li><a class="dropdown-item" type="button" onclick="confirm('Are you sure you want to change the status?') || event.stopImmediatePropagation()" wire:click="changeActiveStatus(1)"><i class="fi-rs-thumbs-up mr-5"></i>Active</a></li>
                                                            <li><a class="dropdown-item" type="button" onclick="confirm('Are you sure you want to change the status?') || event.stopImmediatePropagation()" wire:click="changeInActiveStatus(0)"><i class="fi-rs-thumbs-down mr-5"></i>InActive</a></li>

                                                        </ul>
                                                    </div>
                                                    @endif
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
                                                        <button class="btn text-white btn-sm" type="submit" data-bs-toggle="modal" data-bs-target="#addCategoryModal"><i class="fi-rs-label mr-5"></i>Add Category</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-sm" style="border-bottom: 1px solid #dee2e6">
                                                    <thead class="table-light">
                                                    <tr>
                                                        <th>Checked</th>
                                                        <th>S/L</th>
                                                        <th>Name</th>
                                                        <th>Slug</th>
                                                        <th>Image</th>
                                                        <th>Subcategory</th>
                                                        <th>Status</th>
                                                        <th class="text-center" colspan="2">Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($categories as $category)

                                                        <tr class="{{$this->isChecked($category->id)}}">
                                                            <td><div class="icheck-material-cyan icheck-inline" wire:ignore>
                                                                    <input type="checkbox" id="{{$category->name}}1"
                                                                           value="{{$category->id}}" wire:model="checked"/>
                                                                    <label for="{{$category->name}}1"></label>
                                                                </div>
                                                            </td>
                                                            <td>{{$category->id}}</td>
                                                            <td>{{ucwords($category->name)}}</td>
                                                            <td>{{$category->slug}}</td>
                                                            <td>
                                                              <div class="product-img product-img-zoom img-hover-scale overflow-hidden">
                                                                  @if(strlen($category->image > 25))
                                                                      <img class="default-img" src="{{$category->image}}" alt="" style="width: 80px;height: 50px">
                                                                  @else
                                                                      <img class="default-img" src="{{asset('frontend/assets/images/category')}}/{{$category->image}}" alt="" style="width: 80px;height: 50px">
                                                                  @endif
                                                              </div>
                                                          </td>
                                                            <td>
                                                                <ul class="sclist">
                                                                    @foreach($category->subcategory as $scategory)
                                                                    <li>
                                                                        <table class="table">
                                                                            <tbody>
                                                                            <tr>
                                                                                <td class="image product-thumbnail" style="width: 50px"><img src="{{asset('frontend/assets/images/category')}}/{{$scategory->image}}" style="width: 40px;height: 30px" alt="#"></td>
                                                                                <td><span><a href="product-details.html">{{ucwords($scategory->name)}}</a></span></td>
                                                                                <td style="width: 80px">
                                                                                    <a  class="btn-small" data-bs-toggle="modal" data-bs-target="#subcategoryModal" wire:click.prevent="deleteSubcatId({{$scategory->id}})"><i class="fi-rs-trash"></i></a>
                                                                                    <a  class="ml-5 btn-small" data-bs-toggle="modal" data-bs-target="#editSubcategoryModal" wire:click.prevent="editSubcategory({{$scategory->id}})"><i class="fi-rs-pencil"></i></a>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                          <td>
                                                              <p class="text-center {{$category->status==1?'bg-3':'bg-6'}}">
                                                                  <a href="javascript:void(0)">{{$category->status==1?'Active':'Inactive'}}</a>
                                                              </p>
                                                          </td>
                                                           {{-- <td wire:ignore>
                                                                @livewire('admin.toggle-switch', [
                                                                'model' => $category,
                                                                'field' => 'status'
                                                                ])
                                                            </td>--}}


                                                            <td><a  class="btn-small" data-bs-toggle="modal" data-bs-target="#editCategoryModal" wire:click.prevent="edit({{$category->id}})"><i class="fi-rs-pencil"></i></a></td>
                                                            <td><a  class="btn-small" data-bs-toggle="modal" data-bs-target="#exampleModal" wire:click.prevent="deleteId({{$category->id}})"><i class="fi-rs-trash"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $categories->links() }}
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
    <div wire:ignore.self class="modal fade" id="subcategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click.prevent="deleteSubcategory()" >Yes,Delete</button>
                </div>
            </div>
        </div>
    </div>


    <div wire:ignore.self class="modal fade" id="multirecorddeleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Are you sure want to {{count($checked)}} records delete?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"  wire:click="deleteRecords()">Yes,Delete</button>
                </div>
            </div>
        </div>
    </div>








</main>
