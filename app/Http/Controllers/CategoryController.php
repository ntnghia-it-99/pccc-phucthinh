<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Session;
use DB;

class CategoryController extends Controller
{
    public function add_category(){
    	return view('admin.category.add_category');
    }
    public function all_category(){
    	$all_category = DB::table('category')->get();
    	return view('admin.category.all_category')->with('all_category',$all_category);
    }
    public function save_category(Request $request){
    	$data = new Category();
    	$data['name'] = $request->name;
    	$data['description'] = $request->description;
    	$data['status'] = $request->status;

    	$data->save();
    	Session::put('message','Thêm danh mục sản phẩm thành công');
    	return redirect('them-the-loai');
    }
}
