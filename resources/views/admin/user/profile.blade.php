@extends('admin.layouts.app')

@section('content')


<div class="page-wrapper">
	
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-5 align-self-center">
				<h4 class="page-title">Profile</h4>
			</div>
			<div class="col-7 align-self-center">
				<div class="d-flex align-items-center justify-content-end">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="#">Home</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Profile</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		{{-- @foreach($users as $data) --}}

		<!-- Row -->
		<div class="row">
			<!-- Column -->
			<div class="col-lg-4 col-xlg-3 col-md-5">
				<div class="card">
					<div class="card-body">
						<center class="m-t-30">

							<img src="{{ asset('upload/user/avatar/' . Auth::user()->avatar) }}" style="max-width: 100px; max-height: 100px;" class="rounded-circle" width="150" />
							<h4 class="card-title m-t-10">{{ Auth::user()->name }}</h4>
							<h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
							<div class="row text-center justify-content-md-center">
								<div class="col-4">
									<a href="javascript:void(0)" class="link">
										<i class="icon-people"></i> <font class="font-medium">254</font>
									</a>
								</div>
								<div class="col-4">
									<a href="javascript:void(0)" class="link">
										<i class="icon-picture"></i> <font class="font-medium">54</font>
									</a>
								</div>
							</div>
						</center>
					</div>
					<div>
						<hr> </div>
						<div class="card-body">
							<small class="text-muted">Email address </small>
							<h6>{{ Auth::user()->email }}</h6>
							<small class="text-muted p-t-30 db">Phone</small>
							<h6></h6>
							<small class="text-muted p-t-30 db">Address</small>
							<h6></h6>
							<div class="map-box">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
							<small class="text-muted p-t-30 db">Social Profile</small>
							<br/>
							<button class="btn btn-circle btn-secondary"><i class="mdi mdi-facebook"></i></button>
							<button class="btn btn-circle btn-secondary"><i class="mdi mdi-twitter"></i></button>
							<button class="btn btn-circle btn-secondary"><i class="mdi mdi-youtube-play"></i></button>
						</div>
					</div>
				</div>
				<!--End Column -->


				<!-- Column -->
				<div class="col-lg-8 col-xlg-9 col-md-7">
					<div class="card">
						<div class="card-body">


							<form class="form-horizontal form-material" method="POST" action="" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<label class="col-md-12">Full Name</label>
									<div class="col-md-12">
										<input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control form-control-line">
										@error('name')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="form-group">
									<label for="example-email" class="col-md-12">Email</label>
									<div class="col-md-12">
										<input type="email" disabled value="{{ Auth::user()->email }}" name="email" class="form-control form-control-line" id="example-email">

									</div>
									<div class="form-group">
										<label class="col-md-12">Password</label>
										<div class="col-md-12">
											<input type="password" value="" placeholder="******" name="password" class="form-control form-control-line">
											@error('password')
											<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-12">Phone Number</label>
										<div class="col-md-12">
											<input type="text" value="{{ Auth::user()->phone }}" name="phone" class="form-control form-control-line">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-12">Message</label>
										<div class="col-md-12">
											<textarea rows="5" name="message" class="form-control form-control-line">{{ Auth::user()->message }}</textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-12">Select Country</label>
										<div class="col-sm-12">
											<select class="form-control form-control-line" name="id_country">
												@foreach ($blogs as $blog)
												<option value="{{ $blog->title }}">{{ $blog->title }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<input type="file" name="avatar" class="form-control-file">
											@error('avatar')
											<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-12">
											<button type="submit" name="update" class="btn btn-success">Update Profile</button>
										</div>
									</div>
								</form>


							</div>
						</div>
					</div>
					<!--End Column -->


				</div>
				{{-- @endforeach --}}

			</div>

		</div>


		@endsection