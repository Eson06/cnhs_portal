<div>
        @section ('pageTitle',isset($pageTitle) ? $pageTitle : 'Class Record')

    <ol class="breadcrumb fs-3" aria-label="breadcrumbs">
        <li class="breadcrumb-item active text-muted" aria-current="page">Class Record</a></li>
    </ol>
    <a href="#" class="btn btn-primary mb-2 mt-4" data-bs-toggle="modal" data-bs-target="#addstudent">
        <svg  class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M12 5l0 14"></path>
            <path d="M5 12l14 0"></path>
         </svg>
        Create Class Record
    </a>

        {{$subject_id}}
        {{$grade_section}}
        {{$class_subject}}
        {{$school_year}}
        {{$teacher_id}}


         @include('livewire.teacher.modal.add-student')
    @push('scripts')
    <script data-navigate-once>
        document.addEventListener('livewire:navigated', () => {

            Livewire.on('showAddStudentModal', (event) => {
                $('#addstudent').modal('show');
            });

            Livewire.on('closeAddStudentModal', (event) => {
                $('#addstudent').modal('hide');
            });

        });

    </script>
    @endpush
</div>
