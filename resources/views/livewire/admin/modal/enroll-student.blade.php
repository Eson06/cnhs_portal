<div>
    <div wire:ignore.self class="modal fade" id="enrollstudent" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

    <form class="modal-content" method="POST" wire:submit.prevent="reenroll()">
        <div class="modal-header">
            <h5 class="modal-title">Create New Enrollment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent="resetUserForm()"></button>
        </div>
        <div class="modal-body text-center py-4">
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
            <div class="col-6"> <button type="submit" class="btn"> Enroll</button></div>
            </div>
        </div>
        </div>
    </form>
</div>
</div>
</div>

