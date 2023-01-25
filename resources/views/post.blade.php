@extends('main_layouts.master')

@section('title', 'AIPTFORUM | Home')

@section('content')

@section("style")

<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />

<link href="{{ asset('admin_dashboard_assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js" integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection

@section('custom_css')

	<style>
		body{
			top:50px;
		}
		.class-single .desc img {
			width: 100%;
		}
	</style>

@endsection

@section('content')


<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Detials</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Details</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('print.printthis',$post)}}">Print</a></li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="container">
				    <form action="{{ route('admin.posts.update', $post) }}" method='post' enctype='multipart/form-data'>
						<div class="row">
							<div class="col-md-7">
								<div class="card">
									<img style='width: 50%' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
									{{-- <div class="card-body">
										<img style='width: 100%' src="{{Storage::disk('s3')->temporaryUrl($post->image->path, now()->addMinutes(20))}}" />
									</div> --}}
									<div class="classes-img" style="background-image: url({{ asset($post->image ? 'storage/' . $post->image->path : 'storage/placeholders/thumbnail_placeholder.svg' . '')  }});">
										</div>
								</div>
							<div class="row row-pb-lg">
								<div class="col-md-12 animate-box">
										<div class="classes class-single">
											<div class="desc desc2">
											<label for="inputProductTitle" class="form-label"><b>Other Details</b></label>
												<div>
												{!! $post->body !!}
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class>
								<div class="card">
									<div class="card-body">
									<div class="col-lg-12">
                                    <div class="">
									<div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Referrence :</label>
											<label for="inputProductTitle" class="form-label">{{ old("aiptref", $post->aiptref) }}</label>
                                            <!-- <input type="text" value='{{ old("aiptref", $post->aiptref) }}' name='title' required class="form-control" id="myText"> -->

                                            @error('aiptref')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Application Name :</label>
											<label for="inputProductTitle" class="form-label">{{ old("title", $post->title) }}</label>
                                            <!-- <input type="text" value='{{ old("title", $post->title) }}' name='title' required class="form-control" id="myText"> -->

                                            @error('title')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Filing No. :</label>
											<label for="inputProductTitle" class="form-label">{{ old("slug", $post->slug) }}</label>
                                            <!-- <input type="text" value='{{ old("slug", $post->slug) }}' class="form-control" required name='slug' id="inputProductTitle"> -->

                                            @error('slug')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
										<div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Registration :</label>
											<label for="inputProductDescription" class="form-label">{{ old("registrationno", $post->registrationno) }}</label>
											<!-- <input type="status" class="form-control" value='{{ old("status", $post->status) }}' name='status' data-role="tagsinput">                                         -->
                                            @error('status')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
										<div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Class :</label>
											<label for="inputProductTitle" class="form-label">{{ old("class", $post->class) }}</label>
                                            <!-- <input type="text" value='{{ old("cladss", $post->class) }}' class="form-control" required name='class' id="inputProductTitle"> -->

                                            @error('class')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Client Name :</label>
											<label for="inputProductDescription" class="form-label">{{ old("excerpt", $post->excerpt) }}</label>
                                            <!-- <textarea required class="form-control" name='excerpt' id="inputProductDescription" rows="3">{{ old("excerpt", $post->excerpt) }}</textarea> -->
                                        
                                            @error('excerpt')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>

										<div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Type :</label>
											<label for="inputProductTitle" class="form-label">{{ $post->category->name }}</label>
                                            <!-- <input type="text" value='{{ $post->category->name }}' class="form-control" required name='category' id="inputProductTitle"> -->

                                            @error('category')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
										<div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Status :</label>
											<label for="inputProductDescription" class="form-label">{{ old("status", $post->status) }}</label>
											<!-- <input type="status" class="form-control" value='{{ old("status", $post->status) }}' name='status' data-role="tagsinput">                                         -->
                                            @error('status')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
										<div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Status Date :</label>
											<label for="inputProductDescription" class="form-label">{{ old("proceduredate", $post->proceduredate) }}</label>
											{{-- <!-- <input type="status" class="form-control" value='{{ old("status", $post->status) }}' name='status' data-role="tagsinput">                                         --> --}}
                                            @error('proceduredate')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
										{{-- <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Renewal date :</label>
											<label for="inputProductDescription" class="form-label">{{ old("renewal", $post->renewal) }}</label>
                                            @error('status')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div> --}}
                                    </div>
                                </div>
								</div>
								</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<hr>
				        <div class="row row-pb-lg animate-box">

							<div class="col-md-12">
								<h2 class="colorlib-heading-2">{{ count($post->comments) }} Activity logs</h2>

								@foreach($post->comments as $comment)
								<div id="comment_{{ $comment->id }}" class="review">
							   		<div 
							   		class="user-img" 
							   		style="background-image: url({{ $comment->user->image ? asset('storage/' . $comment->user->image->path. '') : 'https://images.assetsdelivery.com/compings_v2/salamatik/salamatik1801/salamatik180100019.jpg'  }});"></div>
							   		<div class="desc">
							   			<h4>
							   				<span class="text-left">{{ $comment->user->name }}</span>
							   				<span class="text-right">{{ $comment->created_at->diffForHumans() }}</span>
											<span class="text-right">{{ $comment->created_at}}</span>
							   			</h4>
							   			<p>{{ $comment->the_comment }}</p>
							   			<p class="star">
						   					<span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
							   			</p>
							   		</div>
							   	</div>
							   	@endforeach

								  
							</div>
						</div>
						
						<div class="row animate-box">
							<div class="col-md-12">

								<x-blog.message :status="'success'"/>

								<h2 class="colorlib-heading-2">Say something</h2>

								@auth

								<form method="POST" action="{{ route('posts.add_comment', $post) }}">
									@csrf
									
									<div class="row form-group">
										<div class="col-md-12">
											<!-- <label for="message">Message</label> -->
											<textarea name="the_comment" id="the_comment" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
										</div>
									</div>
									<div class="form-group">
										<input type="submit" value="Post Comment" class="btn btn-primary">
									</div>
								</form>

								@endauth

								@guest
								<p class="lead"><a href="{{ route('login') }}">Login </a> OR <a href="{{ route('register') }}">Register</a> to write comments</p>
								@endguest	
							</div>
						</div>
			</div>
		</div>
@endsection

@section('custom_js')

<script>
	setTimeout(() => {
		$(".global-message").fadeOut();
	}, 5000);
	function undisableTxt() {
     document.getElementById("myText").disabled = false;
}

</script>


@endsection

<style>
  @media screen {
  #printSection {
      display: none;
  }
}

@media print {
  body * {
    visibility:hidden;
  }
  #printSection, #printSection * {
    visibility:visible;
  }
  #printSection {
    position:absolute;
    left:0;
    top:0;
  }
}
</style>