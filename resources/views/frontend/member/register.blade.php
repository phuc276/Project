@extends('frontend.layouts.app')

@section('content')
<section id="form"  style="margin-top: -10px;"><!--form-->
	<div class="container" >
		<div class="row">
			<div class="col-sm-6 " >
				<div class="signup-form"><!--sign up form-->
					@if(session('msg'))
					<div class="alert alert-success">
						{{ session('msg') }}
					</div>
					@endif
					

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

	


						<button type="submit" class="btn btn-default">Register</button>
					</form> <br>

				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section>


@endsection