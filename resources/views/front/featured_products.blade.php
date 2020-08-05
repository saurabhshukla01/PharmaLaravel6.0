@extends('layouts.front_layout.front_layout')
@section('content')
<div class="span9">
      <h4>Featured Products <span style="color:red">*</span> <small class="pull-right"><strong><?php echo $featured_products_count; ?></strong>&nbsp; featured products</small></h4>
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
                  <h4 style="text-align:center"><a class="btn" href="{{ url('product_details/'.$featured_product->id) }}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">Rs. {{ $featured_product->product_price }}</a></h4>
               </div>
            </div>
         </li>
      @endforeach
   </ul>
</div>
@endsection
