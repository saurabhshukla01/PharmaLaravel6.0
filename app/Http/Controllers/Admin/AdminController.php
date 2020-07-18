<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
//use Hash;

class AdminController extends Controller
{
    // All Admin Controller Functions Define here 

    public function dashboard()
    {
        return view('admin.admin_dashboard');
    }

    public function login(Request $request)
    {
    	//echo $password= Hash::make('12345678');die;
    	if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data);die();
    		if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
    			return redirect('admin/dashboard');
    		}else{
    			Session::flash('error_message','Invalid Email Or Password');
    			return redirect()->back();
    		}
    	}
        return view('admin.admin_login');
    }

    public function logout(){
    	Auth::guard('admin')->logout();
    	return redirect('/admin');
    }
}
