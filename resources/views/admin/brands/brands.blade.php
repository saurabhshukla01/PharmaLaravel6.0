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
                  <li class="breadcrumb-item active">Brands</li>
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
                <h3 class="card-title">Product Brands</h3>
                <a href="{{ url('admin/add-edit-brand') }}" class="btn btn-block btn-success" style="max-width: 150px;float:right;display: inline-block;">Add New Brand</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="brands" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No. <br> ID</th>
                    <!--<th>Brand ID</th>-->
                    <th>Brand Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $sn=1; ?>
                  @foreach($brands as $brand)
                  <tr>
                    <td>{{ $sn }} <br> {{ $brand->id }}</td>
                    <!--<td>{{ $brand->id }}</td>-->
                    <td>{{ $brand->name }}</td>
                    <td>
                      @if($brand->status ==1)
                        <a class="updateBrandStatus" id="brand-{{ $brand->id }}" brand_id="{{ $brand->id }}" href="javascript:void(0)"><i class="fas fa-toggle-on" aria-hidden="true" title="Active" status="Active"></i></a>
                      @else
                        <a class="updateBrandStatus" id="brand-{{ $brand->id }}" brand_id="{{ $brand->id }}" href="javascript:void(0)"><i class="fas fa-toggle-off" aria-hidden="true" title="Inactive" status="Inactive"></i></a>
                      @endif
                    </td>
                    <td>
                      <span class="btn-group" role="group">
                        <a href="{{ url('admin/add-edit-brand/'.$brand->id) }}" class="btn btn-sm btn-primary" title="Edit Brand"><i class="fas fa-edit"></i></a>
                        &nbsp;
                        <a href="javascript:void(0)" class="btn btn-sm btn-danger confirmDelete"
                        record="brand" recordid="{{ $brand->id }}" title="Delete Brand"><i class="fas fa-trash"></i></a>
                      </span>
                    </td>
                  </tr>
                  <?php $sn++; ?>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
        <!-- /.container-fluid -->
  </section>
<!-- /.content -->
</div>
@endsection