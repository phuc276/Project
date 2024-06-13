@extends('frontend.layouts.app')

@section('content')

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div class="blog-post-area">
					<h2 class="title text-center">Update user</h2>
					<div class="signup-form"><!--sign up form-->
						<h2> User !</h2>
						<form action="" method="POST" enctype="multipart/form-data">
							@csrf
							<input type="text" placeholder="Name" name="name" value="{{old('name') ?? Auth::user()->name }}"/>
							<input type="email" placeholder="Email Address" name="email" value="{{ Auth::user()->email }}"/>
							<input type="password" placeholder="******" name="password"  />
							<input type="text" placeholder="Message" name="message" value="{{ Auth::user()->message }}"/>
							<input type="text" placeholder="Country" name="id_country" value="{{ Auth::user()->id_country }}"/>
							<input type="text" placeholder="Phone Number" name="phone" value="{{ Auth::user()->phone }}"/>

							<input type="file" name="avatar"  />


							<button type="submit" name="update" class="btn btn-default">Update</button>
						</form> <br>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection
