<div>
    <div wire:ignore.self class="modal fade" id="createsubject" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">

    <form class="modal-content" method="POST" wire:submit.prevent="">
        <div class="modal-header">
            <h5 class="modal-title">Create Class</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent="resetUserForm()"></button>
        </div>
        <div class="modal-body text-center py-4">
    
           <div class="row">

            <div class="form-floating mb-3">
                <select class="form-select @error('grade') is-invalid @enderror" id="grade" wire:model="grade">
                    <option value="">---Select---</option>
                    @for ($start = 2025; $start <= 2100; $start++)
                    
                        <option value="{{ $start }}-{{ $start + 1}}">{{ $start }}-{{ $start + 1}} </option>
                    @endfor
                </select>
                <label for="grade">School Year</label>
                @error('grade')
                    <p class="text-danger text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

                
                    <div class="form-floating mb-3">
                        <select class="form-select @error('grade') is-invalid @enderror" id="grade" wire:model="grade">
                            <option value="">---Select---</option>
                            @forelse ($class_monitorings as $index => $class_monitoring)
                                <option value="{{$class_monitoring->class_id}}">{{$class_monitoring->grade}}-{{$class_monitoring->section}}</option>
                                @empty
                                <option value="">No Grade and Section Found</option>
                            @endforelse
                        </select>
                        <label for="grade">Grade and Section</label>
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

