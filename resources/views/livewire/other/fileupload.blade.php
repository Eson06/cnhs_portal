<div>
    <div class="mb-3">
        <label for="images" class="form-label">Upload Images Attachment</label>
        <input 
            type="file" 
            class="form-control @error('images.*') is-invalid @enderror" 
            id="images" 
            wire:model="images" 
            multiple 
            accept="image/*"
        >
        @error('images.*') 
            <p class="text-danger text-xs mt-1">{{ $message }}</p> 
        @enderror
    </div>
    
    @if ($images)
        <div class="row mt-3">
            @foreach ($images as $image)
                <div class="col-4 col-md-3 mb-3 d-flex justify-content-center">
                    <div class="border rounded shadow-sm p-1" style="width: 120px; height: 120px; overflow: hidden;">
                        <img src="{{ $image->temporaryUrl() }}" class="img-fluid rounded h-100 w-100 object-fit-cover" alt="Preview" style="object-fit: cover;">
                    </div>
                </div>
            @endforeach
        </div>
    @endif    
    
</div>