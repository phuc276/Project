@extends('frontend.layouts.app')

@section('content')
<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-5 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Login to your account</h2>			
					<form action="#" method="POST">
						@csrf

						<input type="email" name="email" placeholder="Email Address" />
						<input type="password" name="password" placeholder="Password" />

						<span>
							<input type="checkbox" name="remembe_me" class="checkbox" value="1"> 
							Keep me signed in
						</span>

						<button type="submit" style="margin-right: 10px;" class="btn btn-default">Login</button>		

					</form> <br>
					

					@if($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif

				</div><!--/login form-->
			</div>

		</div>
	</div>
</section><!--/form-->
@endsection