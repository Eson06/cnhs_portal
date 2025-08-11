<div>
    <div wire:ignore.self class="modal fade" id="addstudent" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">

    <form class="modal-content" method="POST" wire:submit.prevent="Add">
        <div class="modal-header">
            <h5 class="modal-title">Create Class</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent=""></button>
        </div>
        <div class="modal-body text-center py-4">
@forelse ($enrollment_statuses as $index => $enrollment_status)
    <span>
        {{ $enrollment_status->Student_info->last_name }},
        {{ $enrollment_status->Student_info->first_name }}
        {{ $enrollment_status->Student_info->middle_name }}
    </span>
@empty
    <p>No record found.</p>
@endforelse


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

