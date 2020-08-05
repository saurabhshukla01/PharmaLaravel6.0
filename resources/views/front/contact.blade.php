@extends('layouts.front_layout.front_layout')
@section('content')
<div class="span9">
   <h1>Visit us</h1>
   <hr class="soften"/>
   <div class="row">
      <div class="span3">
         <h4>Contact Details</h4>
         <p>	Gulshan Ikebana ,<br/> Plot No. GH 03/A,
            <br/> Sector 143, Noida, <br/> Uttar Pradesh 201306 <br/>
            info@gulshanikebana.in<br/>
            ﻿Tel 98007-78906<br/>
            Fax 03044-00506<br/>
            web: https://www.youtube.com/StackDevelopers
         </p>
      </div>
      <div class="span3">
         <h4>Opening Hours</h4>
         <h5> Monday - Friday</h5>
         <p>09:00am - 09:00pm<br/><br/></p>
         <h5>Saturday</h5>
         <p>09:00am - 07:00pm<br/><br/></p>
         <h5>Sunday</h5>
         <p>12:30pm - 06:00pm<br/><br/></p>
      </div>
      <div class="span3">
         <h4>Email Us</h4>
         <form class="form-horizontal" method="post" action="{{ url('/contact')}}">@csrf
            <fieldset>
               <div class="control-group">
                  <input type="text" placeholder="name" name="name" id="name" class="input-xlarge"/>
               </div>
               <div class="control-group">
                  <input type="text" placeholder="email" name="email" class="input-xlarge"/>
               </div>
               <div class="control-group">
                  <input type="text" placeholder="subject" name="subject" id="subject" class="input-xlarge"/>
               </div>
               <div class="control-group">
                  <textarea rows="3" id="textarea" name="message" class="input-xlarge"></textarea>
               </div>
               <button class="btn btn-large" type="submit">Send Messages</button>
            </fieldset>
         </form>
      </div>
   </div>
   <div class="row">
      <div class="span9">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3506.234116317245!2d77.42658411424479!3d28.502603182469183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce9abcc1b622f%3A0x35d3c1c8e7a144e0!2sGulshan%20Ikebana!5e0!3m2!1sen!2sin!4v1596600738446!5m2!1sen!2sin" width="900" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe><br />
         <small><a href="https://www.google.com/maps/place/Gulshan+Ikebana/@28.5026032,77.4265841,17z/data=!4m5!3m4!1s0x390ce9abcc1b622f:0x35d3c1c8e7a144e0!8m2!3d28.5026032!4d77.4287728" style="color:#0000FF;text-align:left">View Larger Map</a></small>
      </div>
   </div>
</div>
@endsection