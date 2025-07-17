<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\enrollment_status;
use App\Models\student_information;

class Enrollment extends Component
{
    public $hasMore,$limitPerPage,$count,$Search;
    public $birthday, $age, $id, $lrn, $first_name, $middle_name, $last_name, $gender, $address, $contact_number, $email, $ec_fullname, $ec_contactnumber, $ec_address, $ec_relationship, $ip, $transferee, $status, $enrollment_type, $school_year;
    public $year_start, $year_end;

    public function enrollmentList() {
        $this->count = student_information::orderBy('last_name', 'asc')
        ->where('lrn', 'like',  '%'.$this->Search.'%')
        ->where('last_name', 'like', '%' . $this->Search . '%')
        ->where('first_name', 'like', '%' . $this->Search . '%')
        ->where('middle_name', 'like', '%' . $this->Search . '%')
            ->count();
    
        if ($this->count > $this->limitPerPage) {
            if ($this->count > 100) {
                $this->hasMore = true;
            } else {
                $this->limitPerPage = $this->count;
            }
        } else {
            $this->hasMore = false;
            $this->limitPerPage = $this->count;
        }
    }

    #[On('load-more')]
public function loadMore()
{
    if($this->hasMore == true) {
        $this->limitPerPage = $this->limitPerPage + 10;
        $this->enrollmentList();
    }
}

public function updatedSearch() {
    $this->limitPerPage = 10;
    $this->enrollmentList();

}

public function mount() {
    $this->count = 0;
    $this->limitPerPage = 10;
    $this->Search = null;
    $this->enrollmentList();
    
}

    public function NewEnrollee()
    {
        
        $this->validate([
            'birthday' => 'required',
            'lrn' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email',
            'ec_fullname' => 'required',
            'ec_contactnumber' => 'required',
            'ec_address' => 'required',
            'ec_relationship' => 'required',
            'ip' => 'required',
            'transferee' => 'required',
            'school_year' => 'required',
            'enrollment_type' => 'required',
        ], [
            
            'required' => 'This field is required.',
        ]);
       
        $lrnduplicate = student_information::where('lrn', $this->lrn)->first();
        if ($lrnduplicate) {
            $this->showToastr('This LRN is already enrolled.', 'error');
            return;
        }

        $emailduplicate = student_information::where('email', $this->email)->first();
        if ($emailduplicate) {
            $this->showToastr('This Email is already enrolled.', 'error');
            return;
        }
    
        // Save student personal info
        $newstudent = new student_information();
        $newstudent->birthday = $this->birthday;
        $newstudent->lrn = $this->lrn;
        $newstudent->first_name = $this->first_name;
        $newstudent->middle_name = $this->middle_name;
        $newstudent->last_name = $this->last_name;
        $newstudent->gender = $this->gender;
        $newstudent->address = $this->address;
        $newstudent->contact_number = $this->contact_number;
        $newstudent->email = $this->email;
        $newstudent->ec_fullname = $this->ec_fullname;
        $newstudent->ec_contactnumber = $this->ec_contactnumber;
        $newstudent->ec_address = $this->ec_address;
        $newstudent->ec_relationship = $this->ec_relationship;
        $studentSaved = $newstudent->save();
    
        // Save enrollment info
        $newenrollment = new enrollment_status();
        $newenrollment->lrn = $this->lrn;
        $newenrollment->ip = $this->ip;
        $newenrollment->transferee = $this->transferee;
        $newenrollment->status = "Enrolled";
        $newenrollment->enrollment_type = $this->enrollment_type;
        $newenrollment->school_year = $this->school_year;
        $enrollmentSaved = $newenrollment->save();
    
        if ($studentSaved && $enrollmentSaved) {
            $this->showToastr('Student Enrolled Successfully', 'success');
            $this->resetUserForm();
            $this->enrollmentList();
        } else {
            $this->showToastr('Something went wrong. Please contact the system administrator.', 'error');
        }
    }
    

public function resetUserForm()
{
    $this->birthday = '';
    $this->lrn = '';
    $this->first_name = '';
    $this->middle_name = '';
    $this->last_name = '';
    $this->gender = '';
    $this->address = '';
    $this->contact_number = '';
    $this->email = '';
    $this->ec_fullname = '';
    $this->ec_contactnumber = '';
    $this->ec_address = '';
    $this->ec_relationship = '';
    $this->ip = '';
    $this->transferee = '';
    $this->status = '';
    $this->school_year = '';
    $this->enrollment_type = '';
}


    public function updatedBirthday($value)
    {
        if ($value) {
            $this->age = Carbon::parse($value)->age;
        } else {
            $this->age = null;
        }
    }
    
    
    public function CreateEnrollment() {
        $this->dispatch('showCreateEnrollmentModal');
    }
    public function showToastr($message, $type) {
        return $this->dispatch('showToastr',   message: $message, type: $type);
    }



    public function render()
    {
        $student_informations = student_information::orderBy('last_name', 'asc')
        ->where('lrn', 'like',  '%'.$this->Search.'%')
        ->where('last_name', 'like', '%' . $this->Search . '%')
        ->where('first_name', 'like', '%' . $this->Search . '%')
        ->where('middle_name', 'like', '%' . $this->Search . '%')

        ->take($this->limitPerPage)
        ->get();

    return view('livewire.admin.enrollment', [
        'student_informations' => $student_informations,
    ]);
    }
}
