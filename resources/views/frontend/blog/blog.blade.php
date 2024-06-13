@extends('frontend.layouts.app')

@section('content')

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div class="blog-post-area">

					<h2 class="title text-center">Latest From our Blog</h2>

					@foreach($blogshop as $blog)


					<div class="single-blog-post">
						<h4>{{ $blog->title }}</h4> 

						<div class="post-meta">
							<ul>
								<li><i class="fa fa-user"></i> Mac Doe</li>
								<li><i class="fa fa-clock-o"></i> {{ $blog->created_at->format('g:i a') }}</li>
								<li><i class="fa fa-calendar"></i>{{ $blog->created_at->format('M d, Y') }}</li>
							</ul>
							<span>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
							</span>
						</div>
						<a href="" >
							<img src="{{ asset('frontend/images/blog/' . $blog->image) }}" alt="">
						</a>
						
						<p>{!! Str::limit($blog->description, 150, '...') !!}</p>

						<a  class="btn btn-primary" href="{{ route('blog.detail', ['id' => $blog->id]) }}">Read More</a> <br>  <br>
					</div>
					@endforeach

					{!! $blogshop->links() !!}


				</div>
			</div>
		</div>
		
	</section>


	@endsection


