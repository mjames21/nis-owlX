<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\CallLogTbl;
class CallNetwork extends Component
{
    public $cdrs;

    public function mount()
    {
        $this->cdrs = CallLogTbl::all();
    }

    public function render()
    {
        return view('livewire.call-network');
    }

}
