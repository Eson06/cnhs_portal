<div>
    @section ('pageTitle',isset($pageTitle) ? $pageTitle : 'Form Request')

    <ol class="breadcrumb fs-3" aria-label="breadcrumbs">

        <li class="breadcrumb-item active text-muted" aria-current="page">Admin Panel</a></li>
        <li class="breadcrumb-item active text-muted" aria-current="page">Form Request</a></li>
    </ol>

<div class="container my-4">
   <div class="table-responsive">
    <table class="table table-hover table-bordered align-middle">
        <thead class="table-primary">
            <tr>
                <th scope="col">Date</th>
                 <th scope="col">Status</th>
                <th scope="col">Type of Document</th>
                <th scope="col">Purpose</th>
                <th scope="col">Requested By</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($request_documents as $index => $request_document)
                <tr>
                    <td>{{ $request_document->updated_at->format('M d, Y') }}</td>
                    <td><strong>{{ $request_document->status }}</strong></td>
                    <td><strong>{{ $request_document->document }}</strong></td>
                    <td>{{ $request_document->purpose }}</td>
                    <td>
                        {{ $request_document->Requested->first_name }}
                        {{ $request_document->Requested->middle_name }}
                        {{ $request_document->Requested->last_name }}
                    </td>
                    <td>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Approved</a></li>
                            <li><a class="dropdown-item" href="#">Decline</a></li>
                        </ul>
                    </div>
                </td>

                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">
                        No Requests Found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>

</div>
