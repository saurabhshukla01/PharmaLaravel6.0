@extends('layouts.front_layout.front_layout')
@section('content')
<div class="span9">
   <h4>
      <a class="btn btn-medium" href="{{ url('featured_products') }}"><i class="icon-list"></i></a>&nbsp;
      Featured Products <span style="color:red">*</span> <span class="pull-right"><strong><?php echo $featured_products_count; ?> &nbsp; featured products</strong></span>
   </h4>
   <ul class="thumbnails">
      @foreach($featured_products as $featured_product)
      <li class="span3">
         <div class="thumbnail">
            <a  href="{{ url('product_details/'.$featured_product->id) }}"><img src="{{ asset('images/product_images/small/'.$featured_product->main_image) }}" alt=""/></a>
            <div class="caption">
               <h5>{{ $featured_product->product_name }}</h5>
               <p>
                  @if(!empty($featured_product->description))
                  <?php echo substr($featured_product->description,0,25);?> ...
                  @else
                  It Is Good Product Please Visit ...
                  @endif
               </p>
               <h4 style="text-align:center"><a class="btn" href="{{ url('product_details/'.$featured_product->id) }}"> <i class="icon-zoom-in"></i></a> <a class="btn">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">Rs. {{ $featured_product->product_price }}</a></h4>
            </div>
         </div>
      </li>
      @endforeach
   </ul>
   <hr>
   <h4>Latest Products </h4>
   <ul class="thumbnails">
      @foreach($latest_products as $latest_product)
      <li class="span3">
         <div class="thumbnail">
            <a  href="{{ url('product_details/'.$latest_product->id) }}"><img src="{{ asset('images/product_images/small/'.$latest_product->main_image) }}" alt=""/></a>
            <div class="caption">
               <h5>{{ $latest_product->product_name }}</h5>
               <p>
                  @if(!empty($latest_product->description))
                  <?php echo substr($latest_product->description,0,25);?> ...
                  @else
                  It Is Good Product Please Visit ...
                  @endif
               </p>
               <h4 style="text-align:center"><a class="btn" href="{{ url('product_details/'.$latest_product->id) }}"> <i class="icon-zoom-in"></i></a> <a class="btn">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary">Rs. {{ $latest_product->product_price }}</a></h4>
            </div>
         </div>
      </li>
      @endforeach
   </ul>
</div>
@endsection