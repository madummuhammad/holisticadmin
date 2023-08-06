<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RatingUser;
class RatingController extends Controller
{
    public function index(){
        $data['rating']=RatingUser::with('user','by_user','service')->get();
        return view('rating',$data);
    }

    public function delete($id)
    {
        RatingUser::where('id',$id)->delete();
        return back()->with('success', 'Rating deleted successfully');
    }
}
