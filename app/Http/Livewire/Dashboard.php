<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Book;
use App\Models\Donation;

class Dashboard extends Component
{
    public function render()
    {
        $donations = Donation::get();
        $data['professional'] = User::where('type', 'professional')->count();
        $data['seeker'] = User::where('type', 'seeker')->count();
        $data['booking'] = Book::where('status','new')->count();
        $data['donation'] = $donations->sum('total');

        return view('livewire.dashboard', $data);
    }
}
