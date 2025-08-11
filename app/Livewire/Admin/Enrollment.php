<?php

namespace App\Livewire\Admin;

use App\Models\activity_log;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\enrollment_status;
use App\Models\student_information;
use App\Models\User;
use App\Models\user_role;
use Illuminate\Support\Facades\Hash;

class Enrollment extends Component
{
    public $hasMore,$limitPerPage,$count,$Search;
    public $birthday, $age, $id, $lrn, $first_name, $middle_name, $last_name, $gender, $address, $contact_number, $email, $ec_fullname, $ec_contactnumber, $ec_address, $ec_relationship, $ip, $transferee, $status, $enrollment_type, $school_year;
    public $year_start, $year_end;
    public $selectedid;

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
        $newstudent->ip = $this->ip;
        $studentSaved = $newstudent->save();
    
        $newenrollment = new enrollment_status();
        $newenrollment->lrn = $this->lrn;
        $newenrollment->transferee = $this->transferee;
        $newenrollment->status = "Enrolled";
        $newenrollment->enrollment_type = $this->enrollment_type;
        $newenrollment->school_year = $this->school_year;
        $enrollmentSaved = $newenrollment->save();

        $newlog = new activity_log();
        $newlog->lrn = auth('web')->user()->lrn;
        $newlog->activity = "Enrolled Student - ";
        $newlog = $newlog->save();
    
        if ($studentSaved && $enrollmentSaved) {
            $this->showToastr('Student Enrolled Successfully', 'success');
            $this->resetUserForm();
            $this->enrollmentList();
        } else {
            $this->showToastr('Something went wrong. Please contact the system administrator.', 'error');
        }
    }
    
    public function reenroll()
    {
        
        $this->validate([
            'transferee' => 'required',
            'school_year' => 'required',
            'enrollment_type' => 'required',
        ], [
            
            'required' => 'This field is required.',
        ]);
       
        $syduplicate = enrollment_status::where('lrn', $this->lrn)
        ->where('school_year', $this->school_year)
        ->first();

    if ($syduplicate) {
        $this->showToastr('This student is already enrolled for this school year.', 'error');
        return;
    }
    
        $newenrollment = new enrollment_status();
        $newenrollment->lrn = $this->lrn;
        $newenrollment->transferee = $this->transferee;
        $newenrollment->status = "Enrolled";
        $newenrollment->enrollment_type = $this->enrollment_type;
        $newenrollment->school_year = $this->school_year;
        $enrollmentSaved = $newenrollment->save();
    
        if ($enrollmentSaved) {
            $this->showToastr('Student Enrolled Successfully', 'success');
            $this->resetUserForm();
             $this->dispatch('closeEnrollStudentModal');
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

 public function CreateCredential()
{
      $existingUser = User::where('lrn', $this->lrn)->orWhere('user_name', $this->lrn)->first();

    if ($existingUser) {
        $this->showToastr('User with this LRN already has Login Credential!', 'warning');
        return;
    }

    $User = new User();
    $User['user_name'] = $this->lrn;
    $User['lrn'] = $this->lrn;
    $User['password'] = Hash::make($this->lrn);
    $User['name'] = trim($this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name);
    $User['is_enable'] = true;

    $success = $User->save();

    if ($success) {
        $userId = $User->id;

        $UserRole = new user_role();
        $UserRole['user_id'] = $userId;
        $UserRole['role_id'] = 4;
        $UserRole['created_at'] = now();
        $UserRole['updated_at'] = now();
        $UserRole->save();

        $this->showToastr('User created Successfully','success');
    } else {
        $this->showToastr('Something went wrong. Please contact System Administrator','error');
    }
}


    
    
    public function CreateEnrollment() {
        $this->dispatch('showCreateEnrollmentModal');
    }

    public function NewEnrollment($id) {
           $Student = student_information::findorfail($id);
        $this->selectedid = $Student->id;
         $this->lrn = $Student->lrn;
        $this->dispatch('showEnrollStudentModal');
    }



    public function StudentCredential($id) {
          $Student = student_information::findorfail($id);
        $this->selectedid = $Student->id;
         $this->lrn = $Student->lrn;
        $this->dispatch('showCreateLoginModal');
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
