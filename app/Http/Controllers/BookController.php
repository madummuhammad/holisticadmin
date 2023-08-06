<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Schedule;
class BookController extends Controller
{
    public function index()
    {
        $data['book']=Book::where('status','new')->with('service.user','by_user')->get();

        return view('book',$data);
    }

    public function accept($id)
    {
        $book=Book::where('id',$id)->first();

        $schedule=Schedule::create([
            'book_id'=>$book->id,
            'rating_id'=>null,
            'date'=>$book->date,
            'time_from'=>$book->time_from,
            'time_to'=>$book->time_to,
            'service_id'=>$book->service_id,
            'user_id'=>$book->user_id,
            'by_user_id'=>$book->by_user_id
        ]);


        Book::where('id',$id)->where('status','new')->update(['status'=>'accepted']);

        return back();
    }

    public function reject($id)
    {
        Book::where('id',$id)->where('status','new')->update(['status'=>'rejected']);
        return back();
    }

    public function delete($id){
        Book::where('id',$id)->delete();

        return back()->with('success', 'Successfully delete booked');
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

        Book::where('id',$id)->update($data);

        return back();
    }
}
