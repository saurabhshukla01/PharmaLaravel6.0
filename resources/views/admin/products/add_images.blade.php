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
                  <li class="breadcrumb-item active">Product images</li>
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
        @if(Session::has('error_message'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p class="m-auto"> {{ Session::get('error_message') }} </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
         <?php 
            //print_r($productdata);die;
            if(!empty($productdata)){
              $productdata_id = $productdata['id'];
              $productdata_product_name = $productdata['product_name'];
              $productdata_product_color = $productdata['product_color'];
              $productdata_product_code = $productdata['product_code'];
              $productdata_main_image = $productdata['main_image'];
            } 
            ?>
         <form name="addImagesForm" id="addImagesForm" action="{{ url('admin/add-images/'.$productdata_id) }}" 
         method="post" enctype="multipart/form-data">@csrf
         <input type="hidden" name="product_id" value="{{ $productdata_id }}">
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
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="product_name">Product Name 
                        <span class="text-danger">
                          &nbsp;&nbsp; :::: ====> &nbsp;&nbsp;
                        </span> 
                        <span class="text-primary"> 
                          {{ $productdata_product_name }} 
                        </span>
                      </label>
                    </div>
                    <div class="form-group">
                      <label for="product_code">Product Code 
                        <span class="text-danger">
                          &nbsp;&nbsp; :::: ====> &nbsp;&nbsp;
                        </span> 
                        <span class="text-primary">
                          {{ $productdata_product_code }}
                        </span>
                      </label>
                    </div>
                    <div class="form-group">
                      <label for="product_color">Product Color 
                        <span class="text-danger">
                          &nbsp;&nbsp; :::: ====> &nbsp;&nbsp;
                        </span>
                        <span class="text-primary"> 
                          {{ $productdata_product_color }} 
                        </span>
                      </label>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <img style="width:125px;margin-top:5px;" src="{{ asset('images/product_images/small/'.$productdata_main_image)}}">
                     </div>
                  </div>

                  <!-- Products images Add/Remove Script input using Jquery in input box using this input with help of link : https://www.codexworld.com/add-remove-input-fields-dynamically-using-jquery/
                  -->

                  <div class="col-sm-6">
                     <div class="form-group">
                        <div class="field_wrapper">
                          <div class="mt-2 ml-2">
                              <label for="images" class="text-info">Select Multiple Product Images : </label>
                              <input multiple="" id="images" name="images[]" type="file" value="" required="">
                          </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-footer">
               <button type="submit" class="btn btn-primary">Add images</button>
            </div>
         </div>
         </form>
         <!--<form name="editImagesForm" id="editImagesForm" action="{{ url('admin/edit-images/'.$productdata_id) }}" 
         method="post" enctype="multipart/form-data">@csrf-->
           <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Added Product images</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="products" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Sr. No. <br> ID</th>
                      <!--<th>Image ID</th>-->
                      <th>Product Images</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $sn=1;?>
                    @foreach($productdata['images'] as $image)
                    <input type="text" name="attrId[]" value="{{ $image['id'] }}" style="display:none">
                    <tr>
                      <td style="vertical-align:middle;">{{ $sn }} <br> {{ $image['id'] }}</td>
                      <!--<td style="vertical-align:middle;">{{ $image['id'] }}</td>-->
                      <td style="vertical-align:middle;">
                        <img style="width:100px;margin-top:5px;" src="{{ asset('images/product_images/small/'.$image['image'])}}">
                      </td>
                      <td style="vertical-align:middle;">
                        @if($image['status'] ==1)
                          <a class="updateImageStatus" id="image-{{ $image['id'] }}" image_id="{{ $image['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-on" aria-hidden="true" title="Active" status="Active"></i></a>
                        @else
                          <a class="updateImageStatus" id="image-{{ $image['id'] }}" image_id="{{ $image['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-off" aria-hidden="true" title="Inactive" status="Inactive"></i></a>
                        @endif
                      </td>
                      <td style="vertical-align:middle;">                          
                        <a href="javascript:void(0)" class="btn btn-sm btn-danger confirmDelete" 
                        record="image" recordid="{{ $image['id'] }}" title="Delete image"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php $sn++; ?>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!--<div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update images</button>
                </div>-->
              </div>
            </div>
          </div>
        <!--</form>-->
      </div>
   </section>
</div>
@endsection

        