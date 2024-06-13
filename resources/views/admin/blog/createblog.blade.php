@extends('admin.layouts.app')

@section('content')

<div class="page-wrapper">
	
	<!-- Bread crumb and right sidebar toggle -->
	
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-5 align-self-center">
				<h4 class="page-title">Create Blog</h4>
			</div>
			<div class="col-7 align-self-center">
				<div class="d-flex align-items-center justify-content-end">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="#">Home</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Basic Table</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">

		<!-- Start Page Content -->
		
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
					
						<form action="" method="POST">
							@csrf
							<div class="col-md-12">
								<label for="title"><h4>Title</h4></label>
								<input type="text" value="" name="title" class="form-control form-control-line"> <br> <br>
								@error('title')
								<span class="text-danger">{{ $message }}</span>
								@enderror <br> <br>
								

								<label for="image">Image</label>
								<input type="file" name="image" class="form-control-file"> <br> <br>
								

								

								<label for="description">Description</label>
								<textarea name="description" class="form-control form-control-line" id="editor" >{{ old('content') }}</textarea> <br> <br>
								

								<button type="submit" class="btn btn-success">Create Blog</button>

							</div>
						</form>
					</div>
					
				</div>
			</div>

			

		</div>
		
	</div>


	@endsection