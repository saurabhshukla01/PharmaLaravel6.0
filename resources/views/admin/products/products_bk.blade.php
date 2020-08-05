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
                  <li class="breadcrumb-item active">Products</li>
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
                <h3 class="card-title">Products</h3>
                <a href="{{ url('admin/add-edit-product') }}" class="btn btn-block btn-success" style="max-width: 150px;float:right;display: inline-block;">Add Product</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="products" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <!--<th>Product ID</th>-->
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Product Color</th>
                    <th>Product Image</th>
                    <th>Category Name</th>
                    <th>Section Name</th>
                    <!--<th>Product Price (Rs.)</th>
                    <th>Product Discount (%)</th>-->
                    <th>Product Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $sn=1;?>
                  @foreach($products as $product)
                  <tr>
                    <td style="vertical-align:middle;">{{ $sn }}</td>
                    <!--<td style="vertical-align:middle;">{{ $product->id }}</td>-->
                    <td style="vertical-align:middle;">{{ $product->product_name }}</td>
                    <td style="vertical-align:middle;">{{ $product->product_code }}</td>
                    <td style="vertical-align:middle;">{{ $product->product_color }}</td>
                    <td >
                      @if(!empty($product->main_image))
                      <img class="img-thumbnail" src="{{ url('images/product_images/small/'.$product->main_image) }}" width="75" height="50">
                      @else
                      <img class="img-thumbnail" src="{{ url('images/product_images/small/noimage.png') }}" width="75" height="50">
                      @endif
                    </td>
                    <td style="vertical-align:middle;">{{ $product->category->category_name }}</td>
                    <td style="vertical-align:middle;">{{ $product->section->name }}</td>
                    <!--<td style="vertical-align:middle;">{{ $product->product_price }} <br>Rs. /- </td>
                    <td style="vertical-align:middle;">{{ $product->product_discount }} % </td>-->
                    <td style="vertical-align:middle;">
                      @if($product->status ==1)
                        <a class="updateProductStatus" id="product-{{ $product->id }}" product_id="{{ $product->id }}" href="javascript:void(0)">Active</a>
                      @else
                        <a class="updateProductStatus" id="product-{{ $product->id }}" product_id="{{ $product->id }}" href="javascript:void(0)">Inactive</a>
                      @endif
                    </td>
                    <td style="vertical-align:middle;">
                      <span class="btn-group" role="group">
                        <a href="{{ url('admin/add-attributes/'.$product->id) }}" class="btn btn-sm btn-primary" title="Add/Edit Attributes"><i class="fas fa-plus"></i></a>
                        &nbsp;
                        <a href="{{ url('admin/add-edit-product/'.$product->id) }}" class="btn btn-sm btn-info" title="Edit Product"><i class="fas fa-edit"></i></a>
                        &nbsp;
                        
                        <!-- If Not working After datatable value is more than 10 so not working sweatAlert box here , After disable the admin_script.js disable code product deletion part) -->

                        <!--<a href="{{ url('admin/delete-product/'.$product->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product item?');"> Delete</a>-->
                        <a href="javascript:void(0)" class="btn btn-sm btn-danger confirmDelete"
                        <?php //href="{{ url('admin/delete-product/'.$product->id) }}" ?> 
                        record="product" recordid="{{ $product->id }}" title="Delete Product"><i class="fas fa-trash"></i></a>
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