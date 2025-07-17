<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\On;
use App\Models\announcement;
use App\Models\image_attachment;
use Livewire\Component;
use Livewire\WithFileUploads;

class AnnouncementForm extends Component
{
    public $images = [];
    public $hasMore,$limitPerPage,$count,$Search;
    public $announcement_date,$announcement_id,$announcement_title,$announcement_content;
    use WithFileUploads;

    #[On('reset-announcement-list')]

public function announcementList() {
    $this->count = announcement::orderBy('announcement_date', 'desc')
    ->where('announcement_date', 'like',  '%'.$this->Search.'%')
    ->orwhere('announcement_title', 'like',  '%'.$this->Search.'%')
    ->orwhere('announcement_content', 'like',  '%'.$this->Search.'%')
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
        $this->announcementList();
    }
}

public function updatedSearch() {
    $this->limitPerPage = 10;
    $this->announcementList();

}

public function mount() {
    $this->count = 0;
    $this->limitPerPage = 10;
    $this->Search = null;
    $this->announcementList();
    
}


    public function NewAnnouncement()
{
    $this->validate([
        'announcement_date' => 'required',
        'announcement_title' => 'required',
        'announcement_content' => 'required',
        'images.*' => 'nullable|image|max:8048', // Optional image validation
    ], [
        'required' => 'This field is required.',
    ]);

    // Generate a unique timestamp ID to use for both announcement_id and unique_id
    $uniqueId = now()->format('YmdHis');

    $newannouncement = new announcement();
    $newannouncement['announcement_date'] = $this->announcement_date;
    $newannouncement['announcement_title'] = $this->announcement_title;
    $newannouncement['announcement_content'] = $this->announcement_content;
    $newannouncement['announcement_id'] = $uniqueId;

    $success = $newannouncement->save();

    if ($success) {
        // Only save images if uploaded
        if ($this->images && is_array($this->images)) {
            foreach ($this->images as $image) {
                $fileName = $image->store('attachments', 'public');

                image_attachment::create([
                    'unique_id' => $uniqueId,
                    'file' => $fileName,
                ]);
            }
        }
        $this->announcementList();
        $this->showToastr('Announcement created successfully.', 'success');
        $this->reset(['announcement_date', 'announcement_title', 'announcement_content', 'images']);
    } else {
        $this->showToastr('Something went wrong. Please contact the system administrator.', 'error');
    }
}

public function resetUserForm() {
    $this->announcement_date = null;
    $this->announcement_title = null;
    $this->announcement_content = null;
    $this->announcement_id = null;
    $this->resetErrorBag();
}

    public function CreateAnnouncement() {
        $this->dispatch('showCreateAnnouncementModal');
    }
    
    public function showToastr($message, $type) {
        return $this->dispatch('showToastr',   message: $message, type: $type);
    }
    public function render()
    {
        $announcements = announcement::orderBy('announcement_date', 'desc')
        ->where('announcement_date', 'like',  '%'.$this->Search.'%')
        ->orwhere('announcement_title', 'like',  '%'.$this->Search.'%')
        ->orwhere('announcement_content', 'like',  '%'.$this->Search.'%')
        ->take($this->limitPerPage)
        ->get();

    return view('livewire.admin.announcement-form', [
        'announcements' => $announcements,
    ]);
    }
}
