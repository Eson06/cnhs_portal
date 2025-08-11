<?php

namespace App\Livewire\Admin;

use App\Models\request_document;
use Livewire\Component;

class FormRequest extends Component
{

  

       public function showToastr($message, $type) {
        return $this->dispatch('showToastr',   message: $message, type: $type);
    }

    public function render()
{
  $request_documents = request_document::orderByRaw("
        status = 'Waiting For Approval' DESC, 
        updated_at DESC
    ")->get();


    return view('livewire.admin.form-request', [
        'request_documents' => $request_documents,
    ]);
}
}
