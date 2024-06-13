@extends('frontend.layouts.app')

@section('content')
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Shopping Cart</li>
			</ol>
		</div>

		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Product</td>
						<td class="description"></td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>	

					@dump(Session('arrayid'))

					{{-- @php $array = session('arrayid') @endphp --}}

					@php 
					$array = session('arrayid') ; 
					$totalPrice = 0;
					@endphp

					@if(session()->has('arrayid') && count($array) > 0)
					@foreach($array as $item)
					@foreach($item['data'] as $product)
					<tr>
						<td class="cart_product">
							<a href="#"><img src="{{ asset('frontend/images/cart/one.png') }}" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="#">{{ $product->name }}</a></h4>
							<p>Web ID: {{ $product->id }}</p>

						</td>
						<td class="cart_price">
							<p>${{ $product->price }}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<a class="cart_quantity_up" id="{{ $item['id'] }}" href="#"> + </a>
								<input class="cart_quantity_input" id="quantity_input_{{ $item['id'] }}" type="text" name="quantity" value="{{ $item['quantity'] }}" autocomplete="off" size="2">
								<a class="cart_quantity_down" id="{{ $item['id'] }}" href="#"> - </a>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">${{ $product->price * $item['quantity']}}</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" id="{{ $item['id'] }}" href="#"><i class="fa fa-times"></i></a>
						</td>
					</tr>

					@php
	        	// Tính tổng giá của tất cả các sản phẩm
					$totalPrice += $product->price * $item['quantity'];
					@endphp


					@endforeach
					@endforeach
					@else
					<tr>
						<td colspan="6">Không có sản phẩm nào trong giỏ hàng.</td>
					</tr>
					@endif


				</tbody>
			</table>

		</div>
	</div>
</section> <!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="chose_area">
					<ul class="user_option">
						<li>
							<input type="checkbox">
							<label>Use Coupon Code</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Use Gift Voucher</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Estimate Shipping & Taxes</label>
						</li>
					</ul>
					<ul class="user_info">
						<li class="single_field">
							<label>Country:</label>
							<select>
								<option>United States</option>
								<option>Bangladesh</option>
								<option>UK</option>
								<option>India</option>
								<option>Pakistan</option>
								<option>Ucrane</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>

						</li>
						<li class="single_field">
							<label>Region / State:</label>
							<select>
								<option>Select</option>
								<option>Dhaka</option>
								<option>London</option>
								<option>Dillih</option>
								<option>Lahore</option>
								<option>Alaska</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>

						</li>
						<li class="single_field zip-field">
							<label>Zip Code:</label>
							<input type="text">
						</li>
					</ul>
					<a class="btn btn-default update" href="">Get Quotes</a>
					<a class="btn btn-default check_out" href="">Continue</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Cart Sub Total <span>$0</span></li>
						<li>Eco Tax <span>$0</span></li>
						<li>Shipping Cost <span>Free</span></li>
						<li id="total-cart">Total <span>${{ $totalPrice }}</span></li>
					</ul>
					<a class="btn btn-default update" href="">Update</a>
					<a class="btn btn-default check_out" href="{{url('user/checkout')}}">Check Out</a>
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->
<script>
	$(document).ready(function() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('.cart_quantity_up').click(function(e) {
			e.preventDefault();

			var productId = $(this).attr('id');
			var input = $('#quantity_input_' + productId);
			var getQuantity = parseInt(input.val());


			var newQuantity = getQuantity + 1;
			input.val(newQuantity);


			// so luong * gia
			var pricetotal = $(this).closest('tr').find('.cart_total_price');

			var price = $(this).closest('tr').find('.cart_price').text().trim();
			var numericPrice = parseFloat(price.substring(1)); // loai bo ky tu $

			pricetotal.text('$'+ newQuantity*numericPrice);


			// tat ca
			var total = 0;
			$('.cart_total_price').each(function() {
		      	var priceText = $(this).text().trim(); // lấy giá và loại bỏ ký tự '$'
		      	var price = parseFloat(priceText.substring(1));
		      	total += price;
		      });

	    // Cập nhật giá của checkout
			$('#total-cart span').text('$' + total); 

			

			$.ajax({
				type: 'POST',
				url: '{{ url('user/ajax/post') }}',
				data: {
					id: productId,
					quantity: newQuantity
				},
				success: function(data) {
					// console.log(data.success);
				}
			});
		});

		$('.cart_quantity_down').click(function(e) {
			e.preventDefault();

			var productId = $(this).attr('id');
			var input = $('#quantity_input_' + productId);
			var getQuantity = parseInt(input.val());

			if (getQuantity >= 1) {
				var newQuantity = getQuantity - 1;
				input.val(newQuantity);
			}  

			if (newQuantity <1 ) {
				$(this).closest("tr").remove();

			}

			if ($('.cart_quantity_input').length == 0) {
                    // Nếu không có sản phẩm nào
				$('tbody').append('<tr><td colspan="6">Không có sản phẩm nào trong giỏ hàng.</td></tr>');
			}

			// so luong * gia
			var pricetotal = $(this).closest('tr').find('.cart_total_price');
			var price = $(this).closest('tr').find('.cart_price').text().trim();
			var numericPrice = parseFloat(price.substring(1)); // loai bo ky tu $


			pricetotal.text('$'+ newQuantity*numericPrice); // update tong gia


			// tat ca

			var total = 0;
			$('.cart_total_price').each(function() {
		      	var priceText = $(this).text().trim(); // lấy giá và loại bỏ ký tự '$'
		      	var price = parseFloat(priceText.substring(1));
		      	total += price;
		      });

	    // Cập nhật giá của checkout
			$('#total-cart span').text('$' + total); 
			

			$.ajax({
				type: 'POST',
				url: '{{ url('user/ajax/post') }}',
				data: {
					id: productId,
					quantity: newQuantity
				},
				success: function(data) {
					// console.log(data.success);
				}
			});
		});

		$('.cart_quantity_delete').on('click', function(e) {
			e.preventDefault();
			var productId = $(this).attr('id');

			quantity = 0;


			$(this).closest("tr").remove();

			if ($('.cart_quantity_input').length == 0) {
                    // Nếu không có sản phẩm nào
				$('tbody').append('<tr><td colspan="6">Không có sản phẩm nào trong giỏ hàng.</td></tr>');
			}


			$.ajax({
				type: 'POST',
				url: '{{ url('user/ajax/post') }}',
				data: {
					id: productId,
					quantity: quantity
				},
				success: function(response) {
					
				}
			});
			
		});

		



	});
</script>



@endsection

