@extends('layouts.front_layout.front_layout')
@section('content')
<div class="span9">
<ul class="breadcrumb">
   <li><a href="{{ url('/') }}">Home</a> <span class="divider">/</span></li>
   <li class="active">Registration</li>
</ul>
<h3> Registration</h3>
<div class="well">
   @if(Session::has('success_message'))
   <div class="alert alert-success alert-dismissible fade show" role="alert">
      <label class="m-auto"> {{ Session::get('success_message') }} </label>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   @endif
   @if ($errors->any())
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
      @foreach ($errors->all() as $error)
      <label class="m-auto"> {{ $error }} </label>
      @endforeach
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
   </div>
   @endif
   <form class="form-horizontal" method="post" action="{{ url('user-register') }}" enctype="multipart/form-data">
      @csrf
      <h4>Your personal information</h4>
      <div class="control-group">
         <label class="control-label">Title <sup>*</sup></label>
         <div class="controls">
            <select class="span1" name="title" style="width:150px;">
               <option value="">Select Title</option>
               <option value="Mr">Mr.</option>
               <option value="Mrs">Mrs</option>
               <option value="Miss">Miss</option>
            </select>
         </div>
      </div>
      <div class="control-group">
         <label class="control-label" for="fname">First name <sup>*</sup></label>
         <div class="controls">
            <input type="text" id="fname" name="fname" placeholder="First Name">
         </div>
      </div>
      <div class="control-group">
         <label class="control-label" for="lname">Last name <sup>*</sup></label>
         <div class="controls">
            <input type="text" id="lname" name="lname" placeholder="Last Name">
         </div>
      </div>
      <div class="control-group">
         <label class="control-label" for="email">Email <sup>*</sup></label>
         <div class="controls">
            <input type="text" id="email" name="email" placeholder="Email">
         </div>
      </div>
      <div class="control-group">
         <label class="control-label" for="password">Password <sup>*</sup></label>
         <div class="controls">
            <input type="password" id="password" name="password" placeholder="Password">
         </div>
      </div>
      <div class="control-group">
         <label class="control-label" for="dob">Date of Birth <sup>*</sup></label>
         <div class="controls">
            <input type="date" name="dob" id="dob" placeholder="Enter DOB">
         </div>
      </div>
      <h4>Your address</h4>
      <div class="control-group">
         <label class="control-label" for="address">Address<sup>*</sup></label>
         <div class="controls">
            <input type="text" id="address" name="address" placeholder="Address"/> <span>Street address, P.O. box, company name, c/o</span>
         </div>
      </div>
      <div class="control-group">
         <label class="control-label" for="city">City<sup>*</sup></label>
         <div class="controls">
            <input type="text" id="city" name="city" placeholder="city"/> 
         </div>
      </div>
      <div class="control-group">
         <label class="control-label" for="state">State<sup>*</sup></label>
         <div class="controls">
            <select id="state" name="state" >
               <option value="">Select State</option>
               <option value="Rajasthan">Rajasthan</option>
               <option value="Mumbai">Mumbai</option>
               <option value="Dehli">Dehli</option>
               <option value="UP">UP</option>
               <option value="Others">Others</option>
            </select>
         </div>
      </div>
      <div class="control-group">
         <label class="control-label" for="pincode">Pin Code<sup>*</sup></label>
         <div class="controls">
            <input type="text" id="pincode" name="pincode" placeholder="Pin Code"/> 
         </div>
      </div>
      <div class="control-group">
         <label class="control-label" for="country">Country<sup>*</sup></label>
         <div class="controls">
            <select id="country" name="country" >
               <option value="">Select Country</option>
               <option value="India">India</option>
               <option value="other">Other</option>
            </select>
         </div>
      </div>
      <div class="control-group">
         <label class="control-label" for="addinformation">Additional information</label>
         <div class="controls">
            <textarea name="addinformation" id="addinformation" cols="26" rows="3" placeholder="Add Some Information Here .."></textarea>
         </div>
      </div>
      <div class="control-group">
         <label class="control-label" for="mobile">Home phone <sup>*</sup></label>
         <div class="controls">
            <input type="text"  name="mobile" id="mobile" placeholder="phone"/> <span>You must register at least one Mobile number</span>
         </div>
      </div>
      <div class="control-group">
         <label class="control-label" for="image">User Image</label>
         <div class="controls">
            <input type="file"  name="image" id="image" placeholder="User Image"/> 
         </div>
      </div>
      <p style="color:red;"><sup>*</sup> All field must be Required field</p>
      <div class="control-group">
         <div class="controls">
            <input class="btn btn-large btn-success" type="submit" value="Register" />
         </div>
      </div>
   </form>
</div>
@endsection