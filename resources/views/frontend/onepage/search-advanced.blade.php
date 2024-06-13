
@extends('frontend.layouts.app')

@section('slide')
<section id="advertisement">
	<div class="container">
		<img src="{{ asset('frontend/images/shop/advertisement.jpg') }}" alt="" />
	</div>
</section>
@endsection

@section('content')
<section>
	<div class="container">
		<form action="{{ route('search') }}" method="GET">
			@csrf
			<div class="row" style="display: flex; justify-content-between;">
				<div class="col-md-2" style="margin-right: -15px; margin-left: -10px;">
					<input style="height: 29px; border: none; background: #F0F0E9;" type="text" placeholder="Name" name="name">
				</div>
				<div class="col-md-2" style="margin-right: -15px; margin-left: -10px;">
					<select name="price" id="">
						<option value="">Choose Price</option>
						<option value="0-1000">0-1000</option>
						<option value="1000-2000">1000-2000</option>
					</select>

				</div>
				<div class="col-md-2" style="margin-right: -15px; margin-left: -10px;">
					<select name="id_category" id="">
						<option value="">Category</option>
						<option value="T-Shirt">T-shirt</option>
						<option value="short">Short</option>

					</select>
				</div>
				<div class="col-md-2" style="margin-right: -15px; margin-left: -10px;">
					<select name="id_brand" id="">
						<option value="">Brand</option>
						<option value="nike">Nike</option>
						<option value="adidas">Adidas</option>

					</select>
				</div>
				<div class="col-md-2" style="margin-left: -10px;">
					<select name="status" id="">
						<option value="">Status</option>
						<option value="1">New</option>
						<option value="0">Like New</option>

					</select>
				</div>
			</div> 
			<div class="row" style="margin-left: -20px;">
				<button class="btn btn-default check_out" type="submit">Search</button>
			</div>
		</form>
		
		{{-- end form --}}
		<div class="row">
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Features Items</h2>
					@if(isset($products) && $products->count() > 0)
					@foreach ($products as $product)
					@php
					$images = json_decode($product->image);
					@endphp
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{ asset('upload/product/' .  $images[0])  }}" alt="{{ $product->name }}" />
									<h2>${{ $product->price }}</h2>
									<p>{{ $product->name }}</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
								<div class="product-overlay">
									<div class="overlay-content">
										<h2>${{ $product->price }}</h2>
										<p>{{ $product->name }}</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
								</div>
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
									<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
								</ul>
							</div>
						</div>
					</div>
					@endforeach
				
					<div class="col-sm-12">
						{{ $products->appends(request()->query())->links() }}
					</div>

					@else
					<p>Không có sản phẩm nào được tìm thấy.</p>
					@endif

				</div><!--features_items-->
			</div>
		</div>
	</div>
</section>
@endsection




