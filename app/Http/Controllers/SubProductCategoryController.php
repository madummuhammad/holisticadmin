<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Validator;
class SubProductCategoryController extends Controller
{
    public function index()
    {
        $data['parent']=ProductCategory::where('level','parent')->orderBy('created_at','ASC')->get();
        $data['category'] = ProductCategory::select('product_categories.*')
        ->join('product_categories AS parents', 'product_categories.parent_id', '=', 'parents.id')
        ->where('product_categories.level', 'sub')
        ->whereHas('parent')
        ->orderBy('parents.name', 'ASC')
        ->orderBy('product_categories.created_at', 'ASC')
        ->get();

        return view('sub-category-product', $data);
    }

    public function add()
    {
        $name=request('name');
        $parent=request('parent');
        $validator=Validator::make(['name'=>$name,'parent'=>$parent],[
            'name' => 'required|unique:product_categories',
            'parent'=>'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput(['name'=>$name,'parent'=>$parent])->with('error','The name has already been taken.');
        }

        ProductCategory::create(['name'=>$name,'parent_id'=>$parent,'level'=>'sub']);
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

        ProductCategory::where('id',$id)->update(['name'=>$name,'parent_id'=>$parent]);
        return back()->with('success', 'Berhasil mengedit sub kategori jasa');
    }

    public function delete($id)
    {
        ProductCategory::where('id',$id)->delete();
        return back()->with('success','Berhasil menghapus sub kategori');
    }
}
