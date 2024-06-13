@extends('frontend.layouts.app')

@section('content')

<section>
	<div class="container">
		<div class="row">
			
			<div class="col-sm-9">
				<div class="blog-post-area">
					<h2 class="title text-center">New Product</h2>
					<div class="signup-form"><!--sign up form-->
						<h2>Create Product !</h2>
						<form action="" method="POST" enctype="multipart/form-data">
							@csrf
							<input type="text" placeholder="Name" name="name" value=""/>
							<input type="number" placeholder="Price" name="price" value=""/>
							


							<select name="id_category" placeholder="Please choose category">
								<option value="" disabled selected hidden>Please choose category</option>
								<option value="T-Shirt">T-Shirt</option>
								<option value="short">Short</option>
								<option value="jean">Jeans</option>

							</select>

							<select name="id_brand"  placeholder="Please choose brand">
								<option value="" disabled selected hidden>Please choose brand</option>
								<option value="Nike">Nike</option>
								<option value="Adidas">Adidas</option>
							</select>

							
							<select name="sale" id="sale">
								<option value="0">New</option>
								<option value="1">Sale</option>
							</select>
							<div id="salePriceField" style="display: none;">
								<div class="input-group">
									<input type="number" name="sale" id="sales" min="0" step="5"> 
									<p>%</p>
								</div>
							</div>

							<input type="text" placeholder="Company profile" name="company" />


							<input type="file" name="image[]" multiple >
							@error('image')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
							<textarea placeholder="Detail" name="detail"></textarea>



							<button type="submit" name="creat" class="btn btn-default">Creat</button>
						</form> <br>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function() {
		$('#sale').change(function() {
			if ($(this).val() === '1') {
				$('#salePriceField').show();
			} else {
				$('#salePriceField').hide();
				$('#sales').val("0");
			}
		});
	});
</script>



@endsection

