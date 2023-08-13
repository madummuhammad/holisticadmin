<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\ServiceCategory;
use App\Models\Service;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        // $category=ServiceCategory::where('level','parent')->with('child')->whereDoesntHave('child')->where('can_be_deleted',1)->get();

        // foreach ($category as $key => $value) {
        //     ServiceCategory::create(['name'=>'OTHERS SERVICES','level'=>'sub','can_be_deleted'=>0,'parent_id'=>$value->id]);
        // }
        $data['category']=ServiceCategory::where('level','parent')->orderBy('name','ASC')->get();
        return view('category-service',$data);
    }

    public function add()
    {
        $name=request('name');
        $validator=Validator::make(['name'=>$name],[
            'name' => 'required|unique:service_categories',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput(['name'=>$name])->with('error','The name has already been taken.');
        }

        $category=ServiceCategory::create(['name'=>$name]);
        ServiceCategory::create(['name'=>'OTHER SERVICES','level'=>'sub','parent_id'=>$category->id,'can_be_deleted'=>0]);
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
        Service::where('service_category_id',$id)->delete();
        ServiceCategory::where('id',$id)->delete();
        return back()->with('success','Berhasil menghapus kategori');
    }
}
