<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use Session;

class BrandController extends Controller
{
    public function Brands(){
    	Session::put('page','brands');
    	$brands = Brand::get();
    	return view('admin.brands.brands')->with(compact('brands'));
    }

    public function updateBrandStatus(Request $request){
    	if($request->ajax()){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data);die();
    		if($data['status']=="Active"){
    			$status = 0;
    		}else{
    			$status = 1;
    		}
    		Brand::where('id',$data['brand_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'brand_id'=>$data['brand_id']]);
    	}
    }

    public function addEditBrand(Request $request , $id=null){
    	Session::put('page','brands');
    	if(empty($id)){
    		$title = "Add Brand";
    		$brand = new Brand;
    		$message = "Brand Added Successfully !";
    	}else{
    		$title = "Edit Brand";
    		$brand = Brand::find($id);
    		$message = "Brand Updated Successfully !";
    	}


    	if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>"; print_r($data);die;
	        // check valiadtion and Custom message error
	        $rules = [
	            'brand_name' => 'required|regex:/^[\pL\s\-]+$/u',
	        ];
	        $customMessage = [
	            'brand_name.required' => "Brand Name Must be Required",
	            'brand_name.regex' => "Please valid inserted Brand Name",
	        ];

	        $this->validate($request,$rules,$customMessage);

	        // Inserted Data in Brand Table
	        $brand->name = $data['brand_name'];
	        $brand->status = 1;
	        $brand->save();

	        Session::flash('success_message',$message);
	        return redirect('admin/brands');

    	}

    	return view('admin.brands.add_edit_brand')->with(compact('title','brand'));
    }

    public function deleteBrand($id){

        // Delete Brand
        Brand::where('id',$id)->delete();

        $message = 'Brand Deleted Successfully !';
        Session::flash('success_message',$message);
        return redirect()->back(); 
    }

}
