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
use App\TempAddCart;
use Session;
use Image;

class ProductsController extends Controller
{
    public function index(){

        $products = Product::where(['status'=>1])->orderBy('id','desc')->paginate(6);
        $product_count = Product::where(['status'=>1])->get()->count();

        // Sections with Categories and Sub Categories
        $categories = Section::with('categories')->get();

        //$products = json_decode(json_encode($products));
        //echo "<pre>"; print_r($products);die();

        // Pass data in view with (Array form) Getting in Array by loop 
        return view('front.products',['products'=>$products,'categories'=>$categories,'product_count'=>$product_count]);

    }

    public function productDetails($id){
        $products = Product::with([
            'category'=>function($query){
                $query->select('id','category_name');
            },
            'section'=>function($query){
                $query->select('id','name');
            },
            'brand'=>function($query){
                $query->select('id','name');
            },
            'attributes'=>function($query){
                $query->select('id','product_id','size','price','stock','sku')->where(['status'=>1]);
            },
            'images'=>function($query){
                $query->select('id','product_id','image')->where(['status'=>1]);
            },
        ])->where(['id'=>$id,'status'=>1])->get();

        //$query = Product::select('*')->toSql();
        //dd($query);die;
        $products = json_decode(json_encode($products));

        // Sections with Categories and Sub Categories
        $categories = Section::with('categories')->get();
        $categories = json_decode(json_encode($categories),true);
        //echo "<pre>"; print_r($products);die();
        
    	return view('front.product_details')->with(compact('products','categories'));
    }

    public function getProductPrice(Request $request){
        $data = $request->all();
        //echo "<pre>"; print_r($data);die;
        $proArr = explode("-",$data['idSize']);
        //echo $proArr[0];echo $proArr[1];die;
        $proAttr = ProductsAttribute::where(['product_id'=>$proArr[0] ,'size'=> $proArr[1]])->first();
        echo $proAttr->price;
    }

    public function getProductStock(Request $request){
        $data = $request->all();
        //echo "<pre>"; print_r($data);die;
        $proArr = explode("-",$data['idSize']);
        //echo $proArr[0];echo $proArr[1];die;
        $proAttr = ProductsAttribute::where(['product_id'=>$proArr[0] ,'size'=> $proArr[1]])->first();
        echo $proAttr->stock;
    }

    public function productCompair(){

        // Sections with Categories and Sub Categories
        $categories = Section::with('categories')->get();
        $categories = json_decode(json_encode($categories),true);

        return view('front.compair_product')->with(compact('categories'));
    }

}
