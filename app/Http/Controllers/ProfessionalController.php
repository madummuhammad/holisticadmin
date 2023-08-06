<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
class ProfessionalController extends Controller
{
    public $type;
    public function index()
    {
        $data['users']=User::where('type', 'professional')->orderBy('created_at','DESC')->get();
        return view('professional',$data);
    }

    public function add()
    {
        $this->type='professional';
        $data = request()->validate([
            'email' => [
                'required',
                'email',
                Rule::unique('users')->whereNull('deleted_at')->where(function ($query) {
                    $query->where('type', 'professional');
                }),
            ],
            'first_name' => 'required',
            'last_name' => 'required',
            'no_hp' => 'required',
            'password' => 'required',
            'country' => 'required',
        ],[
            'first_name.required' => 'Kolom nama depan wajib diisi.',
            'last_name.required' => 'Kolom nama belakang wajib diisi.',
            'no_hp.required' => 'Kolom nomor HP wajib diisi.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Kolom password wajib diisi.',
            'country.required' => 'Kolom negara wajib diisi.',
        ]);

        $user = User::create([
            'user_id'=>$this->user_id(),
            'sequence'=>User::get()->count()+1,
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'no_hp' => $data['no_hp'],
            'type'=>'professional',
            'password' => bcrypt($data['password']),
            'password_text'=>$data['password'],
            'country' => $data['country'],
        ]);
        return back()->with('success', 'Berhasil menambahkan professional')->withInput($data);
    }

    public function edit($id)
    {
        $this->type='seeker';
        $data = request()->validate([
            'email' => [
                'required',
                'email',
                Rule::unique('users')->whereNull('deleted_at')->ignore($id)->where(function ($query) {
                    $query->where('type', 'professional');
                }),
            ],
            'first_name' => 'required',
            'last_name' => 'required',
            'no_hp' => 'required',
            'password' => 'required',
            'country' => 'required',
        ],[
            'first_name.required' => 'Kolom nama depan wajib diisi.',
            'last_name.required' => 'Kolom nama belakang wajib diisi.',
            'no_hp.required' => 'Kolom nomor HP wajib diisi.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Kolom password wajib diisi.',
            'country.required' => 'Kolom negara wajib diisi.',
        ]);

        $user = User::where('id',$id)->update([
            'user_id'=>$this->user_id(),
            'sequence'=>User::get()->count()+1,
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'no_hp' => $data['no_hp'],
            'type'=>'professional',
            'password' => bcrypt($data['password']),
            'password_text'=>$data['password'],
            'country' => $data['country'],
        ]);
        return back()->with('success', 'Berhasil mengedit data professional')->withInput($data);
    }

    public function delete($id)
    {
        User::where('id',$id)->delete();
        return back()->with('success', 'Berhasil menghapus professional');
    }

    private function user_id()
    {
        $year = now()->format('Y');
        $month = now()->format('m');
        $sequence=User::withTrashed()->count()+1;
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
