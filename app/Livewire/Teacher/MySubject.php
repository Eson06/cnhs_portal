<?php

namespace App\Livewire\Teacher;

use App\Models\class_monitoring;
use Livewire\Component;

class MySubject extends Component
{

    public function CreateSubject() {
        $this->dispatch('showCreateSubjectModal');
    }

    public function render()
    {
        $class_monitorings = class_monitoring::orderBy('grade', 'asc')
        ->get();

    return view('livewire.teacher.my-subject', [
        'class_monitorings' => $class_monitorings,
    ]);
    }
}
