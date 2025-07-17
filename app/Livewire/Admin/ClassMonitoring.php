<?php

namespace App\Livewire\Admin;

use App\Models\class_monitoring;
use Livewire\Attributes\On;
use Livewire\Component;

class ClassMonitoring extends Component
{

public $hasMore,$limitPerPage,$count,$Search;
public $grade,$class_id,$section;
public $section_grades;

#[On('reset-activitylog-list')]

public function classmonitoringList() {
    $this->count = class_monitoring::orderBy('grade', 'asc')
        ->where('grade', 'like', '%' . $this->Search . '%')
        ->where('section', 'like', '%' . $this->Search . '%')
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
        $this->classmonitoringList();
    }
}

public function updatedSearch() {
    $this->limitPerPage = 10;
    $this->classmonitoringList();

}

public function mount() {
    $this->count = 0;
    $this->limitPerPage = 10;
    $this->Search = null;
    $this->classmonitoringList();
    
}

public function addGradeSection()
{
    $this->validate([
        'grade' => 'required',
        'section' => 'required',
    ], [
        'required' => 'This field is required.',
    ]);

    // Check if section already exists (regardless of grade)
    $duplicate = class_monitoring::where('section', $this->section)->first();

    if ($duplicate) {
        $this->showToastr('This section already exists.', 'error');
        return;
    }

    $gradesec = new class_monitoring();
    $gradesec['grade'] = $this->grade;
    $gradesec['section'] = $this->section;
    $gradesec['class_id'] = now()->format('YmdHis');

    $success = $gradesec->save();

    if ($success) {
        $this->classmonitoringList();
        $this->showToastr('Grade and Section created Successfully', 'success');
        $this->resetUserForm();
    } else {
        $this->showToastr('Something went wrong. Please contact System Administrator', 'error');
    }
}


public function resetUserForm() {
    $this->grade = null;
    $this->section = null;
    $this->class_id = null;
    $this->resetErrorBag();
}

    public function CreateClass() {
        $this->dispatch('showCreateClassModal');
    }
    
    public function showToastr($message, $type) {
        return $this->dispatch('showToastr',   message: $message, type: $type);
    }

    public function render()
    {
        $class_monitorings = class_monitoring::orderBy('grade', 'asc')
        ->where('grade', 'like',  '%'.$this->Search.'%')
        ->where('section', 'like', '%' . $this->Search . '%')
        ->take($this->limitPerPage)
        ->get();

    return view('livewire.admin.class-monitoring', [
        'class_monitorings' => $class_monitorings,
    ]);
    }
    
}
