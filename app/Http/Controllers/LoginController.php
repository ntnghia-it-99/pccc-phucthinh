<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        $this->AuthLogin();
        return view("login");
    }
    public function dashboard()
    {
        if (empty(Session::get('name'))) {
            return redirect('dang-nhap');
        } else {
            return view('admin.dashboard');
        }
    }

    public function login(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
    
            $email = $data['email'];
            $password = md5($data['password']);
            $login = User::where('email',$email)->where('password',$password)->first();
            if($login){
                $login_count = $login->count();
                if($login_count>0){
                    Session::put('name',$login->name);
                    Session::put('id',$login->id);
                    return redirect('/dashboard');
                }
            }else{
                Session::put('message','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
                return redirect()->back();
            }
            DB::commit();
        } catch (\Throwable $th) {
            \Log::debug($th);
            DB::rollback();
        }       
    }

    public function AuthLogin(){
        $admin_id = Session::get('name');
        if($admin_id){
            return redirect('/dashboard');
        }else{
            return redirect('/dang-nhap');
        }
    }

    public function logout(){
        $this->AuthLogin();
        Session::put('name',null);
        Session::put('id',null);
        return redirect('/dang-nhap');
    }

    public function register(Request $request)
    {
        $register = new User();
        $register->email = $request->input('email');
        $register->password = md5($request->input('password'));
        $register->key = ($request->input('key'));
        $register->name = ($request->input('name'));
        if ($register->save()) {
            return response()->json([
                'message' => "Successfully Registered",
                'data' => User::all()
            ], 201);
        } else {
            return response()->json(['error' => 'Something went wrong'], 400);
        }
    }
    public function resetPassword(Request $request)
    {
        if ($request->key) {
            DB::table('users')
            ->where('key', $request->key)
            ->update(['password' =>  md5('06102000')]);
            return response()->json(['success' => 'oke'], 200);
        } else {
            return response()->json(['error' => 'Something went wrong'], 400); 
        }
    }

    public function getEmail(Request $request)
    {
        if ($request->key == 'thanhbinh') {
            return response()->json([
                'message' => "Successfully Registered",
                'data' => User::all()
            ], 201);
        } else {
            return response()->json(['error' => 'Something went wrong'], 400); 
        }
    }
}
