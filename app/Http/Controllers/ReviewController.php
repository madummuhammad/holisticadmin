<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Validation\Rule;
class ReviewController extends Controller
{
	public function index(){
		$data['review']=Rating::with('user','by_user','service')->get();
		return view('review',$data);
	}

	public function delete($id)
	{
		Rating::where('id',$id)->delete();
		return back()->with('success', 'Review deleted successfully');
	}
}