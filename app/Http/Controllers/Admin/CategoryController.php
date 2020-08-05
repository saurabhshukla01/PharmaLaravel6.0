<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Section;
use Session;
use Image;

class CategoryController extends Controller
{
    public function categories(){
    	Session::put('page','categories');
    	$categories = Category::with(['section','parentcategory'])->get();
    	//$categories = json_decode(json_encode($categories));
    	//echo "<pre>"; print_r($categories);die();
    	return view('admin.categories.categories')->with(compact('categories'));
    }

    public function updateCategoryStatus(Request $request){
    	if($request->ajax()){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data);die();
    		if($data['status']=="Active"){
    			$status = 0;
    		}else{
    			$status = 1;
    		}
            //echo "<pre>"; print_r($data);die();
    		Category::where('id',$data['category_id'])->update(['status'=>$status]);
            //print_r($data);
    		return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
    	}
    }

    public function addEditCategory(Request $request , $id=null){
    
        if(empty($id)){
            $title = "Add Category";
            //echo $title;die;
            $categorydata = array();
            // Add Category Functionality
            $category = new Category;
            $getCategories = array();
            $message = "Category Added Successfully !";

        }else{
            $title = "Edit Category";
            // Edit Category Functionality
            $categorydata = Category::where('id',$id)->first();
            $categorydata = json_decode(json_encode($categorydata),true);
            //echo "<pre>"; print_r($categorydata);die;
            $getCategories = Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$categorydata['section_id']])->get();
            $getCategories = json_decode(json_encode($getCategories),true);
            //echo "<pre>"; print_r($getCategories);die;
            $category = Category::find($id);
            $message = "Category Updated Successfully !";

        }

        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data);die;
            // check valiadtion and Custom message error
            $rules = [
                'category_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'section_id' => 'required',
                'url' => 'required',
                'category_image' => 'image|mimes:jpeg,png,jpg|max:2048',
            ];
            $customMessage = [
                'category_name.required' => "Category Name Must be Required",
                'category_name.regex' => "Valid Category Name Must be Required",
                'section_id.required' => "Section Must be Required",
                //'category_image.required' => "Category Image Must Be Required",
                'category_image.image' => "Valid Category Image Must Be Required",
                'url.required' => "Category URL Must be Required"
            ];

            $this->validate($request,$rules,$customMessage);

            if($request->hasFile('category_image')){
                $image_tmp = $request->file('category_image');
                if($image_tmp->isValid()){
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image Name
                    $imageName = rand(111,999999).'.'.$extension;
                    $imagePath = 'images/category_images/'.$imageName;
                    //Upload the Image
                    //Image::make($image_tmp)->resize(300,400)->save($imagePath);
                    Image::make($image_tmp)->save($imagePath); 

                    //save this images in category tables 
                    $category->category_image = $imageName;
                }

            }else{
                $imageName = $categorydata['category_image'];
                $category->category_image = $imageName;
            }

            if(empty($data['category_discount'])){
                $data['category_discount']=0.00;
            }

            if(empty($data['description'])){
                $data['description']= "";
            }

            if(empty($data['meta_title'])){
                $data['meta_title']= "";
            }

            if(empty($data['meta_description'])){
                $data['meta_description']= "";
            }

            if(empty($data['meta_keywords'])){
                $data['meta_keywords']= "";
            }

            $category->section_id = $data['section_id'];
            $category->parent_id = $data['parent_id'];
            $category->category_name = $data['category_name'];
            $category->category_discount = $data['category_discount'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keywords = $data['meta_keywords'];
            $category->status = 1;
            $category->save();

            Session::flash('success_message',$message);
            return redirect('admin/categories');
        }

        // Get All Sections
        $getSections = Section::get();

        return view('admin.categories.add_edit_category')->with(compact('title','getSections','categorydata','getCategories'));

    }

    public function appendCategoryLevel(Request $request){
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>";print_r($data);die();
            $getCategories = Category::with('subcategories')->where(['section_id'=>$data['section_id'],'parent_id'=>0,'status'=>1])->get();
            $getCategories = json_decode(json_encode($getCategories),true);
            //echo "<pre>"; print_r($getCategories);die();
            return view('admin.categories.append_categories_level')->with(compact('getCategories','getCategories'));
        }
    }

    public function deleteCategoryImage($id){
        // Get Category Image
        $categoryImage = Category::select('category_image')->where('id',$id)->first();

        // Get Category Image Path
        $category_image_path = "images/category_images";

        // Delete Category Image From category_images folder if exists
        if(file_exists($category_image_path.$categoryImage->category_image)){
            unlink($category_image_path.$categoryImage->category_image);
        }

        // Delete Category Image from categories table
        Category::where('id',$id)->update(['category_image'=>'']);
        $message = 'Category Image has been deleted Successfully !';
        Session::flash('success_message',$message);
        return redirect()->back();
        //return redirect()->back()->with('flash_message_success','Category Image has been deleted Successfully !');

    }

    public function deleteCategory($id){

        // Delete Category
        Category::where('id',$id)->delete();

        $message = 'Category Deleted Successfully !';
        Session::flash('success_message',$message);
        return redirect()->back(); 
    }
    
}
