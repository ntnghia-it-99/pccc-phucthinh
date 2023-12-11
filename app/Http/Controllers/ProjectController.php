<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Project;
use Session;

class ProjectController extends Controller
{
    public function project()
    {
        $service = DB::table('service')->get();
        $project = DB::table('project')->get();
        return view('layouts.project.project')->with('service',$service)->with('project',$project);
    }

    public function add_project(){
        return view('admin.project.add_project');
    }

    public function all_project(){
    	$all_project = DB::table('project')->get();
    	return view('admin.project.all_project')->with('all_project',$all_project);
    }
    public function save_project(Request $request){
    	$data = new Project();
    	$data['name_project'] = $request->name;
        $data['project_slug'] = $this->UrlNormal($request->name);
    	$data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['quantity'] = $request->quantity;
        $data['images'] = $request->image;
        $get_images = $request->file('images');
        $get_image = $request->file('image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('images/project',$new_image);
            $data['images'] = $new_image.'|';
            $data->save();
            Session::put('message','Thêm dự án thành công');
            return redirect('danh-sach-du-an');
        } else if ($get_images) {
            foreach ($get_images as $image) {
                $get_name_image = $image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image =  $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
                $image->move('images/project',$new_image);
                $images[] = $new_image;
            }
            $data['images'] = implode('|', $images);
            $data->save();
            Session::put('message','Thêm dự án thành công');
            return redirect('danh-sach-du-an');
        }
        $data['image'] = '';
    	$data->save();
    	Session::put('message','Thêm dự án thành công');
    	return redirect('danh-sach-du-an');
    }
    public function edit_project($project_id){
        $edit_project = DB::table('project')->where('id',$project_id)->get();
        return view('admin.project.edit_project')->with('edit_project',$edit_project);
    }

    function convert_vn2latin($str)
    {
    // Mảng các ký tự tiếng việt không dấu theo mã unicode tổ hợp
        $tv_unicode_tohop  =
            [
                "à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă", "ằ","ắ","ặ","ẳ","ẵ",
                "è","é","ẹ","ẻ","ẽ","ê","ề" ,"ế","ệ","ể","ễ",
                "ì","í","ị","ỉ","ĩ",
                "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ" ,"ò","ớ","ợ","ở","õ",
                "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
                "ỳ","ý","ỵ","ỷ","ỹ",
                "đ",
                "À","À","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă" ,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
                "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
                "Ì","Í","Ị","Ỉ","Ĩ",
                "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ" ,"Ờ","Ớ","Ợ","Ở","Ỡ",
                "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
                "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
                "Đ"
            ];
        // Mảng các ký tự tiếng việt không dấu theo mã unicode dựng sẵn   
        $tv_unicode_dungsan  =
            [
                "à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ",
                "è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
                "ì","í","ị","ỉ","ĩ",
                "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ",
                "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
                "ỳ","ý","ỵ","ỷ","ỹ",
                "đ",
                "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ",
                "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
                "Ì","Í","Ị","Ỉ","Ĩ",
                "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
                "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
                "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
                "Đ"
            ];
        // Mảng các ký không dấu sẽ thay thế cho ký tự có dấu
        $tv_khongdau =
            [
                "a","a","a","a","a","a","a","a","a","a","a" ,"a","a","a","a","a","a",
                "e","e","e","e","e","e","e","e","e","e","e",
                "i","i","i","i","i",
                "o","o","o","o","o","o","o","o","o","o","o","o" ,"o","o","o","o","o",
                "u","u","u","u","u","u","u","u","u","u","u",
                "y","y","y","y","y",
                "d",
                "A","A","A","A","A","A","A","A","A","A","A","A" ,"A","A","A","A","A",
                "E","E","E","E","E","E","E","E","E","E","E",
                "I","I","I","I","I",
                "O","O","O","O","O","O","O","O","O","O","O","O" ,"O","O","O","O","O",
                "U","U","U","U","U","U","U","U","U","U","U",
                "Y","Y","Y","Y","Y",
                "D"
            ];

        $str = str_replace($tv_unicode_dungsan, $tv_khongdau, $str);
        $str = str_replace($tv_unicode_tohop,   $tv_khongdau, $str);
        return $str;
    }
    function UrlNormal($str)
    {
        // Chuyển tiếng việt không dấu
        $str = $this->convert_vn2latin($str);
        // chuyển sang in thường
        $str = mb_strtolower($str);
        // Giữ lại các ký tự chữ a - z và số 0 - 9 còn lại thay bằng -
        $str = preg_replace('/[^a-z0-9]/', '-', ($str));
        $str = preg_replace('/[--]+/', '-', $str);
        $str = trim($str, '-');
        return $str;
    }
    public function save_edit_project(Request $request,$project_id){
        $data = array();
    	$data['name_project'] = $request->name;
        $data['project_slug'] = $this->UrlNormal($request->name);
    	$data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['quantity'] = $request->quantity;
        $data['images'] = $request->image;
        $get_images = $request->file('images');
        $get_image = $request->file('image');
        $project = Project::find($project_id);
        $explodeImg = explode('|', $project->images);
        foreach ($explodeImg as $img) {
            if ($img) {
                $path = public_path('images/project/'.$img);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('images/project',$new_image);
            $data['images'] = $new_image.'|';
            $project->update($data);
            Session::put('message','Cập nhật dự án thành công');
            return redirect('danh-sach-du-an');
        } else if ($get_images) {
            foreach ($get_images as $image) {
                $get_name_image = $image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image =  $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
                $image->move('images/project',$new_image);
                $images[] = $new_image;
            }
            $data['images'] = implode('|', $images);
            $project->update($data);
            Session::put('message','Cập nhật dự án thành công');
            return redirect('danh-sach-du-an');
        }
        DB::table('project')->where('id',$project_id)->update($data);
    	Session::put('message','Thêm dự án thành công');
    	return redirect('danh-sach-du-an');
    }
    public function delete_project($project_id){
        $data = Project::find($project_id);
        $explodeImg = explode('|', $data->images);
        foreach ($explodeImg as $img) {
            if ($img) {
                $path = public_path('images/project/'.$img);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
        $data->delete();
        Session::put('message','Xóa dự án thành công');
        return redirect('danh-sach-du-an');
    }
    //End Admin.project Page
    public function details_project($project_slug , Request $request){
         //slide
        $project_detail = DB::table('project')->where('project_slug', $project_slug)->get();
        $service = DB::table('service')->get();
        return view('layouts.project.detail_project')->with('project',$project_detail)->with('service',$service);
    }
}
