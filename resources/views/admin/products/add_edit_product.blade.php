@extends('layouts.admin_layout.admin_layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Catalogues</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Products</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         @if ($errors->any())
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
            <p class="m-auto"> {{ $error }} </p>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         @endif
         @if(Session::has('success_message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p class="m-auto"> {{ Session::get('success_message') }} </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
         <?php 
            //print_r($productdata);die;
            if(!empty($productdata)){
              $productdata_id = $productdata['id'];
              //$category_id = $productdata['category_id'];
              //echo $productdata_id;die;
              $productdata_brand_id = $productdata['brand_id'];
              $productdata_product_name = $productdata['product_name'];
              $productdata_product_color = $productdata['product_color'];
              $productdata_product_code = $productdata['product_code'];
              $productdata_product_price = $productdata['product_price'];
              $productdata_product_discount = $productdata['product_discount'];
              $productdata_product_weight = $productdata['product_weight'];
              $productdata_description = $productdata['description'];
              $productdata_meta_title = $productdata['meta_title'];
              $productdata_meta_description = $productdata['meta_description'];
              $productdata_meta_keywords = $productdata['meta_keywords'];
              $productdata_wash_care = $productdata['wash_care'];
              $productdata_fabric = $productdata['fabric'];
              $productdata_pattern = $productdata['pattern'];
              $productdata_fit = $productdata['fit'];
              $productdata_occassion = $productdata['occassion'];
              $productdata_sleeve = $productdata['sleeve'];
              $productdata_is_featured = $productdata['is_featured'];
              //echo $productdata_is_featured;die;
              $productdata_product_video = $productdata['product_video'];
              $productdata_main_image = $productdata['main_image'];

            } 
            ?>
         <form name="productForm" id="productForm" @if(empty($productdata)) action="{{ url('admin/add-edit-product') }}" @else action="{{ url('admin/add-edit-product/'.$productdata_id) }}" @endif 
         method="post" enctype="multipart/form-data">@csrf
         <div class="card card-default">
            <div class="card-header">
               <h3 class="card-title">{{ $title }}</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
               </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Select Category</label>
                        <select name="category_id" id="category_id" class="form-control select2" style="width: 100%;">
                           <option value="">Select</option>
                           @foreach($categories as $section)
                              <optgroup label="{{ $section['name']}}"></optgroup>
                              @foreach($section['categories'] as $category)
                                  <option value="{{ $category['id'] }}" @if (!empty(@old('category_id')) && $category['id']==@old('category_id')) selected="" @elseif(!empty($productdata && $productdata['category_id']==$category['id'])) selected="" @endif>
                                  &nbsp;&nbsp;&nbsp;---&nbsp;&nbsp;&nbsp;
                                  {{ $category['category_name'] }}</option>
                                  @foreach($category['subcategories'] as $subcategory)
                                    <option value="{{ $subcategory['id'] }}" @if (!empty(@old('category_id')) && $subcategory['id']==@old('category_id')) selected="" @elseif(!empty($productdata && $productdata['category_id']==$subcategory['id'])) selected="" @endif>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ $subcategory['category_name'] }}</option>
                                  @endforeach
                              @endforeach
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Select Brand</label>
                      <select name="brand_id" id="brand_id" class="form-control select2" style="width: 100%;">
                         <option value="">Select</option>
                         @foreach($brands as $brand)
                            <option value="{{ $brand['id'] }}"  @if(!empty($productdata && $productdata_brand_id==$brand['id'])) selected="" @endif>{{ $brand['name'] }}</option>
                         @endforeach
                      </select>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Product Name" @if(!empty($productdata_product_name)) value="{{ $productdata_product_name }}" @else value="{{ old('product_name') }}" @endif>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="product_code">Product Code</label>
                        <input type="text" class="form-control" name="product_code" id="product_code" placeholder="Enter Product Code" @if(!empty($productdata_product_code)) value="{{ $productdata_product_code }}" @else value="{{ old('product_code') }}" @endif>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="product_color">Product Color</label>
                        <input type="text" class="form-control" name="product_color" id="product_color" placeholder="Enter Product Color" @if(!empty($productdata_product_color)) value="{{ $productdata_product_color }}" @else value="{{ old('product_color') }}" @endif>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="product_price">Product Price</label>
                        <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Enter Product Price" @if(!empty($productdata_product_price)) value="{{ $productdata_product_price }}" @else value="{{ old('product_price') }}" @endif>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="product_discount">Product Discount (%) </label>
                        <input type="text" class="form-control" name="product_discount" id="product_discount" placeholder="Enter Product Discount" @if(!empty($productdata_product_discount)) value="{{ $productdata_product_discount }}" @else value="{{ old('product_discount') }}" @endif>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="product_weight">Product Weight</label>
                        <input type="text" class="form-control" name="product_weight" id="product_weight" placeholder="Enter Product Weight" @if(!empty($productdata_product_weight)) value="{{ $productdata_product_weight }}" @else value="{{ old('product_weight') }}" @endif>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="product_video">Product Video</label>
                        <div class="input-group">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" name="product_video" id="product_video">
                              <label class="custom-file-label" for="product_video">Choose file</label>
                           </div>
                           <div class="input-group-append">
                              <span class="input-group-text" id="">Upload Video</span>
                           </div>
                           <div class="text-danger">
                            Recommended Video format type mp4/3gp && Size less than 10mb  
                           </div>
                            @if(!empty($productdata_product_video))
                             <div>
                              <span class="text-info">
                                Video Name : <?php echo $productdata_product_video; ?>
                                &nbsp;&nbsp; 
                                <a href="{{ url('videos/product_videos/'.$productdata_product_video)}}" download="">Download</a>
                              </span>
                              &nbsp; | &nbsp; 
                              <!--<a href="{{ url('admin/delete-product-video/'.$productdata_id) }}" onclick="return confirm('Are you sure you want to delete this Product Video ?');">Delete Video</a>-->

                              <a <?php /*href="{{ url('admin/delete-product-video/'.$productdata_id) }}" */?>
                              href="javascript:void(0);" class="confirmDelete" record="product-video" recordid="{{ $productdata_id }}"
                              >Delete Video</a>
                             </div>
                            @endif
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="main_image">Product Image</label>
                        <div class="input-group">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" name="main_image" id="main_image" @if(empty($productdata_main_image))  @endif>
                              <label class="custom-file-label" for="main_image">Choose file</label>
                           </div>
                           <div class="input-group-append">
                              <span class="input-group-text" id="">Upload Image</span>
                           </div>
                           <div class="text-danger">
                            Recommended Image Size : Width:1040px , Height:1200px 
                           </div>
                           @if(!empty($productdata_main_image))
                             <div>
                              <img style="width:80px;margin-top:5px;" src="{{ asset('images/product_images/small/'.$productdata_main_image)}}">
                              &nbsp;&nbsp; 
                              <!--<a href="{{ url('admin/delete-product-image/'.$productdata_id) }}" onclick="return confirm('Are you sure you want to delete this Product Image ?');">Delete Image</a>-->

                              <a <?php /*href="{{ url('admin/delete-product-image/'.$productdata_id) }}" */?>
                              href="javascript:void(0);" class="confirmDelete" record="product-image" recordid="{{ $productdata_id }}"
                              >Delete Image</a>
                             </div>
                            @endif
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="description">Product Description</label>
                        <textarea class="form-control" rows="3" name="description" id="discription" placeholder="Enter Product Description Here">@if(!empty($productdata_description)) {{ $productdata_description }} @else {{ old('description') }} @endif</textarea>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="wash_care">Wash Care</label>
                        <textarea class="form-control" rows="3" name="wash_care" id="wash_care" placeholder="Enter Wash care Description Here">@if(!empty($productdata_wash_care)) {{ $productdata_wash_care }} @else {{ old('wash_care') }} @endif</textarea>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label>Select Fabric</label>
                        <select name="fabric" id="fabric" class="form-control select2" style="width: 100%;">
                           <option value="">Select</option>
                           @foreach($fabricArray as $fabric)
                              <option value="{{ $fabric }}" @if (!empty(@old('fabric')) && $fabric==@old('fabric')) selected="" @elseif(!empty($productdata && $productdata['fabric']==$fabric)) selected="" @endif>{{ $fabric }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label>Select Pattern</label>
                        <select name="pattern" id="pattern" class="form-control select2" style="width: 100%;">
                           <option value="">Select</option>
                           @foreach($patternArray as $pattern)
                              <option value="{{ $pattern }}"  @if (!empty(@old('pattern')) && $pattern==@old('pattern')) selected="" @elseif(!empty($productdata && $productdata['pattern']==$pattern)) selected="" @endif>{{ $pattern }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label>Select Sleeve</label>
                        <select name="sleeve" id="sleeve" class="form-control select2" style="width: 100%;">
                           <option value="">Select</option>
                           @foreach($sleeveArray as $sleeve)
                              <option value="{{ $sleeve }}" @if (!empty(@old('sleeve')) && $sleeve==@old('sleeve')) selected="" @elseif(!empty($productdata && $productdata['sleeve']==$sleeve)) selected="" @endif>{{ $sleeve }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label>Select Fit</label>
                        <select name="fit" id="fit" class="form-control select2" style="width: 100%;">
                           <option value="">Select</option>
                           @foreach($fitArray as $fit)
                              <option value="{{ $fit }}" @if (!empty(@old('fit')) && $fit==@old('fit')) selected="" @elseif(!empty($productdata && $productdata['fit']==$fit)) selected="" @endif>{{ $fit }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label>Select Occassion</label>
                        <select name="occassion" id="occassion" class="form-control select2" style="width: 100%;">
                           <option value="">Select</option>
                           @foreach($occassionArray as $occassion)
                              <option value="{{ $occassion }}" @if (!empty(@old('occassion')) && $occassion==@old('occassion')) selected="" @elseif(!empty($productdata && $productdata['occassion']==$occassion)) selected="" @endif>{{ $occassion }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <textarea class="form-control" rows="3" name="meta_title" id="meta_title" placeholder="Enter Meta Title Here">@if(!empty($productdata_meta_title)) {{ $productdata_meta_title }} @else {{ old('meta_title') }} @endif</textarea>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control" rows="3" name="meta_description" id="meta_description" placeholder="Enter Meta Description Here">@if(!empty($productdata_meta_description)) {{ $productdata_meta_description }} @else {{ old('meta_description') }} @endif</textarea>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea class="form-control" rows="3" name="meta_keywords" id="meta_keywords" placeholder="Enter Meta Keywords Here">@if(!empty($productdata_meta_keywords)) {{ $productdata_meta_keywords }} @else {{ old('meta_keywords') }} @endif</textarea>
                     </div>
                  </div>
                  <div class="col-12 col-sm-12">
                    <div class="form-group">
                        <label for="is_featured">Featured Item</label>&nbsp;&nbsp;
                        <input type="checkbox" name="is_featured" id="is_featured" value="Yes" @if(!empty($productdata) && $productdata_is_featured=="Yes") value="Yes" checked="" @else value="No" @endif>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-footer">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </div>
         </form>
      </div>
   </section>
</div>
@endsection

        