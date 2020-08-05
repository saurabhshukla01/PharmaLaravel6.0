<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\ProductsAttribute;
use App\ProductsImage;
use App\Category;
use App\Section;
use Session;
use Image;

class IndexController extends Controller
{
    public function index(){
        // Get Is featured Product Where Status is Active
        $featured_products = Product::with([
            'category'=>function($query){
                $query->select('id','category_name');
            },
            'section'=>function($query){
                $query->select('id','name');
            }
        ])->where(['status'=>1,'is_featured'=>'Yes'])->orderBy('id','desc')->take(6)->get();
        $featured_products = json_decode(json_encode($featured_products)); 

        // Total Featured Product Count 
        $featured_products_count = Product::where(['is_featured'=>'Yes'])->get()->count();

        // Get Latest Product Where Status is Active
        $latest_products = Product::with([
            'category'=>function($query){
                $query->select('id','category_name');
            },
            'section'=>function($query){
                $query->select('id','name');
            }
        ])->where(['status'=>1])->orderBy('id','desc')->take(6)->get();
        $latest_products = json_decode(json_encode($latest_products));
        //echo "<pre>"; print_r($latest_products);die();

        // Sections with Categories and Sub Categories
        $categories = Section::with('categories')->get();
        $categories = json_decode(json_encode($categories),true);
        //echo "<pre>"; print_r($categories);die();

    	return view('front.index')->with(compact('featured_products_count','featured_products','latest_products','categories'));
    }

    public function featuredProducts(){
        // Get Is featured Product Where Status is Active
        $featured_products = Product::with([
            'category'=>function($query){
                $query->select('id','category_name');
            },
            'section'=>function($query){
                $query->select('id','name');
            }
        ])->where(['status'=>1,'is_featured'=>'Yes'])->orderBy('id','desc')->get();
        $featured_products = json_decode(json_encode($featured_products)); 

        // Total Featured Product Count 
        $featured_products_count = Product::where(['is_featured'=>'Yes'])->get()->count();

        //echo "<pre>"; print_r($latest_products);die();

        // Sections with Categories and Sub Categories
        $categories = Section::with('categories')->get();
        $categories = json_decode(json_encode($categories),true);
        //echo "<pre>"; print_r($categories);die();

        return view('front.featured_products')->with(compact('featured_products_count','featured_products','categories'));
    }

}
