<div>
    <div wire:ignore.self class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <form class="modal-content" method="POST" @if($updateUser == true) wire:submit.prevent="UserUpdate()"  @else wire:submit.prevent="addUser()" @endif>
                <div class="modal-header">
                    <h5 class="modal-title">{{ $updateUser == true ? 'Edit' : 'Add'}} User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="card">
                        <div class="card-header text-muted text-xs  bg-light">User Information</div>
                        <div class="card-body">


                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  maxlength="30"  autocomplete="off" oninput="this.value = this.value.toUpperCase()"  placeholder="Enter User Name" wire:model="name">
                                    <label for="name">Name</label>
                                    @error('name')
                                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>

                            </div>


                            {{-- <div class="mb-3 row">
                                <label class="col-4 col-form-label">Sub Office Assigned</label>
                                <div class="col">
                                    <select class="form-select  @error('municipality_id') is-invalid @enderror"  data-placeholder="Select Fund" id="municipality_id"  wire:model.live="municipality_id" >
                                        <option value="" selected>--- Choose Option ---</option>
                                        @forelse ($Municipalities as $Municipality )
                                            <option value="{{ $Municipality->id }}"> {{ $Municipality->municipality }} </option>

                                        @empty

                                        @endforelse


                                    </select>
                                    @error('municipality_id')
                                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>
                              </div> --}}

                              <div class="hr-text my-4">Log in Credentials</div>

                              <div class="col-12 col-sm-12 col-md-12">

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="user_name"  maxlength="30"  autocomplete="off" oninput="this.value = this.value.toUpperCase()"  placeholder="Enter User Name" wire:model="user_name" @if($updateUser == True) readonly @endif>
                                    <label for="user_name">User Name</label>
                                    @error('user_name')
                                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                                    @enderror
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"  maxlength="30"  autocomplete="off" placeholder="Enter Password" wire:model="password">
                                        <label for="password">Password</label>
                                        @error('password')
                                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirmpassword"  maxlength="30"  autocomplete="off" placeholder="Confirm Password" wire:model="confirm_password">
                                        <label for="confirmpassword">Confirm Password</label>
                                        @error('confirm_password')
                                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal"> Close</button>
                    <button type="submit" class="btn btn-primary"> {{ $updateUser == true ? 'Update User' : 'Create User'}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

