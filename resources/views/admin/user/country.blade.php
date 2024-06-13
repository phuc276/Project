@extends('admin.layouts.app')

@section('content')

<div class="page-wrapper">
	
	<!-- Bread crumb and right sidebar toggle -->


	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-5 align-self-center">
				<h4 class="page-title">Basic Table</h4>
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
						<h4 class="card-title">Default Table</h4>
						<h6 class="card-subtitle">Using the most basic table markup, here’s how <code>.table</code>-based tables look in Bootstrap. All table styles are inherited in Bootstrap 4, meaning any nested tables will be styled in the same manner as the parent.</h6>
						<h6 class="card-title m-t-40"><i class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Table With Outside Padding</h6>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Title</th>
										<th scope="col">Action</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($country as $item)
									<tr>
										<td>{{ $item->id }}</td>
										<td>{{ $item->title }}</td>
										<td>
											<a href="">
												<i class="mdi mdi-wrench"></i>
												<span class="hide-menu">Edit</span>
											</a>
											<br>

											<a href="{{ route('delete.country', ['id' => $item->id]) }}" onclick="return confirm('Bạn có chắc muốn xóa bài viết này không?')">
												<i class="mdi mdi-delete-variant"></i>
												<span class="hide-menu">Delete</span>
											</a>
											

										</td>
									</tr>
									@endforeach
									
								</tbody>
							</table>
						</div>
						<h6 class="card-title"><i class="m-r-5 font-18 mdi mdi-numeric-2-box-multiple-outline"></i> Table Without Outside Padding</h6>

						<button type="button"  class="btn btn-success">
							<a href="{{ url('addcountry') }}" style="color: white;" >Add Country</a>
						</button>
					</div>
					
				</div>
			</div>	
		</div>
	</div>






</div>
@endsection
