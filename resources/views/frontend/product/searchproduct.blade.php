@include('frontend.layouts.header')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Search</li>
			</ol>
		</div>

		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Product</td>
						<td class="description">Name</td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td></td>
					</tr>
				</thead>
				<tbody>	

					@foreach($products as $product)
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
						<td class="cart_price">
							<p> 99</p>
						</td>
				
					</tr>
					@endforeach


				</tbody>
			</table>

		</div>
	</div>
</section>


@include('frontend.layouts.footer')
