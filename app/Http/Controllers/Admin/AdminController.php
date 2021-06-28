<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Session;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.admin_dashboard');
    }

    public function settings(){
        Session::put('page','settings');
        return view('admin.admin_settings');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $customMessages = [
                 'email.required' => 'Email Field is Empty',
                 'email.email' => 'Enter Valid Email',
                 'password.required' => 'Password Field is Empty',
            ];

            $this->validate($request,$rules,$customMessages);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
                return redirect('/admin/dashboard');
            }else{
                Session::flash('error_message','Invalid Email or Password');
                return redirect()->back();
            }
        }
        return view('admin.admin_login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }

    public function chkCurrentPassword(Request $request){
        $data = $request->all();
        if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)){
            echo "true";    
        }else{
            echo "false";
        }
    }

}
