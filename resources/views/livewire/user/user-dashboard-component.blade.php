<main class="main">
    <style>
        .editimage {
            position: relative;
        }

        .topleft {
            position: absolute;
            top: 0px;
            right: 40px;
            font-size: 18px;
        }

        img:hover {
            opacity: 0.3;
        }
    </style>

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
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                     aria-labelledby="dashboard-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card mb-3 mb-lg-0">
                                                    <div class="card-header d-flex justify-content-between">
                                                        <h5 class="mb-0">Basic Information</h5>
                                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editProfile" wire:click.prevent="editProfile()" data-bs-whatever="@mdo">+ Edit Profile
                                                        </button>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                                 <div class="col-md-3 editimage">
                                                                       @if($user->profile->image)
                                                                           <img src="{{asset('frontend/assets/images/profile')}}/{{$user->profile->image}}" alt="">
                                                                       @else
                                                                           <img src="{{asset('frontend/assets/images/profile/user/images3.png')}}" alt="">
                                                                       @endif
                                                                     <div class="topleft">
                                                                         <a href="#" class="file-upload" data-bs-toggle="modal" data-bs-target="#editPicture" wire:click.prevent="editPicture()"><i class="fi-rs-pencil"></i></a>
                                                                     </div>
                                                                 </div>

                                                             <div class="col-md-3">
                                                                 <p>Full Name : {{$user->name}}</p>
                                                                 <p>Email     : {{$user->email}}</p>
                                                                 <p>Phone No  : {{$user->profile->phone}}</p>
                                                                 <p>Gender    : {{$user->profile->gender}}</p>
                                                                 <p>Birth Date: {{$user->profile->birth_date}}</p>
                                                                 <p>Occupation: {{$user->profile->occupation}}</p>
                                                                 <a href="#" class="btn-small" data-bs-toggle="modal" data-bs-target="#editProfile" wire:click.prevent="editProfile()" >Edit Profile</a>
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
         wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profile informatiom</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <input type="text" required="" name="name" placeholder="Your Full Name" wire:model="name">
                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="Phone Number" placeholder="Phone Number" wire:model="phone">
                            @error('phone') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <div class="form-group">
                            <input type="text"  placeholder="Your Email" readonly wire:model="email">
                            @error('email') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <div class="form-group">
                            <select class="form-select" aria-label="Default select example" wire:model="gender">
                                <option selected>Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            @error('gender') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" id="datepicker1" placeholder="Birth Date" wire:model="birth_date"
                                   class="square" onchange="livewire.emit('setStartDate',this.value)">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Occupation" wire:model="occupation">
                            @error('occupation') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm faizbtn" wire:click.prevent="UpdateProfile()">Update Profile</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editPicture" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profile informatiom</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <div class="input-style mb-2 col-sm-12">
                                <input  placeholder="Image" type="file" class="form-control" wire:model="image">
                                @if($image)
                                    <img src="{{$image->temporaryUrl()}}" style="width: 200px;height: 200px" alt="">
                                @else
                                    <img src="{{asset('frontend/assets/images/profile')}}/{{$old_image}}" style="width: 200px;height: 200px" alt="">
                                @endif
                                @error('image') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm faizbtn" wire:click.prevent="UpdatePicture()">Update Picture</button>
                </div>
            </div>
        </div>
    </div>
















</main>
@push('scripts')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script>
        var picker = new Pikaday({
            field: document.getElementById('datepicker1'),
            onSelect: function () {
            @this.set('birth_date', this.getMoment().format('DD-MM-YYYY'))
                ;
            }
        });

        document.addEventListener('livewire:load', function () {
            $('.select-active').select2();
            $('.select-active').on('change', function () {
            @this.set('status', this.value)
                ;
            })
        })

        $('.file-upload').on('click', function(e) {
            e.preventDefault();
            $('#file-input').trigger('click');
        });


    </script>

@endpush
