<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Dashboard extends Component
{
    public function render()
    {
        $data['professional']=User::where('type','professional')->get()->count();
        $data['seeker']=User::where('type','professional')->get()->count();
        return view('livewire.dashboard',$data);
    }
}
