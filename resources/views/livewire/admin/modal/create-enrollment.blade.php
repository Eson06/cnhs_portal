<div>
    <div wire:ignore.self class="modal fade" id="createenrollment" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

    <form class="modal-content" method="POST" wire:submit.prevent="NewEnrollee">
        <div class="modal-header">
            <h5 class="modal-title">Create New Enrollment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent="resetUserForm()"></button>
        </div>
        <div class="modal-body text-center py-4">
            <li class="hr-text m-2 mb-3">Student Information</li>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-floating mb-3">
                        <input 
                            type="text" 
                            class="form-control @error('lrn') is-invalid @enderror" 
                            id="lrn"  
                            maxlength="30"  
                            autocomplete="off" 
                            oninput="this.value = this.value.toUpperCase()"  
                            placeholder="Learner Reference Number" 
                            wire:model="lrn"
                        >
                        <label for="lrn">Learner Reference Number</label>
                        @error('lrn')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

           <div class="row">
<div class="col-sm-4">
                <div class="form-floating mb-3">
                    <input 
                        type="text" 
                        class="form-control @error('first_name') is-invalid @enderror" 
                        id="first_name"  
                        maxlength="30"  
                        autocomplete="off" 
                        oninput="this.value = this.value.toUpperCase()"  
                        placeholder="First Name" 
                        wire:model="first_name"
                    >
                    <label for="first_name">First Name</label>
                    @error('first_name')
                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
</div>

<div class="col-sm-4">
    <div class="form-floating mb-3">
        <input 
            type="text" 
            class="form-control @error('middle_name') is-invalid @enderror" 
            id="middle_name"  
            maxlength="30"  
            autocomplete="off" 
            oninput="this.value = this.value.toUpperCase()"  
            placeholder="Middle Name" 
            wire:model="middle_name"
        >
        <label for="middle_name">Middle Name</label>
        @error('middle_name')
            <p class="text-danger text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
<div class="col-sm-4">
    <div class="form-floating mb-3">
        <input 
            type="text" 
            class="form-control @error('last_name') is-invalid @enderror" 
            id="last_name"  
            maxlength="30"  
            autocomplete="off" 
            oninput="this.value = this.value.toUpperCase()"  
            placeholder="Last Name" 
            wire:model="last_name"
        >
        <label for="last_name">Last Name</label>
        @error('last_name')
            <p class="text-danger text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <select 
                            class="form-select @error('gender') is-invalid @enderror" 
                            id="gender" 
                            wire:model="gender">
                            <option value="">-- Select Gender --</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <label for="gender">Gender</label>
                        @error('gender')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                </div>

                    <div class="col-sm-8">
                        <div class="form-floating mb-3">
                            <input 
                                type="date" 
                                class="form-control @error('birthday') is-invalid @enderror" 
                                id="birthday"  
                                wire:model="birthday"
                            >
                            <label for="birthday">Birthday</label>
                            @error('birthday')
                                <p class="text-danger text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                
            </div>

            <div class="row">
                <div class="col-sm-9">
                    <div class="form-floating mb-3">
                        <input 
                            type="text" 
                            class="form-control @error('address') is-invalid @enderror" 
                            id="address"  
                            maxlength="100"  
                            autocomplete="off" 
                            oninput="this.value = this.value.toUpperCase()"  
                            placeholder="Home Address" 
                            wire:model="address"
                        >
                        <label for="address">Home Address</label>
                        @error('address')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                     <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <select 
                            class="form-control @error('ip') is-invalid @enderror" 
                            id="ip" 
                            wire:model="ip">
                            <option value="">-- Select --</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                        <label for="ip">Indigenous People</label>
                        @error('ip')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input 
                            type="tel" 
                            class="form-control @error('contact_number') is-invalid @enderror" 
                            id="contact_number"  
                            maxlength="11"  
                            autocomplete="off" 
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                            placeholder="Contact Number" 
                            wire:model="contact_number"
                        >
                        <label for="contact_number">Contact Number</label>
                        @error('contact_number')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input 
                            type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            id="email"  
                            maxlength="30"  
                            autocomplete="off" 
                            oninput="this.value = this.value.toUpperCase()"  
                            placeholder="Email" 
                            wire:model="email"
                        >
                        <label for="email">Email</label>
                        @error('email')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <li class="hr-text m-2 mb-3">Emergency Contact</li>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-floating mb-3">
                        <input 
                            type="text" 
                            class="form-control @error('ec_fullname') is-invalid @enderror" 
                            id="ec_fullname"  
                            maxlength="30"  
                            autocomplete="off" 
                            oninput="this.value = this.value.toUpperCase()"  
                            placeholder="Fullname" 
                            wire:model="ec_fullname"
                        >
                        <label for="ec_fullname">Fullname</label>
                        @error('ec_fullname')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input 
                            type="text" 
                            class="form-control @error('ec_relationship') is-invalid @enderror" 
                            id="ec_relationship"  
                            maxlength="30"  
                            autocomplete="off" 
                            oninput="this.value = this.value.toUpperCase()"  
                            placeholder="Relationship" 
                            wire:model="ec_relationship"
                        >
                        <label for="ec_relationship">Relationship</label>
                        @error('ec_relationship')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating mb-3">
                        <input 
                            type="tel" 
                            class="form-control @error('ec_contactnumber') is-invalid @enderror" 
                            id="ec_contactnumber"  
                            maxlength="11"  
                            autocomplete="off" 
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"  
                            placeholder="Contact Number" 
                            wire:model="ec_contactnumber"
                        >
                        <label for="ec_contactnumber">Contact Number</label>
                        @error('ec_contactnumber')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-floating mb-3">
                        <input 
                            type="text" 
                            class="form-control @error('ec_address') is-invalid @enderror" 
                            id="ec_address"  
                            maxlength="30"  
                            autocomplete="off" 
                            oninput="this.value = this.value.toUpperCase()"  
                            placeholder="Home Address" 
                            wire:model="ec_address"
                        >
                        <label for="ec_address">Home Address</label>
                        @error('ec_address')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <li class="hr-text m-2 mb-3">Additional Enrollment Information</li>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <select 
                            class="form-control @error('school_year') is-invalid @enderror" 
                            id="school_year" 
                            wire:model="school_year"
                        >
                        <option value="">-- Select --</option>
                            @for ($year = now()->year; $year >= 1950; $year--)
                                <option value="{{ $year }}-{{ $year + 1 }}">{{ $year }}-{{ $year + 1 }}</option>
                            @endfor
                        </select>
                        <label for="school_year">School Year</label>
                        @error('school_year')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <select 
                            class="form-control @error('transferee') is-invalid @enderror" 
                            id="transferee" 
                            wire:model="transferee">
                            <option value="">-- Select --</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                        <label for="transferee">Transferee</label>
                        @error('transferee')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-floating mb-3">
                        <select 
                            class="form-control @error('enrollment_type') is-invalid @enderror" 
                            id="enrollment_type" 
                            wire:model="enrollment_type">
                            <option value="">-- Select --</option>
                            <option value="Regular">Regular</option>
                            <option value="Irregular">Irregular</option>
                        </select>
                        <label for="enrollment_type">Student Classification</label>
                        @error('enrollment_type')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
            </div>
        </div>
        <div class="modal-footer">
        <div class="w-100">
            <div class="row">
            {{-- <div class="col-6"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                Cancel
                </a></div> --}}
            <div class="col-6"> <button type="submit" class="btn"> Create</button></div>
            </div>
        </div>
        </div>
    </form>
</div>
</div>
</div>

