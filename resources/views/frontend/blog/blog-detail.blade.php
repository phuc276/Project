@extends('frontend.layouts.app')




@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<div class="blog-post-area">


					<h2 class="title text-center">Latest From our Blog</h2>
					<div class="single-blog-post">
						<h3>{{ $blogDetail->title }}</h3>
						<div class="post-meta">
							<ul>
								<li><i class="fa fa-user"></i> Mac Doe</li>
								<li><i class="fa fa-clock-o"></i>{{ $blogDetail->created_at->format('g:i a') }}</li>
								<li><i class="fa fa-calendar"></i>{{ $blogDetail->created_at->format('M d, Y') }}</li>
							</ul>
							
						</div>
						<a href="">
							<img src="{{ asset('frontend/images/blog/' . $blogDetail->image) }}" alt="">
						</a>
						<p>{!! ($blogDetail->description) !!}</p> <br> <br>
						<div class="rate">
							<div class="vote">
								<div class="star_1 ratings_stars"><input value="1" type="hidden"></div>
								<div class="star_2 ratings_stars"><input value="2" type="hidden"></div>
								<div class="star_3 ratings_stars"><input value="3" type="hidden"></div>
								<div class="star_4 ratings_stars"><input value="4" type="hidden"></div>
								<div class="star_5 ratings_stars"><input value="5" type="hidden"></div>
								<span class="rate-np">5</span>
							</div> 
						</div>

						<div class="pager-area">
							<ul class="pager pull-right">
								@if($prevBlog)
								<li><a href="{{ route('blog.detail', ['id' => $prevBlog->id]) }}">Prev</a></li>
								@endif


								@if($nextBlog)
								<li><a href="{{ route('blog.detail', ['id' => $nextBlog->id]) }}">Next</a></li>
								@endif
							</ul>
						</div>

					</div>
				</div><!--/blog-post-area-->


				<div class="rating-area">

					<ul class="ratings">

						<li class="rate-this">Rate this item:</li>
						<li>
							@php
							$rating = ($y != 0) ? round($x[0]->tong_rate / $y) : 0;
							$maxstars = 5;	
							@endphp


							@for ($i = 1; $i <= $maxstars; $i++)

							@php
							$class = ($i <= $rating) ? 'color' : '';
							@endphp

							<i class="fa fa-star {{ $class }}"></i>
							@endfor
						</li>


						@if(isset($x[0]) && $y > 0)
						<li class="color">({{ $rating }} Star)</li>
						@else
						<li class="color">(0 Vote)</li>
						@endif



					</ul>
					<ul class="tag">
						<li>TAG:</li>
						<li><a class="color" href="">Pink <span>/</span></a></li>
						<li><a class="color" href="">T-Shirt <span>/</span></a></li>
						<li><a class="color" href="">Girls</a></li>
					</ul>
				</div><!--/rating-area-->

				<div class="socials-share">
					<a href=""><img src="{{ asset('frontend/images/blog/socials.png')  }} "alt=""></a>
				</div><!--/socials-share-->

				<div class="response-area">
					<h2>{{ count($comments) }} RESPONSES</h2>
					<ul class="media-list">

						@foreach ($comments as $cha)
						@if ($cha->level == 0)

						<li class="media">
							<a class="pull-left" href="#">
								<img class="media-object" src="{{ asset('frontend/images/blog/man-two.jpg') }}" alt="">
							</a>
							<div class="media-body">
								<ul class="sinlge-post-meta">
									<li><i class="fa fa-user"></i>{{ $cha->name }}</li>
									<li><i class="fa fa-clock-o"></i>{{ $cha->created_at->format('h:i a') }}</li>
									<li><i class="fa fa-calendar"></i>{{ $cha->created_at->format('M d, Y') }}</li>
								</ul>

								<p>{{ $cha->cmt }}</p>
								<a class="btn btn-primary reply-btn" data-target="comment-textarea" id="{{ $cha->id }}" href="#"><i class="fa fa-reply"></i> Replay</a>


								<div class="comment-form" style="display: none;">
									<form action="{{ route('blog.detail.post', ['id' => $blogDetail->id]) }}" method="POST">
										@csrf
										<textarea name="cmt" cols="30" rows="2"></textarea>

										<input type="text" hidden name="idblog" value="{{ $blogDetail->id }}">

										<input type="text" hidden name="level" value="{{ $cha->id }}">

										<button class="btn btn-primary" type="submit"> Replay</button>

									</form>
								</div>

							</div>
						</li>
						@foreach ($comments as $con)
						@if ($con->level == $cha->id)
						<li class="media second-media">
							<a class="pull-left" href="#">
								<img class="media-object" src="{{ asset('frontend/images/blog/man-three.jpg') }}" alt="">
							</a>
							<div class="media-body">
								<ul class="sinlge-post-meta">
									<li><i class="fa fa-user"></i>{{  $con->name }}</li>
									<li><i class="fa fa-clock-o"></i>{{ $con->created_at->format('h:i a') }}</li>
									<li><i class="fa fa-calendar"></i>{{ $con->created_at->format('M d, Y') }}</li>
								</ul>
								<p>{{ $con->cmt }}</p>
								{{-- <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a> --}}
							</div>
						</li>
						@endif
						@endforeach


						@endif
						@endforeach
					</ul>

				</div><!--/Response-area-->
				<div class="replay-box">
					<div class="row">
						<div class="col-sm-12">
							<h2>Leave a replay</h2>

							<div class="text-area">

								<span>*</span>
								@if (Auth::check())
								<div class="blank-arrow">
									<label>Your Comment</label>   
								</div>
								<form action="{{ route('blog.detail.post', ['id' => $blogDetail->id]) }}" method="POST">
									@csrf

									<textarea name="cmt" id="comment-textarea" rows="11" style="border: 2px solid #ccc;"></textarea>

									<input type="hidden" name="idblog" value="{{ $blogDetail->id }}">
									<input type="hidden" name="level" value="0">

									<button class="btn btn-primary" type="submit">Post Comment</button>
								</form>
								@else
								<div class="blank-arrow">
									<label>Vui lòng đăng nhập để bình luận.</label>   
								</div> 
								<p></p>
								@endif
							</div>
						</div>
					</div>
				</div><!--/Repaly Box-->
			</div>	
		</div>
	</div>
