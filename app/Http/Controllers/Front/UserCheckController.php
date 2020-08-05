<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Hash;
use Image;
use App\Category;
use App\Section;
use Session;
use App\Contact;

class UserCheckController extends Controller
{
    public function userLogin(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            $pass = Hash::make($data['loginpassword']);

            //$userDetails = User::where(['email'=>$data['loginemail'],'password'=>$pass])->first();

            if(User::find(['email'=>$data['loginemail'],'password'=>$pass])){
                return redirect('/');
            }else{
                Session::flash('error_message','Invalid Email Or Password');
                return redirect()->back();
            }

        }

    	// Sections with Categories and Sub Categories
        $categories = Section::with('categories')->get();
        $categories = json_decode(json_encode($categories),true);

        return view('front.users.userlogin')->with(compact('categories'));
    }

    public function userRegister(Request $request){
        //echo $password= Hash::make('12345678');die;

        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data);die();
            $users = new User;

            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111,999999).'.'.$extension;
                    $imagePath = 'images/usersprofile/'.$imageName;
                    //Upload the Image
                    Image::make($image_tmp)->resize(300,400)->save($imagePath);
                    //Image::make($image_tmp)->save($imagePath); 

                    //save this images in category tables 
                    $users->image = $imageName;
                }

            }

            $password= Hash::make($data['password']);
            $users->title = $data['title'];
            $users->fname = $data['fname'];
            $users->lname = $data['lname'];
            $users->email = $data['email'];
            $users->password = $password;
            $users->dob = $data['dob'];
            $users->address = $data['address'];
            $users->city = $data['city'];
            $users->state = $data['state'];
            $users->pincode = $data['pincode'];
            $users->country = $data['country'];
            $users->addinformation = $data['addinformation'];
            $users->mobile = $data['mobile'];
            $users->remember_token = $data['_token'];
            $users->status = 1;
            $users->save();

            Session::flash('success_message','User Registered Successfully !');
            return redirect('user-login');

        }
        
    	// Sections with Categories and Sub Categories
        $categories = Section::with('categories')->get();
        $categories = json_decode(json_encode($categories),true);

        return view('front.users.userregister')->with(compact('categories'));
    }

    public function userLogout(){
    	echo "processing";
    }

    public function contact(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data);die();
            $contacts = new Contact;

            $contacts->name = $data['name'];
            $contacts->email = $data['email'];
            $contacts->subject = $data['subject'];
            $contacts->message = $data['message'];
            $contacts->save();

            Session::flash('success_message','User Contact message Send Successfully !');
            return redirect('contact');

        }
        
        // Sections with Categories and Sub Categories
        $categories = Section::with('categories')->get();
        $categories = json_decode(json_encode($categories),true);
    	return view('front.contact')->with(compact('categories'));
    }

    public function userProfile(){
        echo "processing profile data";
    }

    public function about(){

        // Sections with Categories and Sub Categories
        $categories = Section::with('categories')->get();
        $categories = json_decode(json_encode($categories),true);

        return view('front.about')->with(compact('categories'));
    }

}

