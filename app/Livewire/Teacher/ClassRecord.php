<?php

namespace App\Livewire\Teacher;

use App\Models\enrollment_status;
use App\Models\subject;
use Livewire\Component;

class ClassRecord extends Component
{
    public $id, $subject_id;
    public $grade_section, $class_subject, $school_year, $teacher_id;


       public function CreateSubject() {
        $this->dispatch('showCreateSubjectModal');
    }

    public function showToastr($message, $type) {
    return $this->dispatch('showToastr',   message: $message, type: $type);
    } 

      public function mount($id)
    {
        $MySubject = subject::findorfail($id);
        $this->subject_id = $MySubject->id;
      $this->grade_section = $MySubject->room_assign->grade . ' ' . $MySubject->room_assign->section;
        $this->class_subject = $MySubject->class_subject;
        $this->school_year = $MySubject->school_year;
        $this->teacher_id = $MySubject->teacher_id;
    }

     public function render()
    {
        $enrollment_statuses = enrollment_status::orderBy('lrn', 'asc')->get();
        return view('livewire.teacher.class-record', [
            'enrollment_statuses' => $enrollment_statuses,
        ]);
    }
}
