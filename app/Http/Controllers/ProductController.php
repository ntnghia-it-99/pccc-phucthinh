<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use Session;

class ProductController extends Controller
{
    public function add_product(){
        $cate_product = DB::table('category')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('brand')->orderby('brand_id','desc')->get();
        return view('admin.product.add_product')->with('cate_product', $cate_product)->with('brand_product',$brand_product);
    }

    public function all_product(){
    	$all_product = DB::table('product')
        ->join('category','category.category_id','=','product.category_id')
        ->orderby('product.product_id','desc')->paginate(5);
    	return view('admin.product.all_product')->with('all_product',$all_product);
    }
    public function save_product(Request $request){
    	$data = new Product();
    	$data['name_product'] = $request->name;
        $data['product_slug'] = $this->UrlNormal($request->name);
    	$data['price'] = "Liên hệ báo giá";
    	$data['brand_id'] = $request->brand ?? 1;
    	$data['description'] = $request->description;
        $data['category_id'] = $request->product_cate;
        $data['status'] = $request->status;
        $data['image'] = $request->image;
        $get_image = $request->file('image');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('images/product',$new_image);
            $data['image'] = $new_image;
            $data->save();
            Session::put('message','Thêm sản phẩm thành công');
            return redirect('danh-sach-sp');
        }
        $data['image'] = '';
    	$data->save();
    	Session::put('message','Thêm sản phẩm thành công');
    	return redirect('danh-sach-sp');
    }
    public function edit_product($product_id){
        $cate_product = DB::table('category')->orderby('category_id','desc')->get(); 
        $edit_product = DB::table('product')->where('product_id',$product_id)->get();
        $brand_product = DB::table('brand')->orderby('brand_id','desc')->get();
        return view('admin.product.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product', $brand_product);
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
    public function save_edit_product(Request $request,$product_id){
        $data = array();
        $data['name_product'] = $request->name;
        $data['product_slug'] =  $this->UrlNormal($request->name);
        $data['price'] = "Liên hệ báo giá";
        $data['description'] = $request->description;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->brand ?? 1;
        $data['status'] = $request->status;
        $get_image = $request->file('image');
        $findProduct = Product::find($product_id);
        $path = public_path('images/product/'.$findProduct->image);
        if (file_exists($path)) {
            unlink($path);
        }
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('images/product',$new_image);
            $data['image'] = $new_image;
            DB::table('product')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return redirect('danh-sach-sp');
        }
        DB::table('product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return redirect('danh-sach-sp');
    }
    public function delete_product($product_id){
        $data = Product::find($product_id);
        $path = public_path('images/product/'.$data->image);
        if (file_exists($path)) {
            unlink($path);
        }
        $data->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return redirect('danh-sach-sp');
    }
    //End Admin.product Page
    public function details_product($product_slug , Request $request){
         //slide
        $cate_product = DB::table('category')->where('status','0')->orderby('category_id','desc')->get(); 
        $details_product = DB::table('product')
        ->where('product.product_slug',$product_slug)->get();
        $service = DB::table('service')->get();
        foreach($details_product as $key => $value){
            $category_id = $value->category_id;
                //seo 
                $meta_desc = $value->description;
                $meta_keywords = $value->product_slug;
                $meta_title = $value->name_product;
                $url_canonical = $request->url();
                //--seo
            }
        $related_product = DB::table('product')
        ->join('category','category.category_id','=','product.category_id')
        ->where('category.category_id',$category_id)->whereNotIn('product.product_slug',[$product_slug])->paginate(4);
        return view('layouts.product.detail')->with('category',$cate_product)->with('product_details',$details_product)->with('related_product',$related_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('service', $service);
    }
    public function show_all(){
         //slide
        $service = DB::table('service')->get();
        $product = DB::table('product')->where('status', 1)->paginate(8);
        return view('layouts.product.all_product')->with('service',$service)->with('product',$product);
    }
}
