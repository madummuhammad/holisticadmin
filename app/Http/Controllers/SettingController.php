<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
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
        $wa = str_replace('0', '62', $wa);
        $setting = Setting::query();
        $setting->update(['whatsapp' => $wa]);
        return back();
    }
}
