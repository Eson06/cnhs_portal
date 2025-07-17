<div>
    <div wire:ignore.self class="modal fade" id="createannouncement" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">

    <form class="modal-content" method="POST" wire:submit.prevent="NewAnnouncement()">
        <div class="modal-header">
            <h5 class="modal-title">Create Announcement</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent="resetUserForm()"></button>
        </div>
        <div class="modal-body text-center py-4">
    
           <div class="row">
            <div class="form-floating mb-3">
                <input 
                    type="date" 
                    class="form-control @error('announcement_date') is-invalid @enderror" 
                    id="announcement_date"  
                    maxlength="30"  
                    autocomplete="off" 
                    oninput="this.value = this.value.toUpperCase()"  
                    placeholder="Announcement Date" 
                    wire:model="announcement_date"
                >
                <label for="announcement_date">Announcement Date</label>
                @error('announcement_date')
                    <p class="text-danger text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

                <div class="form-floating mb-3">
                    <input 
                        type="text" 
                        class="form-control @error('announcement_title') is-invalid @enderror" 
                        id="announcement_title"  
                        maxlength="30"  
                        autocomplete="off" 
                        oninput="this.value = this.value.toUpperCase()"  
                        placeholder="Announcement Title" 
                        wire:model="announcement_title"
                    >
                    <label for="announcement_title">Announcement Title</label>
                    @error('announcement_title')
                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <textarea 
                        class="form-control @error('announcement_content') is-invalid @enderror" 
                        id="announcement_content" 
                        style="height: 100px;" 
                        autocomplete="off" 
                        oninput="this.value = this.value.toUpperCase()" 
                        placeholder="Announcement Content" 
                        wire:model="announcement_content"
                    ></textarea>
                    <label for="announcement_content">Announcement Content</label>
                    @error('announcement_content')
                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                @include('livewire.other.fileupload')
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

