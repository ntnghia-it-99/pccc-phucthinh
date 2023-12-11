<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;
class HomeController extends Controller
{
    public function home()
    {
        $product_outstanding = Product::where('status', 1)->get();
        $service = DB::table('service')->get();
        $project = DB::table('project')->where('status', 1)->get();
        return view('layouts.home')->with('product_outstanding',$product_outstanding)->with('service',$service)->with('project',$project);
    }
    public function introduce()
    {
        $service = DB::table('service')->get();
        return view('layouts.introduce')->with('service',$service);
    }
}
