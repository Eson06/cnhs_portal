<div>
    <div wire:ignore.self class="modal fade" id="createsubject" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">

    <form class="modal-content" method="POST" wire:submit.prevent="SaveSubject">
        <div class="modal-header">
            <h5 class="modal-title">Create Class</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent=""></button>
        </div>
        <div class="modal-body text-center py-4">
    
           <div class="row">

            <div class="form-floating mb-3">
                <select class="form-select @error('school_year') is-invalid @enderror" id="school_year" wire:model="school_year">
                    <option value="">---Select---</option>
                    @for ($start = 2025; $start <= 2100; $start++)
                    
                        <option value="{{ $start }}-{{ $start + 1}}">{{ $start }}-{{ $start + 1}} </option>
                    @endfor
                </select>
                <label for="school_year">School Year</label>
                @error('school_year')
                    <p class="text-danger text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

                
                    <div class="form-floating mb-3">
                        <select class="form-select @error('grade_section') is-invalid @enderror" id="grade_section" wire:model="grade_section">
                            <option value="">---Select---</option>
                            @forelse ($class_monitorings as $index => $class_monitoring)
                                <option value="{{$class_monitoring->class_id}}">{{$class_monitoring->grade}}-{{$class_monitoring->section}}</option>
                                @empty
                                <option value="">No Grade and Section Found</option>
                            @endforelse
                        </select>
                        <label for="grade_section">Grade and Section</label>
                        @error('grade_section')
                            <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                <div class="form-floating mb-3">
                    <input 
                        type="text" 
                        class="form-control @error('class_subject') is-invalid @enderror" 
                        id="class_subject"  
                        maxlength="30"  
                        autocomplete="off" 
                        oninput="this.value = this.value.toUpperCase()"  
                        placeholder="Class Subject" 
                        wire:model="class_subject"
                    >
                    <label for="class_subject">Class Subject</label>
                    @error('class_subject')
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

