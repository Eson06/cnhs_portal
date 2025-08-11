<div>
    <div wire:ignore.self class="modal fade" id="createlogin" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">

    <form class="modal-content" method="POST" wire:submit.prevent="CreateCredential()">
        <div class="modal-header">
            <h5 class="modal-title">Create Announcement</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent="resetUserForm()"></button>
        </div>
        <div class="modal-body text-center py-4">
            {{$selectedid}}
            {{$lrn}}
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