</section>

<script>

	$(document).ready(function(){

		$.ajaxSetup({
			headers: {

				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

			//vote
		$('.ratings_stars').hover(
	            // Handles the mouseover
			function() {
				$(this).prevAll().andSelf().addClass('ratings_hover');
	                // $(this).nextAll().removeClass('ratings_vote'); 
			},
			function() {
				$(this).prevAll().andSelf().removeClass('ratings_hover');
	                // set_votes($(this).parent());
			}
			);

		$('.ratings_stars').click(function(){

                // // goi php vao 
			var checkLogin = "{{Auth::Check()}}";
                // alert()

			if(checkLogin){
				var rate =  $(this).find("input").val();
				var idblog = "{{ $blogDetail->id }}";

				console.log(idblog);
				alert(rate);
				if ($(this).hasClass('ratings_over')) {
					$('.ratings_stars').removeClass('ratings_over');
					$(this).prevAll().andSelf().addClass('ratings_over');
				} else {
					$(this).prevAll().andSelf().addClass('ratings_over');
				}

                    // phan tich xem rate co gi? de tao table co đung?
                    // id, rate, id_blog, id_user, time
                    // dung ajax gui qua controller va insert table rate
				$.ajax({
					type:'POST',
					url:'{{url('user/ajax/rate/blog')}}',
					data:{
						rate: rate,
						idblog: idblog,
					},
					success:function(data){
						console.log(data.success);
					}
				});


			}else{
				alert("vui long login de rate");
			}

		});

		$('.reply-btn').on('click', function(e) {
			e.preventDefault();

			$('.comment-form').hide();

			var commentForm = $(this).closest('.media').find('.comment-form');
			commentForm.show();

			commentForm.find('textarea').focus();

		});


		$('.comment-form textarea').on('blur', function() {
			var commentText = $(this).val().trim();

			if (commentText === '') {
				$(this).closest('.comment-form').hide();
			}
		});


	});
</script>
@endsection


