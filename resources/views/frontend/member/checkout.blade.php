@include('frontend.layouts.header')

@if (Auth::check())
<section id="cart_items">
	<div class="container">
		<form method="POST" action="">
			@csrf
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
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
						<input type="hidden" name="totalPrice" value="{{ $totalPrice }}">


						@endforeach
						@endforeach
						@else
						<tr>
							<td colspan="6">Không có sản phẩm nào trong giỏ hàng.</td>
						</tr>
						@endif
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>$0</td>
									</tr>
									<tr>
										<td>Exo Tax</td>
										<td>$0</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>${{$totalPrice ?? 0}}</span></td>
									</tr>
								</table>
							</td>

						</tr>

					</tbody>
				</table>
			</div>
			<div class="payment-options">
				<span>
					<label><input type="checkbox"> Direct Bank Transfer</label>
				</span>
				<span>
					<label><input type="checkbox"> Check Payment</label>
				</span>
				<span>
					<label><input type="checkbox"> Paypal</label>
				</span>
			</div>

			<div class="payment-options">
				<!-- Các phương thức thanh toán -->
				<button type="submit" class="btn btn-primary">Continue</button>
			</div>

		</form>
	</div>
</section> <!--/#cart_items-->
@else
<section id="form"  style="margin-top: -10px;"><!--form-->
	<div class="container" >
		<div class="row">
			<div class="col-sm-7 col-sm-offset-2" >
				<div class="signup-form"><!--sign up form-->
					@if(session('msg'))
					<div class="alert alert-success">
						{{ session('msg') }}
					</div>
					@endif
					
					@php 
					$array = session('arrayid') ; 
					$totalPrice = 0;
					@endphp

					{{-- Tính tổng giá của tất cả các sản phẩm --}}

					@if(session()->has('arrayid') && count($array) > 0)
					@foreach($array as $item)
					@foreach($item['data'] as $product)
					@php
					$totalPrice += $product->price * $item['quantity'];
					@endphp
					
					@endforeach
					@endforeach
					@endif
					{{--  --}}


					
					<h2>New User Signup!</h2>
					<form action="" method="POST" >
						@csrf
						<input type="text" name="name" placeholder="Name"/>
						@error('name')
						<p class="text-danger">{{ $message }}</p>
						@enderror

						<input type="text"	name="email" placeholder="Email Address"/>
						@error('email')
						<p class="text-danger">{{ $message }}</p>
						@enderror

						<input type="password" name="password" placeholder="Password"/>
						@error('password')
						<p class="text-danger">{{ $message }}</p>
						@enderror

						
						
						<input type="text" placeholder="Phone Number" name="phone">

						<textarea placeholder="Message"  name="message"></textarea>

						<input type="text" name="id_country" placeholder="Country" >


						<input type="text" name="level" value="0" style="display: none;">

						<label for="img" class="upload-label" style="color: #696763a8;"><i class="fa fa-hand-o-down" aria-hidden="true"></i> Set avatar</label>
						<input type="file" name="avatar" id="img" />

						<input type="hidden" name="totalPrice" value="{{ $totalPrice }}">


						<button type="submit" class="btn btn-default">Register</button>
					</form> <br>

				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section>
@endif


@include('frontend.layouts.footer')
