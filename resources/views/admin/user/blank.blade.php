@extends('admin.layouts.app')

@section('content')


<div class="page-wrapper">
	<div class="btn-group dropend">
		<button type="button" class="btn btn-secondary">
			Split dropend
		</button>
		<button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
			<span class="visually-hidden">Toggle Dropend</span>
		</button>
		<ul class="dropdown-menu">
			<li><a class="dropdown-item" href="#">Action</a></li>
			<li><a class="dropdown-item" href="#">Another action</a></li>
			<li><a class="dropdown-item" href="#">Something else here</a></li>  </ul>
		</div>


		<!-- Bread crumb and right sidebar toggle -->
		<div class="page-breadcrumb">
			<div class="row">
				<div class="col-5 align-self-center">
					<h4 class="page-title">Starter Page</h4>
				</div>
				<div class="col-7 align-self-center">
					<div class="d-flex align-items-center justify-content-end">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="#">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Starter Page</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<!-- Start Page Content -->
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							This is some text within a card block.
						</div>
					</div>
				</div>
			</div>
		</div>

		
	</div>


	@endsection
