<div>
    @section ('pageTitle',isset($pageTitle) ? $pageTitle : 'Announcement Form')

    <ol class="breadcrumb fs-3" aria-label="breadcrumbs">

        <li class="breadcrumb-item active text-muted" aria-current="page">Admin Panel</a></li>
        <li class="breadcrumb-item active text-muted" aria-current="page">Announcement Form</a></li>
    </ol>
    <a href="#" class="btn btn-primary mb-2 mt-4" data-bs-toggle="modal" data-bs-target="#createannouncement">
        <svg  class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M12 5l0 14"></path>
            <path d="M5 12l14 0"></path>
         </svg>
        Create Announcement
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
    
    <div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Title</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($announcements as $index => $announcement)
                <tr wire:key="{{ $announcement->id }}">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $announcement->announcement_date }}</td>
                    <td><strong>{{ $announcement->announcement_title }}</strong></td>
                    <td>{{ $announcement->announcement_content }}</td>
                    <td><button>Save</button></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        No Announcement found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if($hasMore)
        <div class="text-center my-2">
            <a href="#" class="btn btn-primary" wire:click.prevent="loadMore()">Load More Data</a>
        </div>
    @endif
</div>

    @include('livewire.admin.modal.create-announcement')
    @push('scripts')
    <script data-navigate-once>
        document.addEventListener('livewire:navigated', () => {

            Livewire.on('showCreateAnnouncementModal', (event) => {
                $('#createannouncement').modal('show');
            });

            Livewire.on('closeCreateAnnouncementModal', (event) => {
                $('#createannouncement').modal('hide');
            });

        });

    </script>
    @endpush
</div>
