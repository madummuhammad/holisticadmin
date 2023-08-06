<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Validator;
use Illuminate\Support\Str;
class EventController extends Controller
{
	public function index()
	{
		$data['event']=Event::get();
		return view('event.event',$data);
	}

	public function add()
	{
		return view('event.create-event');
	}

	public function edit($id)
	{
		$data['event']=Event::where('id',$id)->first();
		return view('event.edit-event',$data);
	}

	public function update(Request $request,$id)
	{
		$me=auth()->user();
		$rules = [
			'title' => 'required|string|max:255',
			'content' => 'required|string',
		];

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return back()->withErrors($validator);
		}


		$slug = Str::slug($request->input('title'));
		$uniqueSlug = $slug;
		$count = 1;

		while (Event::where('slug', $uniqueSlug)->exists()) {
			$uniqueSlug = $slug . '-' . $count;
			$count++;
		}
		$data=[
			'slug' => $uniqueSlug,
			'title' => $request->input('title'),
			'content' => $request->input('content'),
			'admin_id' => $me->id,
			'written_at' => date('Y-m-d H:i:s'),
		];

		if($request->file('image')){
			$imagePath = $this->upload($request);
			$data['image']=$imagePath;
		}


		$event = Event::where('id',$id)->update($data);
		return back()->with('success','Successfully edit event');
	}

	public function delete($id)
	{
		Event::where('id',$id)->delete();

		return back()->with('success','Successfully delete event');
	}

	public function create(Request $request)
	{
		$me=auth()->user();
		$rules = [
			'title' => 'required|string|max:255',
			'content' => 'required|string',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif',
		];

		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return back()->withErrors($validator);
		}

		$imagePath = $this->upload($request);

		$slug = Str::slug($request->input('title'));
		$uniqueSlug = $slug;
		$count = 1;

		while (Event::where('slug', $uniqueSlug)->exists()) {
			$uniqueSlug = $slug . '-' . $count;
			$count++;
		}
		$event = Event::create([
			'slug' => $uniqueSlug,
			'title' => $request->input('title'),
			'content' => $request->input('content'),
			'image' => $imagePath,
			'admin_id' => $me->id,
			'written_at' => date('Y-m-d H:i:s'),
		]);
		return redirect('event');
	}

	function upload($request)
	{
		$image = $request->file('image');
		if ($image) {
			$filename = 'event'.time(). '.' . $image->getClientOriginalExtension();;
			$image->move(public_path('image/event'), $filename);
		} else {
			$filename = 'default.png';
		}

		$url="";
		if(env('APP_ENV')=='production'){
			$url=env('APP_URL_PROD').'image/event/';
		} else {
			$url=env('APP_URL_LOCAL').'image/event/';
		}

		$file_url=$url.$filename;

		return $file_url;
	}
}