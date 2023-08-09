<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
class SliderController extends Controller
{
    public function homepage()
    {
        $data['type']='homepage';
        $data['sliders']=Slider::where('type','homepage')->where('main_banner',0)->get();
        $data['banners']=Slider::where('type','homepage')->where('main_banner',1)->get();
        return view('slider',$data);
    }

    public function product()
    {
        $data['type']='product';
        $data['sliders']=Slider::where('type','product')->get();
        return view('slider',$data);
    }

    public function add(Request $request)
    {
        $type=$request->type;
        $caption=$request->caption;
        $image=$this->upload($request);

        $data=[
            'type'=>$type,
            'caption'=>$caption,
            'image'=>$image
        ];

        Slider::create($data);

        return back()->with('success','Berhasil menambahkan sliders');
    }

    public function edit(Request $request,$id)
    {
        $type=$request->type;
        $caption=$request->caption;
        $sub_caption=$request->sub_caption;
        $color=$request->color;
        $image=$this->upload($request);

        if($request->file('image')){
            $data=[
                'type'=>$type,
                'caption'=>$caption,
                'sub_caption'=>$sub_caption,
                'color'=>$color,
                'image'=>$image,
            ];
        } else {
          $data=[
            'type'=>$type,
            'caption'=>$caption,
            'sub_caption'=>$sub_caption,
            'color'=>$color,
        ];  
    }

    Slider::where('id',$id)->update($data);
    return back();
}

public function delete($id)
{
    Slider::where('id',$id)->delete();
    return back()->with('success','Berhasil menghapus slider');
}

function upload($request)
{
    $image = $request->file('image');
    if ($image) {
        $filename = 'sliders'.time(). '.' . $image->getClientOriginalExtension();;
        $image->move(public_path('image/sliders'), $filename);
    } else {
        $filename = 'default.png';
    }

    $url="";
    if(env('APP_ENV')=='production'){
        $url=env('APP_URL_PROD').'image/sliders/';
    } else {
        $url=env('APP_URL_LOCAL').'image/sliders/';
    }

    $file_url=$url.$filename;

    return $file_url;
}
}
