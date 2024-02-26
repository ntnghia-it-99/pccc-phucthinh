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
    public function edit_category($category_id){
    	$edit_category = DB::table('category')->where('category_id', $category_id)->get();
        return view('admin.category.edit_category')->with('edit_category',$edit_category);

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
    public function update_category($category_id, Request $request){
    	$data = array();
    	$data['name'] = $request->name;
    	$data['description'] = $request->description;
    	$data['status'] = $request->status;

    	DB::table('category')->where('category_id',$category_id)->update($data);
    	Session::put('message','Edit danh mục sản phẩm thành công');
    	return redirect('danh-sach-the-loai');
    }
	public function delete_category($category_id){
        $data = Category::find($category_id);
        $data->delete();
        Session::put('message','Xóa danh mục thành công');
        return redirect('danh-sach-the-loai');
    }
}
