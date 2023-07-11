<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use Validator;
use Auth;

class Login extends Component
{
    public $username;
    public $password;
    public function login(Request $request)
    {
        $this->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        $data=[
            'username'=>$this->username,
            'password'=>$this->password,
        ];

        if (Auth::attempt($data)) {
            return redirect('/');
        }
        return redirect()->back()->with([
            'error' => 'Username atau password salah.',
        ]);
    }

    public function render()
    {
        return view('livewire.login')->layout('components.app-auth');;
    }
}
