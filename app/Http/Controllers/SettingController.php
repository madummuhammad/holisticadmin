<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Setting;
use App\Models\Admin;
use Validator;
use Illuminate\Support\Facades\Hash;
class SettingController extends Controller
{
    public function index()
    {
        $data['setting']=Setting::first();
        return view('setting',$data);
    }

    public function edit()
    {
      $wa = request('whatsapp');

    // Gantikan "0" di awal nomor dengan "62"
      $wa = preg_replace('/^0/', '62', $wa);

      Setting::query()->update(['whatsapp' => $wa]);

      return back();
  }

  public function privacy_policy()
  {
    $privacy_policy = request('privacy_policy');
    $setting = Setting::query();
    $setting->update(['privacy_policy' => $privacy_policy]);
    return back();
}


public function rek_information()
{
    $rek_information = request('rek_information');
    $setting = Setting::query();
    $setting->update(['rek_information' => $rek_information]);
    return back();
}

public function about_us()
{
    $about_us = request('about_us');
    $setting = Setting::query();
    $setting->update(['about_us' => $about_us]);
    return back();
}

public function donation()
{
    $donation = request('donation');
    $setting = Setting::query();
    $setting->update(['donation' => $donation]);
    return back();
}

public function faq()
{
    $data['question']=Question::with('answer')->orderBy('created_at','ASC')->get();
    return view('faq',$data);
}

public function change_password(Request $request)
{
    $validator = Validator::make($request->all(), [
        'password' => 'required',
        'new_password' => 'required|confirmed',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator);
    }

    $user = auth()->user();

    if (!Hash::check($request->input('password'), $user->password)) {
        return back()->withErrors(['password' => 'Wrong password']);
    }

    $user->update([
        'password' => Hash::make($request->input('new_password')),
    ]);

    return back()->with('success', 'Password berhasil diubah');
}


public function add_question(Request $request)
{
    $question=$request->input('question');
    $validator=Validator::make(['question'=>$question],[
        'question'=>'required'
    ]);

    if($validator->fails()){
        return back()->withErrors($validator);
    }

    Question::create(['question'=>$question]);

    return back()->with('success','Successfully add question');
}

public function edit_question(Request $request,$id)
{
    $question=$request->input('question');
    $validator=Validator::make(['question'=>$question],[
        'question'=>'required'
    ]);

    if($validator->fails()){
        return back()->withErrors($validator);
    }

    Question::where('id',$id)->update(['question'=>$question]);

    return back()->with('success','Successfully edit question');
}

public function delete_question($id)
{
    Question::where('id',$id)->delete();

    return back()->with('success','Successfully delete question');
}

public function add_answer(Request $request)
{
    $answer = $request->input('answer');
    $question_id = $request->input('question_id');

    $validator = Validator::make(['answer' => $answer], [
        'answer' => 'required'
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator);
    }

    Answer::updateOrCreate(
        ['question_id' => $question_id],
        ['answer' => $answer] 
    );

    return back()->with('success', 'Successfully edit answer');
}

    // public function edit_question(Request $request,$id)
    // {
    //     $question=$request->input('question');
    //     $validator=Validator::make(['question'=>$question],[
    //         'question'=>'required'
    //     ]);

    //     if($validator->fails()){
    //         return back()->withErrors($validator);
    //     }

    //     Question::where('id',$id)->update(['question'=>$question]);

    //     return back()->with('success','Successfully edit question');
    // }

    // public function delete_question($id)
    // {
    //     Question::where('id',$id)->delete();

    //     return back()->with('success','Successfully delete question');
    // }
}
