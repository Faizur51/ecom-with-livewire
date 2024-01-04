
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
                        @include('livewire.user.page-link')
                        <div class="col-md-10 shadow">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card mb-3 mb-lg-0">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Change Password</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                                  <div class="col-md-6 offset-3">
                                                                      <form wire:submit.prevent="changePassword">
                                                                          <div class="form-group" >
                                                                              <input type="password"  placeholder="Current Password" wire:model="current_password">
                                                                              @error('current_password') <p class="text-danger">{{$message}}</p> @enderror
                                                                          </div>
                                                                          <div class="form-group">
                                                                              <input type="password"  placeholder="New Password" wire:model="password">
                                                                              @error('password') <p class="text-danger">{{$message}}</p> @enderror
                                                                          </div>
                                                                          <div class="form-group">
                                                                              <input type="password"  placeholder="Confirm Password" wire:model="password_confirmation">
                                                                              @error('password_confirmation') <p class="text-danger">{{$message}}</p> @enderror
                                                                          </div>

                                                                          <div class="form-group">
                                                                              <button type="submit" class="btn btn-primary btn-sm faizbtn" >Change Password</button>
                                                                          </div>
                                                                      </form>
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
</main>

