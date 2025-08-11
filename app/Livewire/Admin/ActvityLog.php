<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\activity_log;

class ActvityLog extends Component
{

    public $hasMore,$limitPerPage,$count,$Search;
   

    #[On('reset-activitylog-list')]

    public function activitylogList() {
        $this->count = activity_log::latest('updated_at')
        ->orwhere('activity', 'like',  '%'.$this->Search.'%')
        ->orwhere('created_at', 'like',  '%'.$this->Search.'%')
        ->count();
        if($this->count > $this->limitPerPage) {
            if($this->count > 10) {
                $this->hasMore = true;
            }
            else {
                $this->limitPerPage = $this->count;
            }
        }
        else {
            $this->hasMore = false;
            $this->limitPerPage = $this->count;
        }
    }

    #[On('load-more')]
    public function loadMore()
    {
        if($this->hasMore == true) {
            $this->limitPerPage = $this->limitPerPage + 10;
            $this->activitylogList();
        }
    }

    public function updatedSearch() {
        $this->limitPerPage = 10;
        $this->activitylogList();

    }

    public function mount() {
        $this->count = 0;
        $this->limitPerPage = 10;
        $this->Search = null;
        $this->activitylogList();
        
    }


    public function render()
{
    $activity_logs = activity_log::latest('updated_at')
        ->orwhere('created_at', 'like',  '%'.$this->Search.'%')
        ->orwhere('activity', 'like',  '%'.$this->Search.'%')
        ->take($this->limitPerPage)
        ->get();

    return view('livewire.admin.actvity-log', [
        'activity_logs' => $activity_logs,
    ]);
}
}
