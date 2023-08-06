<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
class DonationController extends Controller
{
    public function index()
    {
        $data['donation']=Donation::get();
        return view('donation', $data);
    }

    public function delete($id)
    {
        Donation::where('id',$id)->delete();

        return back()->with('success','Successfully delete data');
    }
}
