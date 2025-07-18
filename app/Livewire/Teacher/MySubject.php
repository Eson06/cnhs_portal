<?php

namespace App\Livewire\Teacher;

use App\Models\class_monitoring;
use App\Models\subject;
use Livewire\Component;

class MySubject extends Component
{
    public $grade_section,$class_subject,$school_year;

    public function CreateSubject() {
        $this->dispatch('showCreateSubjectModal');
    }


    public function SaveSubject()
    {
        $this->validate([
            'grade_section' => 'required',
            'class_subject' => 'required',
            'school_year' => 'required',
        ], [
            'required' => 'This field is required.',
        ]);
    
        $teacherId = auth('web')->user()->id;
    
        // Check for duplicate record
        $existing = subject::where('grade_section', $this->grade_section)
            ->where('class_subject', $this->class_subject)
            ->where('school_year', $this->school_year)
            ->where('teacher_id', $teacherId)
            ->first();
    
        if ($existing) {
            $this->showToastr('Class Record already exists.', 'warning');
            return;
        }
    
        // If not exists, create new
        $newsubject = new subject();
        $newsubject['grade_section'] = $this->grade_section;
        $newsubject['class_subject'] = $this->class_subject;
        $newsubject['school_year'] = $this->school_year;
        $newsubject['teacher_id'] = $teacherId;
    
        $success = $newsubject->save();
    
        if ($success) {
            $this->resetsubjectForm();
            $this->showToastr('Class Subject created successfully.', 'success');
        } else {
            $this->showToastr('Something went wrong. Please contact the system administrator.', 'error');
        }
    }
    

public function resetsubjectForm() {
    $this->grade_section = null;
    $this->class_subject = null;
    $this->school_year = null;
    $this->resetErrorBag();
}

public function showToastr($message, $type) {
    return $this->dispatch('showToastr',   message: $message, type: $type);
}

    public function render()
    {
        $class_monitorings = class_monitoring::orderBy('grade', 'asc')->get();
        $subjects = subject::orderBy('grade_section', 'asc')->get()->groupBy('school_year');
    
        return view('livewire.teacher.my-subject', [
            'class_monitorings' => $class_monitorings,
            'subjects' => $subjects,
        ]);
    }
}
