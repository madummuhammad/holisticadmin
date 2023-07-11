<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
class User extends Component
{
    use WithPagination;
    public $type;
    public $keyword;
    public $userMethod;
    public $first_name;
    public $last_name;
    public $no_hp;
    public $email;
    public $password;
    public $country;

    public function mount()
    {
        $this->userMethod=New \App\Models\User; 
    }

    protected $listeners = [
        'deletedUser' => 'checkPage',
        'dataInit'=>'checkPage'
    ];

    public function checkPage()
    {
        $users=$this->userMethod->where('type', 'seeker')
        ->where(function ($query) {
            $query->where('first_name', 'like', '%' . $this->keyword . '%')
            ->orWhere('last_name', 'like', '%' . $this->keyword . '%')
            ->orWhere('user_id', 'like', '%' . $this->keyword . '%');
        })->paginate(2);
        if ($this->page > $users->lastPage()) {
            $this->gotoPage($users->lastPage());
        }
    }

    public function render()
    {
        $user=New \App\Models\User;
        $data['users']=$this->userMethod->where('type', 'seeker')
        ->where(function ($query) {
            $query->where('first_name', 'like', '%' . $this->keyword . '%')
            ->orWhere('last_name', 'like', '%' . $this->keyword . '%')
            ->orWhere('user_id', 'like', '%' . $this->keyword . '%');
        })->paginate(2);
        $this->emit('dataInit');
        return view('livewire.user',$data);
    }

    public function add()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'no_hp' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->whereNull('deleted_at')
            ],
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

        $newUser = $this->userMethod->create([
            'user_id' => $this->user_id(),
            'no_hp' => $this->no_hp,
            'sequence'=>$sequence=$this->userMethod->count()+1,
            'type'=>'seeker',
            'password' => bcrypt($this->password),
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'country' => $this->country,
            'password_text' => $this->password,
            'active' => true,
        ]);

        $this->reset([
            'first_name',
            'last_name',
            'no_hp',
            'email',
            'password',
            'country',
        ]);
        Session::flash('success', 'Berhasil menambahkan data pengguna');
        $this->emit('closeModal');
        $this->emit('deleteUser');
    }

    public function delete($id)
    {
        $this->userMethod->where('id',$id)->delete();
        Session::flash('success','Berhasil mengahus data');
        $this->emit('closeModal');
        $this->checkPage();
    }

    private function user_id()
    {
        $year = now()->format('Y');
        $month = now()->format('m');
        $sequence=$this->userMethod->withTrashed()->count()+1;
        $num=1;
        if($this->type=='profesional')
        {
          $num=1;
      }
      if($this->type=='seeker')
      {
          $num=2;
      }
      if($this->type=='both')
      {
          $num=3;
      }

      return $year.$month.$num.$sequence;
  }
}
