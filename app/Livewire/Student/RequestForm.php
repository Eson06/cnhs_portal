<?php

namespace App\Livewire\Student;

use App\Models\request_document;
use Livewire\Component;

class RequestForm extends Component
{

     public $document, $purpose;
     
    public function RequestDocument() {
        $this->dispatch('showRequestDocumentModal');
    }

      public function RequestDoc() {
      
    
            $this->validate([
                'document' => 'required',
                'purpose' => 'required',
            ], [
                'required' => 'This field is required.',
            ]);

            $User = new request_document();
            $User['document'] = $this->document;
            $User['purpose'] = $this->purpose;
            $User['lrn'] = auth('web')->User()->lrn ;
            $User['status'] = "Waiting For Approval";
            $success = $User->save();

            if ($success)
            {

                $this->showToastr('Document Requested Successfully','success');

            }
            else
            {
                $this->showToastr('Something went wrong. Please contact System Administrator','error');
            }
    }

   public function showToastr($message, $type) {
        return $this->dispatch('showToastr',   message: $message, type: $type);
    }

    public function render()
{
$request_documents = request_document::where('lrn', auth()->user()->lrn)
    ->orderByRaw("
        status = 'waiting for approval' DESC, 
        updated_at DESC
    ")
    ->get();


    return view('livewire.student.request-form', [
        'request_documents' => $request_documents,
    ]);
}
}
