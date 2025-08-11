<div>
    @section ('pageTitle',isset($pageTitle) ? $pageTitle : 'Request Form')

    <ol class="breadcrumb fs-3" aria-label="breadcrumbs">

        <li class="breadcrumb-item active text-muted" aria-current="page">Request Form</li>
    </ol>

    <a href="#" class="btn btn-primary mb-2 mt-4" data-bs-toggle="modal" data-bs-target="#requestdocument">
        <svg  class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M12 5l0 14"></path>
            <path d="M5 12l14 0"></path>
         </svg>
        Request Document
    </a>

    <div class="container my-4">
   <div class="table-responsive">
    <table class="table table-hover table-bordered align-middle">
        <thead class="table-primary">
            <tr>
                <th scope="col">Date</th>
                 <th scope="col">Status</th>
                <th scope="col">Type of Document</th>
                <th scope="col">Purpose</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($request_documents as $index => $request_document)
                <tr>
                    <td>{{ $request_document->updated_at->format('M d, Y') }}</td>
                    <td><strong>{{ $request_document->status }}</strong></td>
                    <td><strong>{{ $request_document->document }}</strong></td>
                    <td>{{ $request_document->purpose }}</td>

                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted py-4">
                        No Requests Found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>


  @include('livewire.student.modal.document-request')
    @push('scripts')
    <script data-navigate-once>
        document.addEventListener('livewire:navigated', () => {

            Livewire.on('showRequestDocumentModal', (event) => {
                $('#requestdocument').modal('show');
            });

            Livewire.on('closeRequestDocumentModal', (event) => {
                $('#requestdocument').modal('hide');
            });

        });

    </script>
    @endpush
</div>
