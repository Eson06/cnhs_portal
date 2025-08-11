<div>
    @section ('pageTitle',isset($pageTitle) ? $pageTitle : 'Enrollment')

<ol class="breadcrumb fs-3" aria-label="breadcrumbs">
    <li class="breadcrumb-item active text-muted" aria-current="page">Enrollment</a></li>
</ol>
<a href="#" class="btn btn-primary mb-2 mt-4" data-bs-toggle="modal" data-bs-target="#createenrollment">
    <svg  class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M12 5l0 14"></path>
        <path d="M5 12l14 0"></path>
     </svg>
    New Enrollment
</a>


<div class="hr-text">Student List</div>

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



<div class="row">
@forelse ($student_informations as $index => $student_information)
<div class="col-12 col-md-12 col-sm-12 my-2" wire:key="{{ $student_information->lrn }}">

    <div class="card  @if($index % 2 == 0) bg-gray-500 @endif">
        <div class="card-header">
          <div>
            <div class="row align-items-center">
              <div class="col-auto">
                <!-- <span class="avatar avatar-lg rounded-circle" style="background-image: url({{asset('images/cnhs_logo.png')}})"></span> -->
              </div>
              <div class="col">
                <div class="card-title">
                    <svg class="icon icon-tabler icon-tabler-id mx-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <rect x="3" y="4" width="18" height="16" rx="3"></rect>
                    <circle cx="9" cy="10" r="2"></circle>
                    <line x1="15" y1="8" x2="17" y2="8"></line>
                    <line x1="15" y1="12" x2="17" y2="12"></line>
                    </svg>
                    {{ $student_information->lrn }}
                     @if ($student_information->logincredential)
                                        @if ($student_information->logincredential->is_enable === 1)
                                             <span class="badge badge-sm bg-success p-1 ">Active</span>
                                        @elseif ($student_information->logincredential->is_enable === 0)
                                             <span class="badge badge-sm bg-danger p-1 ">Inactive</span>
                                        @else
                                             <span class="badge badge-sm bg-seconday p-1 ">No Login Credential</span>
                                        @endif
                                    @else
                                         <span class="badge badge-sm bg-seconday p-1 ">No Login Credential</span>
                                    @endif
                </div>

               
                <div class="card-description">
                    <svg  class="icon icon-tabler icon-tabler-user mx-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                     </svg>
                     {{ $student_information->last_name }}, {{ $student_information->first_name }} {{ $student_information->middle_name }}   
                </div>

                   <div class="card-description">
                    <svg class="icon icon-tabler icon-tabler-calendar mx-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                        <line x1="16" y1="3" x2="16" y2="7"></line>
                        <line x1="8" y1="3" x2="8" y2="7"></line>
                        <line x1="4" y1="11" x2="20" y2="11"></line>
                        </svg>
                             <span class="badge badge-sm bg-info m-1 ">{{ $student_information->enrolled->school_year }}</span>
                        </div>
              </div>
            </div>
          </div>

        <div class="card-actions">
            <a href="#" class="btn-action" data-bs-toggle="dropdown">
                <svg  class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path></svg>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                <a class="dropdown-item" wire:click.prevent="NewEnrollment({{$student_information->id}})">
                    <svg class="icon icon-tabler icon-tabler-eye mx-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="2" />
                    <path d="M22 12c0 5.523 -4.477 10 -10 10s-10 -4.477 -10 -10s4.477 -10 10 -10s10 4.477 10 10z" />
                    </svg>
                    Enrollment
                </a>

                <a class="dropdown-item" href="#" wire:click.prevent="StudentCredential({{$student_information->id}})">
                    <svg  class="icon icon-tabler icon-tabler-user-cog mx-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h2.5"></path>
                        <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                        <path d="M19.001 15.5v1.5"></path>
                        <path d="M19.001 21v1.5"></path>
                        <path d="M22.032 17.25l-1.299 .75"></path>
                        <path d="M17.27 20l-1.3 .75"></path>
                        <path d="M15.97 17.25l1.3 .75"></path>
                        <path d="M20.733 20l1.3 .75"></path>
                     </svg>
                    Create Login Credential
                </a>


                
              </div>
          </div>

        </div>
    </div>
</div>


@empty

<div class="fs-4 text-muted text-center" role="alert">
    <div class="m-1">
        <svg  class="icon icon-tabler icon-tabler-alert-triangle text-danger" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M12 9v4"></path>
            <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path>
            <path d="M12 16h.01"></path>
         </svg>
    </div>
    <div class="m-1">
        I'm so sorry. No result found
    </div>
</div>

@endforelse

@if($hasMore == true)
    <div class="text-center m-2">
        <a href="#" class="btn btn-blue" wire:click.prevent="loadMore()">Load More Data<a>
    </div>

@endif

</div>

@include('livewire.admin.modal.create-enrollment')
@include('livewire.admin.modal.enroll-student')
@include('livewire.admin.modal.create-login')
@push('scripts')
<script data-navigate-once>
    document.addEventListener('livewire:navigated', () => {

        Livewire.on('showCreateEnrollmentModal', (event) => {
            $('#createenrollment').modal('show');
        });

        Livewire.on('closeCreateEnrollmentModal', (event) => {
            $('#createenrollment').modal('hide');
        });

    Livewire.on('showEnrollStudentModal', (event) => {
            $('#enrollstudent').modal('show');
        });

        Livewire.on('closeEnrollStudentModal', (event) => {
            $('#enrollstudent').modal('hide');
        });

            Livewire.on('showCreateLoginModal', (event) => {
            $('#createlogin').modal('show');
        });

        Livewire.on('closeCreateLoginModal', (event) => {
            $('#createlogin').modal('hide');
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const birthdayInput = document.getElementById('birthday');
        const ageInput = document.getElementById('age');

        birthdayInput.addEventListener('change', function () {
            const birthday = new Date(this.value);
            const today = new Date();

            if (!isNaN(birthday)) {
                let age = today.getFullYear() - birthday.getFullYear();
                const m = today.getMonth() - birthday.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthday.getDate())) {
                    age--;
                }
                ageInput.value = age;

                // If using Livewire: also update wire:model with Livewire.set
                if (window.Livewire) {
                    Livewire.find('{{ $this->id }}').set('age', age);
                }
            } else {
                ageInput.value = '';
            }
        });
    });
</script>

@endpush
</div>
