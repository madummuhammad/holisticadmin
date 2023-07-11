<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class EditUser extends Component
{
    public $user;
    public $type;
    public $first_name;
    public $last_name;
    public $no_hp;
    public $email;
    public $password;
    public $country;
    
    public function mount($user)
    {
        $this->user = $user;
        $this->type = $user->type;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->no_hp = $user->no_hp;
        $this->email = $user->email;
        $this->password = $user->password_text;
        $this->country = $user->country;
    }
    public function render()
    {
        return view('livewire.user.edit-user');
    }

    public function edit()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'required',
            'country' => 'required',
        ], [
            'first_name.required' => 'Kolom nama depan wajib diisi.',
            'last_name.required' => 'Kolom nama belakang wajib diisi.',
            'no_hp.required' => 'Kolom nomor HP wajib diisi.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Kolom password wajib diisi.',
            'country.required' => 'Kolom negara wajib diisi.',
        ]);

        $this->user->first_name = $this->first_name;
        $this->user->last_name = $this->last_name;
        $this->user->no_hp = $this->no_hp;
        $this->user->email = $this->email;
        $this->user->password = $this->password;
        $this->user->country = $this->country;
        $this->user->save();

        session()->flash('success', 'Data pengguna berhasil diperbarui.');
        $this->emit('userUpdated');
    }
}
