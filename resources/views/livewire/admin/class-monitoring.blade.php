<div>
    @section ('pageTitle',isset($pageTitle) ? $pageTitle : 'Class Monitoring')

    <ol class="breadcrumb fs-3" aria-label="breadcrumbs">

        <li class="breadcrumb-item active text-muted" aria-current="page">Admin Panel</a></li>
        <li class="breadcrumb-item active text-muted" aria-current="page">Class Monitoring</a></li>
    </ol>
    <a href="#" class="btn btn-primary mb-2 mt-4" data-bs-toggle="modal" data-bs-target="#createclass">
        <svg  class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M12 5l0 14"></path>
            <path d="M5 12l14 0"></path>
         </svg>
        Create Class
    </a>

    <div class="row mt-2">
        <div class="col-12 col-md-12 col-sm-12">
    
            <div class="input-icon mb-3 ms-auto">
                <input type="text" value="" class="form-control" placeholder="Search" wire:model.live.debounce.500ms="Search">
                <span class="input-icon-addon">
                    <div class="spinner-border spinner-border-sm text-secondary" role="status" wire:loading wire:target="Search"></div>
                    <svg wire:loading.attr="hidden" wire:target="Search"  class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                    <path d="M21 21l-6 -6"></path>
                    </svg>
                </span>
            </div>
    
            @if($count != 0)
            <div class="text-md-left text-muted text-center my-4">
                Showing
                <strong>{{ $limitPerPage }}</strong>
                    of
                <strong>{{ $count }}</strong>
                {{ Str::plural('Entry',$count)}}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        @forelse ($class_monitorings as $class_monitoring)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">

                <div class="card shadow-sm h-100 d-flex flex-column">
                    <div class="card-header text-center bg-primary text-white py-2 d-flex align-items-center justify-content-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <circle cx="9" cy="7" r="4" />
                            <path d="M17 11v-1a4 4 0 1 0 -4 -4" />
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            <path d="M16 19h6" />
                        </svg>
                        <strong>{{ $class_monitoring->section }}</strong>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-center text-center flex-grow-1">
                        <h6 class="card-title mb-0">{{ $class_monitoring->grade }}</h6>
                    </div>
                    <div class="card-footer text-center bg-light">

<div class="d-flex justify-content-center gap-3">
    <!-- View Icon -->
    <a href="#" class="text-primary" title="View">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24"
             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
             stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <circle cx="12" cy="12" r="2" />
            <path d="M22 12c0 5.523 -4.477 10 -10 10s-10 -4.477 -10 -10s4.477 -10 10 -10s10 4.477 10 10z" />
        </svg>
    </a>

    <!-- Edit Icon -->
    <a href="#" class="text-warning" title="Edit">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24"
             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
             stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M14 3l7 7l-11 11h-7v-7z" />
            <path d="M3 17l4 4" />
        </svg>
    </a>
</div>


                    </div>
                </div>                
                
            </div>
        @empty
            <div class="col-12 text-center text-muted">
                No Grade and Section found.
            </div>
        @endforelse
    </div>
    
    @if($hasMore)
        <div class="text-center my-3">
            <a href="#" class="btn btn-primary" wire:click.prevent="loadMore()">Load More Data</a>
        </div>
    @endif

    
    @include('livewire.admin.modal.create-class')
    @push('scripts')
    <script data-navigate-once>
        document.addEventListener('livewire:navigated', () => {

            Livewire.on('showCreateClassModal', (event) => {
                $('#createclass').modal('show');
            });

            Livewire.on('closeCreateClassModal', (event) => {
                $('#createclass').modal('hide');
            });

        });

    </script>
    @endpush
</div>