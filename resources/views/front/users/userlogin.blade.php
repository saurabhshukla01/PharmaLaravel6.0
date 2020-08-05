@extends('layouts.front_layout.front_layout')
@section('content')
<div class="span9">
   <ul class="breadcrumb">
      <li><a href="{{ url('/')}}">Home</a> <span class="divider">/</span></li>
      <li class="active">Login</li>
   </ul>
   <h3> Login</h3>
   <hr class="soft"/>
   <div class="span6">
      <div class="well">
         <form action="{{ url('user-login') }}" method="post">@csrf
            <div class="control-group">
               <label class="control-label" for="loginemail">Email</label>
               <div class="controls">
                  <input class="span3"  type="text" id="loginemail" name="loginemail" placeholder="Email">
               </div>
            </div>
            <div class="control-group">
               <label class="control-label" for="loginpassword">Password</label>
               <div class="controls">
                  <input type="password" name="loginpassword" class="span3"  id="loginpassword" placeholder="Password">
               </div>
            </div>
            <div class="control-group">
               <div class="controls">
                  <button type="submit" class="btn">Sign in</button> <a href="#">Forget password?</a>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection