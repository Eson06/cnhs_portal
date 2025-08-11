<div>
    <div wire:ignore.self class="modal fade" id="requestdocument" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">

    <form class="modal-content" method="POST" wire:submit.prevent="RequestDoc()">
        <div class="modal-header">
            <h5 class="modal-title">Request Document</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent=""></button>
        </div>
        <div class="modal-body text-center py-4">
    
 <div class="row">
                <div class="form-floating mb-3">
                    <select class="form-select @error('document') is-invalid @enderror" id="document" wire:model="document">
                        <option value="">Select </option>
                       <option value="1">FORM 1</option>
                       <option value="2">FORM 2</option>
                       <option value="3">FORM 3</option>
                    </select>
                    <label for="document">Type of Document </label>
                    @error('document')
                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input 
                        type="text" 
                        class="form-control @error('purpose') is-invalid @enderror" 
                        id="purpose"  
                        maxlength="30"  
                        autocomplete="off" 
                        oninput="this.value = this.value.toUpperCase()"  
                        placeholder="Purpose" 
                        wire:model="purpose"
                    >
                    <label for="purpose">Purpose</label>
                    @error('purpose')
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

