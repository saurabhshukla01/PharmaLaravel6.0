@extends('layouts.front_layout.front_layout')
@section('content')
<div class="span9">
	<ul class="breadcrumb">
		<li><a href="{{url('/')}}">Home</a> <span class="divider">/</span></li>
		<li class="active">Products Name</li>
	</ul>
	<h3> Products Name 
		<small class="pull-right">
			<?php echo $product_count;?> products are available 
		</small>
	</h3>
	<hr class="soft"/>
	<p>
		Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - that is why our goods are so popular and we have a great number of faithful customers all over the country.
	</p>
	<hr class="soft"/>
	<form class="form-horizontal span6">
		<div class="control-group">
			<label class="control-label alignL">Sort By </label>
			<select>
				<option>Priduct name A - Z</option>
				<option>Priduct name Z - A</option>
				<option>Priduct Stoke</option>
				<option>Price Lowest first</option>
			</select>
		</div>
	</form>
	
	<div id="myTab" class="pull-right">
		<a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
		<a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
	</div>
	<br class="clr"/>
	<div class="tab-content">
		<div class="tab-pane" id="listView">
			@foreach($products as $product)
				<div class="row">
					<div class="span2">
						<img src="{{ asset('images/product_images/small/'.$product->main_image) }}" alt=""/>
					</div>
					<div class="span4">
						<h3> New | Available </h3>
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
							
							<a href="{{ url('product_details/'.$product->id) }}" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
							<a href="{{ url('product_details/'.$product->id) }}" class="btn btn-large"><i class="icon-zoom-in"></i></a>
							
						</form>
					</div>
				</div>
				<hr class="soft"/>
			@endforeach

		</div>
		<div class="tab-pane  active" id="blockView">
			<ul class="thumbnails">
				@foreach($products as $product)
					<li class="span3">
						<div class="thumbnail">
							<a href="product_details/{{ $product->id }}"><img src="{{ asset('images/product_images/small/'.$product->main_image) }}" alt=""></a>
							<div class="caption">
								<h5>{{ $product->product_name }}</h5>
								<p>
									@if(!empty($product->description))
										<?php echo substr($product->description,0,25);?> ...
									@else
										It Is Good Product Please Visit ...
									@endif
								</p>
								<h4 style="text-align:center"><a class="btn" href="product_details/{{ $product->id }}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="{{ url('product_details/'.$product->id) }}">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary">Rs. {{ $product->product_price }}</a></h4>
							</div>
						</div>
					</li>
				@endforeach
			</ul>
			<hr class="soft"/>
		</div>
	</div>
	<a href="{{ url('compair') }}" class="btn btn-large pull-right">Compair Product</a>
	<div class="pagination">
		<ul>
			<li>{{ $products->links() }}</li>
		</ul>
	</div>
	<br class="clr"/>
</div>
@endsection