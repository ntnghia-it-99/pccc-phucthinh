<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Service;

class ServiceController extends Controller
{
    public function add_service(){
        return view('admin.service.add_service');
    }

    public function all_service(){
    	$all_service = DB::table('service')->paginate(5);
    	return view('admin.service.all_service')->with('all_service',$all_service);
    }
    public function save_service(Request $request){
    	$data = new Service();
    	$data['name_service'] = $request->name;
        $data['service_slug'] = $this->UrlNormal($request->name);
    	$data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['order'] = $request->order;
        $data->save();
    	Session::put('message','Thêm dịch vụ thành công');
    	return redirect('them-dich-vu');
    }
    public function edit_service($service_id){
        $edit_service = Service::where('service_id',$service_id)->get();
        return view('admin.service.edit_service')->with('edit_service',$edit_service);
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
    public function save_edit_service(Request $request,$service_id){
        $data = array();
        $data['name_service'] = $request->name_service;
        $data['service_slug'] =  $this->UrlNormal($request->name);
        $data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['order'] = $request->order;
        DB::table('service')->where('service_id',$service_id)->update($data);
        Session::put('message','Cập nhật dịch vụ thành công');
        return redirect('danh-sach-dich-vu');
    }
    public function delete_service($service_id){
        DB::table('service')->where('service_id',$service_id)->delete();
        Session::put('message','Xóa dịch vụ thành công');
        return redirect('danh-sach-dich-vu');
    }
    //End Admin.service Page
    public function detail_service($service_slug , Request $request){
         //slide
        $detail_service = DB::table('service')->where('service_slug',$service_slug)->get();
        $all_service = DB::table('service')->get();
        return view('layouts.service.detail_service')->with('detail_service',$detail_service)->with('service',$all_service);
    }
}
