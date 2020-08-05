<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Admin;
use Hash;
use Image;

class AdminController extends Controller
{
    // All Admin Controller Functions Define here 

    public function dashboard()
    {
        Session::put('page','dashboard');
        return view('admin.admin_dashboard');
    }

    public function settings()
    {
        Session::put('page','settings');
        //echo "<pre>";print_r(Auth::guard('admin')->user());die();
        //Auth::guard('admin')->user()->id;
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first();
        return view('admin.admin_settings')->with(compact('adminDetails'));
    }

    public function login(Request $request)
    {
    	//echo $password= Hash::make('12345678');die;
    	if($request->isMethod('post')){
    		$data = $request->all();

            // How to create Custom message In Laravel 

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $customMessage = [
                'email.required' => 'Email Address Must be Required',
                'email.email' => 'Valid Email is required',
                'password.required' => 'Password Must be Required', 
            ];

            $this->validate($request,$rules,$customMessage);

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

    public function check_current_pwd(Request $request)
    {
        // check password code here 
        $data = $request->all();
        //echo "<pre>";print_r($data);
        //echo "<pre>";print_r(Auth::guard('admin')->user()->password);
        if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)){
            echo "true";
        }else{
            echo "false";
        }

    }

    public function update_current_pwd(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>";print_r($data);die();
            //Check If Current Password is Correct
            if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)){
                //Check If New And Confirm Password is Matching
                if($data['new_pwd']==$data['confirm_pwd']){
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
                    Session::flash('success_message','Password Updated Successfully !');
                }else{
                    Session::flash('error_message','New Password And Confirm Password Is not Matched');
                }
            }else{
                Session::flash('error_message','Your Current Password Is Incorrect');
            }
            return redirect()->back();
        }
    }

    public function UpdateAdminDetails(Request $request){
        Session::put('page','update-admin-details');
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>";print_r($data);die();
            // check valiadtion and Custom message error
            $rules = [
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile' => 'required|numeric',
                'admin_image' => 'image|mimes:jpeg,png,jpg|max:2048',
            ];
            $customMessage = [
                'admin_name.required' => "Admin Name Must be Required",
                'admin_name.regex' => "Valid Admin Name Must be Required",
                'admin_mobile.required' => "Admin Mobile Must be Required",
                'admin_mobile.numeric' => "Admin Mobile Must Be In Numeric Value"
            ];
            $this->validate($request,$rules,$customMessage);

            //Upload Image In Laravel
            if($request->hasFile('admin_image')){
                $image_tmp = $request->file('admin_image');
                if($image_tmp->isValid()){
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111,999999).'.'.$extension;
                    $imagePath = 'images/admin_images/admin_photos/'.$imageName;
                    //Upload the Image
                    //Image::make($image_tmp)->resize(300,400)->save($imagePath);
                    Image::make($image_tmp)->save($imagePath);  
                }

            }else if(!empty($data['current_admin_image'])){
                    $imageName = $data['current_admin_image'];

            }else{
                    $imageName ="avatar.png";
            }

            //Update Admin Details 
            Admin::where('email',Auth::guard('admin')->user()->email)->update(['name'=> $data['admin_name'],'mobile'=> $data['admin_mobile'],'image'=> $imageName]);
            Session::flash("success_message","Admin Details Updated Successfully !");
            return redirect()->back();
        }
        return view('admin.update_admin_details');
    }
}
