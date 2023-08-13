<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\ServiceCategory;

class SubServiceCategoryController extends Controller
{
    public function index()
    {
        $data['parent']=ServiceCategory::where('level','parent')->orderBy('created_at','ASC')->get();
        $data['category'] = ServiceCategory::select('service_categories.*')
        ->join('service_categories AS parents', 'service_categories.parent_id', '=', 'parents.id')
        ->where('service_categories.level', 'sub')
        ->whereHas('parent')
        ->orderBy('parents.name', 'ASC')
        ->orderBy('service_categories.created_at', 'ASC')
        ->get();

        return view('sub-category-service', $data);
    }

    public function add()
    {
        $name=request('name');
        $parent=request('parent');
        $validator=Validator::make(['name'=>$name,'parent'=>$parent],[
            'name' => 'required|unique:service_categories',
            'parent'=>'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput(['name'=>$name,'parent'=>$parent])->with('error','The name has already been taken.');
        }
        ServiceCategory::create(['name'=>$name,'parent_id'=>$parent,'level'=>'sub']);
        return back()->with('success', 'Berhasil menambahkan sub kategori jasa');
    }

    public function edit($id)
    {
        $name=request('name');
        $parent=request('parent');
        $validator=Validator::make(['name'=>$name,'parent'=>$parent],[
            'name'=>'required',
            'parent'=>'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput(['name'=>$name,'parent'=>$parent]);
        }

        ServiceCategory::where('id',$id)->update(['name'=>$name,'parent_id'=>$parent]);
        return back()->with('success', 'Berhasil mengedit sub kategori jasa');
    }

    public function delete($id)
    {
        ServiceCategory::where('id',$id)->delete();
        return back()->with('success','Berhasil menghapus sub  kategori');
    }
}
