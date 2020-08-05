@extends('layouts.front_layout.front_layout')
@section('content')
   <div class="span9">
   <ul class="breadcrumb">
      <li><a href="{{ url('/') }}">Home</a> <span class="divider">/</span></li>
      <li class="active">Products Comparison</li>
   </ul>
   <h3> Products Comparison <small class="pull-right"> 2 products are compaired </small></h3>
   <hr class="soft"/>
   <table id="compairTbl" class="table table-bordered">
      <thead>
         <tr>
            <th>Features</th>
            <th>Product1 name here </th>
            <th>Product2 name here</th>
         </tr>
      </thead>
      <tbody>
         <tr>
            <td>&nbsp;</td>
            <td style="text-align:center">
               <p class="justify">
                  Plain Polo T-Shirt Features a Short Sleeve with cuffs for more professional look, made with Anti-Microbial, Anti-Static Fabric for all day usage and the fabric is so soft to feel comfortable.
               </p>
               <img src="themes/images/products/1.jpg" alt=""/>
               <form class="form-horizontal qtyFrm">
                  <h3> Rs.1000</h3><br/>
                  <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                  <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
               </form>
            </td>
            <td>
               <p class="justify">
                  Our Blue Casual Polo T-Shirt has a simple yet sophisticated design which makes it perfect for all outings, starting from regular morning jogs to casual outings and night walks. Coming to the functionality part, it's antimicrobial, breathable and moisture-wicking features make it an essential wardrobe staple!
               </p>
               <img src="themes/images/products/3.jpg" alt=""/>
               
               <form class="form-horizontal qtyFrm">
                  <h3> Rs.1000</h3>
                  <br/>
                  <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                  <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
               </form>
            </td>
         </tr>
         <tr>
            <td>Color</td>
            <td>Black</td>
            <td>Blue</td>
         </tr>
         <tr>
            <td>Fabric</td>
            <td>Polyester</td>
            <td>Cotton</td>
         </tr>
         <tr>
            <td>Sleeve</td>
            <td>Half Sleeve</td>
            <td>Full Sleeve</td>
         </tr>
         <tr>
            <td>Pattern</td>
            <td>Plain</td>
            <td>Plain"</td>
         </tr>
         <tr>
            <td>Weight</td>
            <td>0.5kg</td>
            <td>0.5kg</td>
         </tr>
      </tbody>
   </table>
   <a href="{{ url('products') }}" class="btn btn-large pull-right">Back Products Page</a>  
</div>
@endsection
      