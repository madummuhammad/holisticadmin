<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Validator;
class ProductCategoryController extends Controller
{
    public function index()
    {
        // $category=ProductCategory::where('level','parent')->with('child')->whereDoesntHave('child')->where('can_be_deleted',1)->get();

        // foreach ($category as $key => $value) {
        //     ProductCategory::create(['name'=>'Other','level'=>'sub','can_be_deleted'=>0,'parent_id'=>$value->id]);
        // }
        $data['category']=ProductCategory::where('level','parent')->orderBy('name','ASC')->get();
        return view('category-product',$data);
    }

    public function add()
    {
        $name=request('name');
        $validator=Validator::make(['name'=>$name],[
            'name' => 'required|unique:product_categories',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput(['name'=>$name])->with('error','The name has already been taken.');
        }

        $category=ProductCategory::create(['name'=>$name,'level'=>'parent']);

        ProductCategory::create(['name'=>'OTHER PRODUCTS','level'=>'sub','parent_id'=>$category->id,'can_be_deleted'=>0]);
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

        ProductCategory::where('id',$id)->update(['name'=>$name]);
        return back()->with('success', 'Berhasil mengedit kategori jasa');
    }

    public function delete($id)
    {
        Product::where('product_category_id',$id)->delete();
        ProductCategory::where('id',$id)->delete();
        return back()->with('success','Berhasil menghapus kategori');
    }
}
