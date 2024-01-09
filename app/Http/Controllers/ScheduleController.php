<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
class ScheduleController extends Controller
{
 public function index()
 {
    $data['schedule']=Schedule::whereHas('service')->with('service.user','by_user')->get();
    return view('schedule',$data);
}

public function delete($id){
    Schedule::where('id',$id)->delete();

    return back()->with('success', 'Berhasil menghapus pencari jasa');
}

public function update(Request $request,$id)
{
    $date=$request->input('date');
    $time_from=$request->input('time_from');
    $time_to=$request->input('time_to');

    $data=[
        'date'=>$date,
        'time_from'=>$time_from,
        'time_to'=>$time_to
    ];

    Schedule::where('id',$id)->update($data);

    return back();
}
}
