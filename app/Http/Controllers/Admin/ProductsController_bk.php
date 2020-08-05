<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Section;
use Session;
use Image;

class ProductsController extends Controller
{
    public function products(){
        Session::put('page','products');
        //$products = Product::with(['category','section'])->get();

        // How to short Data with using Laravel In subquery Inside Controller using Model query (blongsTo is used on your Model name is App\Product model )

        $products = Product::with([
            'category'=>function($query){
                $query->select('id','category_name');
            },
            'section'=>function($query){
                $query->select('id','name');
            }
        ])->get();
        $products = json_decode(json_encode($products));
        //echo "<pre>"; print_r($products);die();
        return view('admin.products.products')->with(compact('products'));
    } 

    public function updateProductStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data);die();
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            //echo "<pre>"; print_r($data);die();
            Product::where('id',$data['product_id'])->update(['status'=>$status]);
            //print_r($data);
            return response()->json(['status'=>$status,'product_id'=>$data['product_id']]);
        }
    }
    
    public function deleteProduct($id){

        // Delete Product
        Product::where('id',$id)->delete();

        $message = 'Product Deleted Successfully !';
        Session::flash('success_message',$message);
        return redirect()->back(); 
    }

    public function addEditProduct(Request $request , $id=null){

        if(empty($id)){
            // Add Product Functionality
            $title = "Add Product";
            $productdata = array();

            $product = new Product;
            $message = "Product Added Successfully !";

        }else{
            $title = "Edit Product";

        }

        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data);die;

            // check valiadtion and Custom message error
            $rules = [
                'category_id' => 'required',
                'product_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'product_code' => 'required|regex:/^[\w-]*$/',
                'product_color' => 'required|regex:/^[\pL\s\-]+$/u',
                'product_price' => 'required|numeric',
                'main_image' => 'image|mimes:jpeg,png,jpg|max:2048',
                'product_video' => 'mimetypes:video/mp4,video/3gp|max:8060'
            ];
            $customMessage = [
                'category_id.required' => "Category must be required",
                'product_name.required' => "Product Name must be required",
                'product_name.regex' => "Valid Product Name must be required",
                'product_code.required' => "Product Code must be required",
                'product_code.regex' => "Valid Product Code must be required",
                'product_color.required' => "Product Color Must be Required",
                'product_color.regex' => "Valid Product Color Must be Required",
                'product_price.required' => "Product Price Must be Required",
                'product_price.numeric' => "Valid Product Price Must be Required",
                'main_image.image' => "Valid Image must be required",
            ];

            $this->validate($request,$rules,$customMessage);

            // Save Product details in Products table
            if(empty($data['description'])){
                $data['description'] = "";
            }

            if(empty($data['meta_title'])){
                $data['meta_title'] = "";
            }

            if(empty($data['meta_description'])){
                $data['meta_description'] = "";
            }

            if(empty($data['meta_keywords'])){
                $data['meta_keywords'] = "";
            }

            if(empty($data['wash_care'])){
                $data['wash_care'] = "";
            }

            if(empty($data['fabric'])){
                $data['fabric'] = "";
            }

            if(empty($data['occassion'])){
                $data['occassion'] = "";
            }

            if(empty($data['pattern'])){
                $data['pattern'] = "";
            }

            if(empty($data['fit'])){
                $data['fit'] = "";
            }

            if(empty($data['sleeve'])){
                $data['sleeve'] = "";
            }

            if(empty($data['product_discount'])){
                $data['product_discount'] = 0.00;
            }

            if(empty($data['product_weight'])){
                $data['product_weight'] = 0.00;
            }

            if(empty($data['is_featured'])){
                $is_featured = "No";
            }else{
                $is_featured = "Yes";
            }

            // Upload Product Image
            if($request->hasFile('main_image')){
                //echo $image_tmp = $request->file('main_image');die;
                $image_tmp = $request->file('main_image');
                if($image_tmp->isValid()){
                    // Get Original Image Name
                    $image_name = $image_tmp->getClientOriginalName();
                    // Get Original Image Extension Name
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Genrate New Image Name
                    $imageName = $image_name.'-'.rand(11111,9999999).'.'.$extension;
                    // Set All path small , medium and Large Images path
                    $large_image_path = 'images/product_images/large/'.$imageName;
                    $medium_image_path = 'images/product_images/medium/'.$imageName;
                    $small_image_path = 'images/product_images/small/'.$imageName;
                    // Upload Large Image
                    Image::make($image_tmp)->save($large_image_path);  //W:1040 H:1200
                    // Upload Medium And Small Images after Resize
                    Image::make($image_tmp)->resize(520,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(260,300)->save($small_image_path);
                    // Save Main Image In products Table
                    $product->main_image = $imageName;

                }
            }

            // Upload Product Video
            if($request->hasFile('product_video')){
                $video_tmp = $request->file('product_video');
                $videoname = $video_tmp->getClientOriginalName();
                $extension = $video_tmp->getClientOriginalExtension();
                $extension = strtolower($extension);
                if($extension=="mp4" || $extension=="3gp"){
                    //echo "<pre>"; print_r($videoname);die;
                    //$videoName = $videoname.'-'.rand(100000,9999999).'.'.$extension;
                    $videoName = rand(100000,9999999).'.'.$extension;
                    $video_path = 'videos/product_videos/';
                    $video_tmp->move($video_path,$videoName);
                    //Image::make($video_tmp)->save($video_path);
                    $product->product_video = $videoName;
                    //echo "<pre>"; print_r($data);die;
                }
            }
            //echo "<pre>"; print_r($data);die;

            $categoryDetails = Category::find($data['category_id']);
            //echo "<pre>"; print_r($categoryDetails); die;
            $product->section_id = $categoryDetails['section_id'];
            $product->category_id = $data['category_id'];
            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            $product->product_price = $data['product_price'];
            $product->product_discount = $data['product_discount'];
            $product->product_weight = $data['product_weight'];
            $product->description = $data['description'];
            $product->wash_care = $data['wash_care'];
            $product->fabric = $data['fabric'];
            $product->pattern = $data['pattern'];
            $product->sleeve = $data['sleeve'];
            $product->fit = $data['fit'];
            $product->occassion = $data['occassion'];
            $product->meta_title = $data['meta_title'];
            $product->meta_description = $data['meta_description'];
            $product->meta_keywords = $data['meta_keywords'];
            $product->is_featured = $is_featured;
            $product->status = 1;
            //$product->product_video = "Sample.mp4";
            $product->save();

            Session::flash('success_message',$message);
            return redirect('admin/products');

        }

        // filter Arrays
        $fabricArray = array('Cotton','Polyester','Wool');
        $sleeveArray = array('Full Sleeve','Half Sleeve','Short Sleeve','Sleeveless');
        $patternArray = array('Checked','Plain','Printed','Self','Solid');
        $fitArray = array('Regular','Slim');
        $occassionArray = array('Casual','Formal');

        // Sections with Categories and Sub Categories
        $categories = Section::with('categories')->get();
        $categories = json_decode(json_encode($categories),true);
        //echo "<pre>"; print_r($categories);die();

        return view('admin.products.add_edit_product')->with(compact('title','fabricArray','sleeveArray','patternArray','fitArray','occassionArray','categories','productdata'));
    }

    public function deleteProductImage($id){
        // Get Category Image
        $productImage = Product::select('main_image')->where('id',$id)->first();

        // Get Product Image Path
        $product_image_large_path = "images/product_images/large";
        $product_image_medium_path = "images/product_images/medium";
        $product_image_small_path = "images/product_images/small";

        // Delete Prdouct Large Image From main_image folder if exists
        if(file_exists($product_image_large_path.$productImage->main_image)){
            unlink($product_image_large_path.$productImage->main_image);
        }
        // Delete Prdouct medium Image From main_image folder if exists
        if(file_exists($product_image_medium_path.$productImage->main_image)){
            unlink($product_image_medium_path.$productImage->main_image);
        }
        // Delete Prdouct Large Image From main_image folder if exists
        if(file_exists($product_image_small_path.$productImage->main_image)){
            unlink($product_image_small_path.$productImage->main_image);
        }

        // Delete Category Image from categories table
        Category::where('id',$id)->update(['main_image'=>'']);
        $message = 'Product Image has been deleted Successfully !';
        Session::flash('success_message',$message);
        return redirect()->back();
        //return redirect()->back()->with('flash_message_success','Product Image has been deleted Successfully !');

    }

}
