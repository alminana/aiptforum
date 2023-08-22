@extends('main_layouts.master')

@section('title')
@section("style")
<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection
	
@section('content')  
		<!--start page wrapper -->
		<div class="page-wrapper">
		<div class="page-content">
	<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div style="font-weight: 200"  class="breadcrumb-title pe-3"><a  href="">Trademark</a></div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href=""><button type="button" class="btn btn-primary">Add New</button></a>
                 
                    </li>
                </ol>
                
            </nav>
        </div>
    </div>

    <div class="container-fuild">
        <div class="card" style="width: auto; height:25%;">
            <div class="container-fuild">
                <div class="container-fuild alert alert-success" role="alert">
                    Application
                  </div>
				  <form action="{{ route('admin.posts.update', $post) }}" method='post' enctype='multipart/form-data'>
					<div class="container">
						<div class="row" style="margin-top:15px">
							<div class="col-3">
							<label style="color: blueviolet; font-weight:bold">Aipt Reference</label>
							<h6 style="color:black; font-weight:bold">{{ old("aiptref", $post->aiptref) }}</h6>
							</div>
							<div class="col-3">
								<label style="color: blueviolet; font-weight:bold">Client Reference</label>
								<h6 style="color:black; font-weight:bold">{{ old("clientref", $post->clientref) }}</h6>
							</div>
							<div class="col-3">
								<label style="color: blueviolet; font-weight:bold">Class</label>
								<h6 style="color:black; font-weight:bold">{{ old("class", $post->class) }}</h6>
							</div>
							<div class="col-3">
								<label style="color: blueviolet; font-weight:bold">Country</label>
								<h6 style="color:black; font-weight:bold">{{ old("country", $post->country) }}</h6>
							</div>
						</div>
						<div class="row" style="margin-top:15px">
							<div class="col-12">
							<label style="color: blueviolet; font-weight:bold">Trademark Title</label>
							<h6 style="color:black; font-weight:bold">{{ old("title", $post->title) }}</h6>
							</div>
						</div>
						<div class="row" style="margin-top:15px">
							<div class="col-9">
								<label style="color: blueviolet; font-weight:bold">Client</label>
								<h6 style="color:black; font-weight:bold">{{ old("excerpt", $post->excerpt) }}</h6>
							</div>
							
						</div>
						<div class="row" style="margin-top:15px">
							<div class="col-12">
								<div class="row" style="margin-top:15px">
									<div class="col-9">
									<label style="color: blueviolet; font-weight:bold">Associates</label>
									<h6 style="color:black; font-weight:bold">{{ old("agent", $post->agent) }}</h6>
									</div>
									<div class="col-3">
										<label style="color: blueviolet; font-weight:bold">Type</label>
										<h6 style="color:black; font-weight:bold">{{ old("body", $post->body) }}</h6>
									</div>
									
								</div>
							</div>
							
						</div>
					</div>
				  </form>
              </div>
          </div>
    </div>
    <div class="container-fuild">
        <div class="card" style="width: auto; height:25%;">
            <div class="container-fuild">
                <div class="container-fuild alert alert-success" role="alert">
                    Schdule of Date
                  </div>
                  <div class="container">
                    <div class="row" style="margin-top:15px">
                        <div class="col-6">
						 <div class="row">
							<div class="row" style="margin-top:15px">
								<div class="col-9">
									<label style="color: blueviolet; font-weight:bold">Filing Number</label>
									<h6 style="color:black; font-weight:bold">{{ old("slug", $post->slug) }}</h6>
								</div>
								
							</div>
						 </div>
						 <div class="row">
							<div class="row" style="margin-top:15px">
								<div class="col-9">
									<label style="color: blueviolet; font-weight:bold">Registration Number</label>
									<h6 style="color:black; font-weight:bold">{{ old("registrationno", $post->registrationno) }}</h6>
								</div>
								
							</div>
						 </div>
						 <div class="row">
							<div class="row" style="margin-top:15px">
								<div class="col-9">
									<label style="color: blueviolet; font-weight:bold">Procedure</label>
									<h6 style="color:black; font-weight:bold">{{ old("status", $post->status) }}</h6>
								</div>
								
							</div>
						 </div>
						 <div class="row">
							<div class="row" style="margin-top:15px">
								<div class="col-9">
									<label style="color: blueviolet; font-weight:bold">Request Date</label>
									<h6 style="color:black; font-weight:bold">{{ old("requesteddate", $post->requesteddate) }}</h6>
								</div>
								
							</div>
						 </div>
						 <div class="row">
							<div class="row" style="margin-top:15px">
								<div class="col-9">
									<label style="color: blueviolet; font-weight:bold">Actual Date</label>
									<h6 style="color:black; font-weight:bold">{{ old("proceduredate", $post->proceduredate) }}</h6>
								</div>
								
							</div>
						 </div>
                        </div>
                        <div class="col-6">
                            <label style="color: blueviolet; font-weight:bold">Image</label>
                            <img style='width: 50%' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
                        </div>
                    </div>
               
                  
                  </div>
              
              </div>
          </div>

    </div>
	<div class="container-fuild">
        <div class="card" style="width: auto; height:25%;">
            <div class="container-fuild">
				
                <div class="container-fuild alert alert-success" role="alert">
                    Comment Section: {{ count($post->comments) }} Activity logs
                  </div>
				  @foreach($post->comments as $comment)
				  	<div class="container">
						<div class="row" style="margin-top:15px">
							<div class="col-4">
								<div class="col-9">
									<label style="color: blueviolet; font-weight:bold">User</label>
									<h6 style="color:black; font-weight:bold">{{ $comment->user->name }}</h6>
								</div>
							</div>
							<div class="col-5">
								<div class="col-9">
									<label style="color: blueviolet; font-weight:bold">Comment</label>
									<h6 style="color:black; font-weight:bold">{{ $comment->the_comment }}</h6>
								</div>
							</div>			
							<div class="col-3">
								<div class="col-9">
									<label style="color: blueviolet; font-weight:bold">Created Date</label>
									<h6 style="color:black; font-weight:bold">{{ $comment->created_at}}</h6>
								</div>
							</div>
						</div>
					</div>
					<hr style="color: blueviolet; font-weight:bold"> 
				  @endforeach
			
              </div>
          </div>
    </div>
  
	<div class="row animate-box">
		<div class="col-md-12">

			<x-blog.message :status="'success'"/>

			<h2 class="colorlib-heading-2" style="color: blueviolet;font-weight:bold;">Say something</h2>

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
 
@endsection
