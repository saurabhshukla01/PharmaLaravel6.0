@extends('layouts.front_layout.front_layout')
@section('content')
<div class="span9">
   <ul class="breadcrumb">
      <li><a href="{{url('/')}}">Home</a> <span class="divider">/</span></li>
      <li><a href="{{ url('products') }}">Products</a> <span class="divider">/</span></li>
      <li class="active">product Details</li>
   </ul>
   @foreach($products as $product)
   <?php
      $product_name = $product->product_name;
      $product_color = $product->product_color;
      $product_code = $product->product_code;
      $product_price = $product->product_price;
      $product_discount = $product->product_discount;
      $product_weight = $product->product_weight;
      $product_video = $product->product_video;
      $main_image = $product->main_image;
      $description = $product->description;
      $wash_care = $product->wash_care;
      $fabric = $product->fabric;
      $pattern = $product->pattern;
      $sleeve = $product->sleeve;
      $fit = $product->fit;
      $occassion = $product->occassion;
      $meta_title = $product->meta_title;
      $meta_description = $product->meta_description;
      $meta_keywords = $product->meta_keywords;
      $is_featured = $product->is_featured;
      $product_category_name = $product->category->category_name;
      $product_section_name = $product->section->name;
      $product_brand_name = $product->brand->name;
      $attr_count = 0;
      foreach ($product->attributes as $key => $attribute) {
         $product_attr_size = $attribute->size;
         $product_attr_sku = $attribute->sku;
         $product_price = $attribute->price;
         $product_attr_stock = $attribute->stock;
         $attr_count++;
      }
      $img_count = 0;
      foreach ($product->images as $key => $image) {
         $product_alt_image = $image->image;
         $img_count++;
      }
      ?>
   @endforeach
   <div class="row">
      <div id="gallery" class="span3">
         <a href="{{ url('images/product_images/large/'.$main_image) }}" title="<?php echo $product_name; ?>">
         <img src="{{ asset('images/product_images/large/'.$main_image) }}" style="width:100%;" alt="<?php echo $product_name; ?>"/>
         </a>
         <div id="differentview" class="moreOptopm carousel slide">
            <div class="carousel-inner">
               <div class="item active">
                  @foreach($products as $product)
                  <?php $img_count = 0;?>
                  @foreach ($product->images as $key => $image)
                  @if(!empty($image->image))
                  <a href="{{ url('images/product_images/large/'.$image->image) }}"> <img style="width:25%" src="{{ asset('images/product_images/small/'.$image->image) }}" alt=""/></a>
                  @endif
                  <?php $img_count++;?>
                  @endforeach
                  @endforeach
               </div>
            </div>
            <!--
               <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
               <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
               -->
         </div>
         <div class="btn-toolbar">
            <div class="btn-group">
               <span class="btn"><i class="icon-envelope"></i></span>
               <span class="btn" ><i class="icon-print"></i></span>
               <span class="btn" ><i class="icon-zoom-in"></i></span>
               <span class="btn" ><i class="icon-star"></i></span>
               <span class="btn" ><i class=" icon-thumbs-up"></i></span>
               <span class="btn" ><i class="icon-thumbs-down"></i></span>
            </div>
         </div>
      </div>
      <div class="span6">
         <h3>{{ $product_name }}</h3>
         <small>Brand : {{ $product_brand_name }}</small>
         <hr class="soft"/>

         <form class="form-horizontal qtyFrm" id="qtyFrm">
            <div class="control-group">

               <strong id="getStock"><span style="text-decoration: line-through;color:red;">No Items in Stock</span></strong>

               <h4 id="getPrice"><span style="text-decoration: line-through;color:red;"> Rs. {{ $product->product_price }} </span></h4>

               <!-- Use script in front.js file code and Ajax -->
               <select class="span2 pull-left" name="size" id="selSize">
                  <option value="">Select Size</option>
                  @foreach ($product->attributes as $key => $attribute)
                     <option value="{{ $product->id }}-{{ $attribute->size }}">{{ $attribute->size }}</option>
                  @endforeach
               </select>
               <input type="number" class="span1" name="qlt" placeholder="Qty."/>
               <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
            </div>
               <!--
               <small style="text-decoration: line-through;color:red;"> No items in stock</small>
               <h4 style="text-decoration: line-through;color:red;">Rs. {{ $product->product_price }}</h4>
               -->
      </div>
      </form>

      <hr class="soft clr"/>
      <p class="span6">
         <strong> Product Description : </strong> 
         @if(!empty($description))
         {{ $description }}
         @else
         It Is Good Product Please Visit One Time In This site # Eshop Adv.
         @endif
      </p>
      <a class="btn btn-small pull-right" href="#detail">More Details</a>
      <br class="clr"/>
      <a href="#" name="detail"></a>
      <hr class="soft"/>
   </div>
   <div class="span9">
      <ul id="productDetail" class="nav nav-tabs">
         <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
         <li><a href="#profile" data-toggle="tab">Related Products</a></li>
      </ul>
      <div id="myTabContent" class="tab-content">
         <div class="tab-pane fade active in" id="home">
            <h4>Product Information</h4>
            <table class="table table-bordered">
               <tbody>
                  <tr class="techSpecRow">
                     <th colspan="2">Product Details</th>
                  </tr>
                  <tr class="techSpecRow">
                     <td class="techSpecTD1">Product Brand: </td>
                     <td class="techSpecTD2">{{ $product_brand_name }}</td>
                  </tr>
                  <tr class="techSpecRow">
                     <td class="techSpecTD1">Product Code:</td>
                     <td class="techSpecTD2">{{ $product_code }}</td>
                  </tr>
                  <tr class="techSpecRow">
                     <td class="techSpecTD1">Product Color:</td>
                     <td class="techSpecTD2">{{ $product_color }}</td>
                  </tr>
                  <tr class="techSpecRow">
                     <td class="techSpecTD1">Fabric:</td>
                     <td class="techSpecTD2">{{ $fabric }}</td>
                  </tr>
                  <tr class="techSpecRow">
                     <td class="techSpecTD1">Pattern:</td>
                     <td class="techSpecTD2">{{ $pattern }}</td>
                  </tr>
                  <tr class="techSpecRow">
                     <td class="techSpecTD1">Sleeve:</td>
                     <td class="techSpecTD2">{{ $sleeve }}</td>
                  </tr>
                  <tr class="techSpecRow">
                     <td class="techSpecTD1">Fit:</td>
                     <td class="techSpecTD2">{{ $fit }}</td>
                  </tr>
                  <tr class="techSpecRow">
                     <td class="techSpecTD1">Occassion:</td>
                     <td class="techSpecTD2">{{ $occassion }}</td>
                  </tr>
               </tbody>
            </table>
            <h5>Washcare</h5>
            <p>
               @if(!empty($wash_care))
               {{ $wash_care }}
               @else
               It is soft washing to care it. It is skilly product.
               @endif
            </p>
            <h5>Disclaimer</h5>
            <p>
               There may be a slight color variation between the image shown and original product.
            </p>
         </div>
         <div class="tab-pane fade" id="profile">
            <div id="myTab" class="pull-right">
               <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
               <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
            </div>
            <br class="clr"/>
            <hr class="soft"/>
            <div class="tab-content">
               <div class="tab-pane" id="listView">
                  @foreach($products as $product)
                     <div class="row">
                        <div class="span2">
                           <img src="{{ asset('images/product_images/small/'.$product->main_image) }}" alt=""/>
                        </div>
                        <div class="span4">
                           <h3>New | Available</h3>
                           <hr class="soft"/>
                           <h5>{{ $product->product_name }} </h5>
                           <p>
                              {{ $product->description }}
                           </p>
                           <a class="btn btn-small pull-right" href="{{ url('product_details/'.$product->id) }}">View Details</a>
                           <br class="clr"/>
                        </div>
                        <div class="span3 alignR">
                           <form class="form-horizontal qtyFrm">
                              <h3> Rs. {{ $product->product_price }}</h3>
                              <label class="checkbox">
                              <input type="checkbox">  Adds product to compair
                              </label><br/>
                              <div class="btn-group">
                                 <a href="#" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                 <a href="#" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                              </div>
                           </form>
                        </div>
                     </div>
                     <hr class="soft"/>
                  @endforeach
               </div>
               <div class="tab-pane active" id="blockView">
                  <ul class="thumbnails">
                     @foreach($products as $product)
                     <li class="span3">
                        <div class="thumbnail">
                           <a href="{{ url('product_details/'.$product->id) }}"><img src="{{ asset('images/product_images/small/'.$product->main_image) }}" alt=""/></a>
                           <div class="caption">
                              <h5>{{ $product->product_name }}</h5>
                              <p>
                                 <?php echo substr($product->description,0,25);?> ...
                              </p>
                              <h4 style="text-align:center"><a class="btn" href="{{ url('product_details/'.$product->id) }}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">Rs. {{ $product->product_price }}</a></h4>
                           </div>
                        </div>
                     </li>
                     @endforeach
                  </ul>
                  <hr class="soft"/>
               </div>
            </div>
            <br class="clr">
         </div>
      </div>
   </div>
</div>
</div>
@endsection
      