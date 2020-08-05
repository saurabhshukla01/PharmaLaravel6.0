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
                  <li class="breadcrumb-item active">Categories</li>
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
            //print_r($categorydata);die;
            if(!empty($categorydata)){
              $categorydata_id = $categorydata['id'];
              $categorydata_category_name = $categorydata['category_name'];
              $categorydata_url = $categorydata['url'];
              $categorydata_description = $categorydata['description'];
              $categorydata_meta_title = $categorydata['meta_title'];
              $categorydata_meta_description = $categorydata['meta_description'];
              $categorydata_meta_keywords = $categorydata['meta_keywords'];
              $categorydata_category_discount = $categorydata['category_discount'];
              $categorydata_section_id = $categorydata['section_id'];
              $categorydata_parent_id = $categorydata['parent_id'];
              $categorydata_category_image = $categorydata['category_image'];
              //echo $categorydata_parent_id;
            }    
            ?>
         <form name="categoryForm" id="categoryForm" @if(empty($categorydata)) action="{{ url('admin/add-edit-category') }}" @else action="{{ url('admin/add-edit-category/'.$categorydata['id']) }}" @endif 
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
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Category Name" @if(!empty($categorydata_category_name)) value="{{ $categorydata_category_name }}" @else value="{{ old('category_name') }}" @endif>
                     </div>
                     <div id="appendCategoriesLevel">
                        @include('admin.categories.append_categories_level')
                     </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Select Section</label>
                        <select name="section_id" id="section_id" class="form-control select2" style="width: 100%;">
                           <option value="">Select</option>
                           @foreach($getSections as $section)
                           <option value="{{ $section->id }}" @if(!empty($categorydata_section_id) && $categorydata_section_id == $section->id) selected @endif >{{ $section->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="category_image">Category Image</label>
                        <div class="input-group">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" name="category_image" id="category_image" @if(empty($categorydata_category_image)) required @endif>
                              <label class="custom-file-label" for="category_image">Choose file</label>
                           </div>
                           <div class="input-group-append">
                              <span class="input-group-text" id="">Upload</span>
                           </div>
                        </div>
                        @if(!empty($categorydata_category_image))
                           <div><img style="width:80px;margin-top:5px;" src="{{ asset('images/category_images/'.$categorydata_category_image)}}">
                            &nbsp;&nbsp; 
                            <!--<a href="{{ url('admin/delete-category-image/'.$categorydata_id) }}" onclick="return confirm('Are you sure you want to delete this Category Image ?');">Delete Image</a>-->

                            <a <?php /*href="{{ url('admin/delete-category-image/'.$categorydata_id) }}" */?>
                            href="javascript:void(0);" class="confirmDelete" record="category-image" recordid="{{ $categorydata_id }}"
                            >Delete Image</a>
                           </div>
                        @endif
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="category_discount">Category Discount</label>
                        <input type="text" class="form-control" name="category_discount" id="category_discount" placeholder="Enter Category Discount" @if(!empty($categorydata_category_discount)) value="{{ $categorydata_category_discount }}" @else value="{{ old('category_discount') }}" @endif>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="url">Category URL</label>
                        <input type="text" class="form-control" name="url" id="url" placeholder="Enter Category URL" @if(!empty($categorydata_url)) value="{{ $categorydata_url }}" @else value="{{ old('url') }}" @endif>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="description">Category Description</label>
                        <textarea class="form-control" rows="3" name="description" id="discription" placeholder="Enter Category Description Here">@if(!empty($categorydata_description)) {{ $categorydata_description }} @else {{ old('description') }} @endif</textarea>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <textarea class="form-control" rows="3" name="meta_title" id="meta_title" placeholder="Enter Meta Title Here">@if(!empty($categorydata_meta_title)) {{ $categorydata_meta_title }} @else {{ old('meta_title') }} @endif</textarea>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control" rows="3" name="meta_description" id="meta_description" placeholder="Enter Meta Description Here">@if(!empty($categorydata_meta_description)) {{ $categorydata_meta_description }} @else {{ old('meta_description') }} @endif</textarea>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6">
                     <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea class="form-control" rows="3" name="meta_keywords" id="meta_keywords" placeholder="Enter Meta Keywords Here">@if(!empty($categorydata_meta_keywords)) {{ $categorydata_meta_keywords }} @else {{ old('meta_keywords') }} @endif</textarea>
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

        