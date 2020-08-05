<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\User;
use Hash;
use Image;
use App\Product;
use App\Brand;
use App\ProductsAttribute;
use App\ProductsImage;
use App\Category;
use App\Section;



class UsersController extends Controller
{
    public function userLogin(){
    	// Sections with Categories and Sub Categories
        $categories = Section::with('categories')->get();
        $categories = json_decode(json_encode($categories),true);

        return view('front.users.userlogin')->with(compact('categories'));
    }

    public function userRegister(){
    	// Sections with Categories and Sub Categories
        $categories = Section::with('categories')->get();
        $categories = json_decode(json_encode($categories),true);

        return view('front.users.userregister')->with(compact('categories'));
    }

    public function userLogout(){
    	
    }

    public function contact(){

    	// Sections with Categories and Sub Categories
        $categories = Section::with('categories')->get();
        $categories = json_decode(json_encode($categories),true);
    	return view('front.contact')->with(compact('categories'));
    }
}
