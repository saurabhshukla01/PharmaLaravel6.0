@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="content-wrapper">
<!-- Main content -->
	<div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Catalogues</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Categories</li>
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
	<section class="content">
      <div class="container-fluid">
         @if(Session::has('success_message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <label class="m-auto"> {{ Session::get('success_message') }} </label>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Categories</h3>
                <a href="{{ url('admin/add-edit-category') }}" class="btn btn-block btn-success" style="max-width: 150px;float:right;display: inline-block;">Add Category</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="categories" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.no. <br> ID</th>
                    <!--<th>Category ID</th>-->
                    <th>Category Name</th>
                    <th>Parent Category</th>
                    <th>Section Name</th>
                    <th>Category Image</th>
                    <th>Category URL</th>
                    <th>Category Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $sn=1;?>
                  @foreach($categories as $category)
                  @if(!isset($category->parentcategory->category_name))
                    <?php $parent_category ="Root"; ?>
                  @else
                    <?php $parent_category = $category->parentcategory->category_name; ?>
                  @endif
                  <tr>
                    <td style="vertical-align:middle;">{{ $sn }} <br> {{ $category->id }}</td>
                    <!--<td style="vertical-align:middle;">{{ $category->id }}</td>-->
                    <td style="vertical-align:middle;">{{ $category->category_name }}</td>
                    <td style="vertical-align:middle;">{{ $parent_category }}</td>
                    <td style="vertical-align:middle;">{{ $category->section->name }}</td>
                    <td ><img class="img-thumbnail" src="{{ url('images/category_images/'.$category->category_image) }}" width="75" height="50"></td>
                    <td style="vertical-align:middle;">{{ $category->url }}</td>
                    <td style="vertical-align:middle;">
                      @if($category->status ==1)
                        <a class="updateCategoryStatus" id="category-{{ $category->id }}" category_id="{{ $category->id }}" href="javascript:void(0)"><i class="fas fa-toggle-on" aria-hidden="true" title="Active" status="Active"></i></a>
                      @else
                        <a class="updateCategoryStatus" id="category-{{ $category->id }}" category_id="{{ $category->id }}" href="javascript:void(0)"><i class="fas fa-toggle-off" aria-hidden="true" title="Inactive" status="Inactive"></i></a>
                      @endif
                    </td>
                    <td style="vertical-align:middle;">
                      <span class="btn-group" role="group">
                        <a href="{{ url('admin/add-edit-category/'.$category->id) }}" class="btn btn-sm btn-info" title="Edit Category"><i class="fas fa-edit"></i></a>
                        &nbsp;
                        
                        <!-- If Not working After datatable value is more than 10 so not working sweatAlert box here , After disable the admin_script.js disable code Category deletion part) -->

                        <!--<a href="{{ url('admin/delete-category/'.$category->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Category item?');"> Delete</a>-->
                        <a href="javascript:void(0)" class="btn btn-sm btn-danger confirmDelete"
                        <?php //href="{{ url('admin/delete-category/'.$category->id) }}" ?> 
                        record="category" recordid="{{ $category->id }}" title="Delete Category"><i class="fas fa-trash"></i></a>
                      </span>
                    </td>
                  </tr>
                  <?php $sn++; ?>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
	</section>
</div>
@endsection