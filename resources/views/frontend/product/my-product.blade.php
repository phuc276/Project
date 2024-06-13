@extends('frontend.layouts.app')

@section('content')
<section id="cart_items">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div class="table-responsive cart_info">
					@if(count($getProducts) > 0)
					<table class="table table-condensed">
						<thead>
							<tr class="cart_menu">
								<td class="price">ID</td>
								<td class="image">Name</td>
								<td class="description">Image</td>
								<td class="price">Price</td>
								<td class="total">Action</td>
							</tr>
						</thead>
						<tbody>
							@foreach ($getProducts as $product)
							<tr>
								<td class="cart_total">
									<h4>{{ $product->id }}</h4>
								</td>
								<td class="cart_description">
									<h4><a href="">{{ $product->name }}</a></h4>
									<p>Web ID: {{ $product->id }}</p>
								</td>
								<td class="cart_image">
									@php
									$images = json_decode($product->image);
									@endphp
									@if(count($images) > 0)
									<img src="{{ asset('upload/product/'. $images[0]) }}" alt="Product Image" style="height: 95px; width: 70px;">
									@else
									<p>No Image</p>
									@endif
								</td>
								<td class="cart_total">
									<p class="cart_total_price">{{ $product->price }}</p>
								</td>
								<td class="cart_total">
									<a class="cart_quantity_edit" href="{{ route('edit.product', ['id' => $product->id]) }}" style="padding-right: 15px;">
										<i class="fa fa-pencil"></i>
									</a>
									<a class="cart_quantity_delete" href="{{ route('delete.product', ['id' => $product->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?');">
										<i class="fa fa-trash-o"></i>
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else
					<div style="text-align: center;">
						<p>Không có mặt hàng nào.</p>
					</div>

					@endif
					<div class="row" >
						<div class="col-sm-offset-10">
							<a class="btn btn-default" href="{{ url('addproduct') }}" style="background: #FE980F; color: #fff;">ADD NEW</a>
						</div>
					</div> <br> 
				</div>

			</div>


		</div>

	

	</div>


</section>




@endsection