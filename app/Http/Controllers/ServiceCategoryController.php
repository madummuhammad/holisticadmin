<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\ServiceCategory;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $data['category']=ServiceCategory::get();
        return view('category-service',$data);
    }

    public function add()
    {
        $name=request('name');
        $validator=Validator::make(['name'=>$name],[
            'name'=>'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput(['name'=>$name]);
        }

        ServiceCategory::create(['name'=>$name]);
        return back()->with('success', 'Berhasil menambahkan kategori jasa');
    }

    public function edit($id)
    {
        $name=request('name');
        $validator=Validator::make(['name'=>$name],[
            'name'=>'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput(['name'=>$name]);
        }

        ServiceCategory::where('id',$id)->update(['name'=>$name]);
        return back()->with('success', 'Berhasil mengedit kategori jasa');
    }

    public function delete($id)
    {
        ServiceCategory::where('id',$id)->delete();
        return back()->with('success','Berhasil menghapus kategori');
    }
}
