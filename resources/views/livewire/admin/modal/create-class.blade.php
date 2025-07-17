<div>
    <div wire:ignore.self class="modal fade" id="createclass" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">

    <form class="modal-content" method="POST" wire:submit.prevent="addGradeSection()">
        <div class="modal-header">
            <h5 class="modal-title">Create Class</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent="resetUserForm()"></button>
        </div>
        <div class="modal-body text-center py-4">
    
           <div class="row">
                <div class="form-floating mb-3">
                    <select class="form-select @error('grade') is-invalid @enderror" id="grade" wire:model="grade">
                        <option value="">Select Grade</option>
                        @for ($i = 7; $i <= 12; $i++)
                            <option value="GRADE {{ $i }}">GRADE {{ $i }}</option>
                        @endfor
                    </select>
                    <label for="grade">School Grade</label>
                    @error('grade')
                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input 
                        type="text" 
                        class="form-control @error('section') is-invalid @enderror" 
                        id="section"  
                        maxlength="30"  
                        autocomplete="off" 
                        oninput="this.value = this.value.toUpperCase()"  
                        placeholder="Class Section" 
                        wire:model="section"
                    >
                    <label for="section">Class Section</label>
                    @error('section')
                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                    @enderror
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

