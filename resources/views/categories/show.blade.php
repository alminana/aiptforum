@extends('main_layouts.master')

@section('title', $category->name . ' Dashboard | AIPTFORUM')

@section('content')

<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Posts</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Application</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
							<form method="GET" action="{{ route('categories.show', $category) }}">
							<input type="search" name="search" class="form-control ps-5 radius-640 " style="padding: 10px 600px;" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                            </form>
							</div>
							<div class="ms-auto"><a href="{{ route('home') }}" class="btn btn-primary ">Clear</a></div>
						</div>
						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
									<th>#</th>
									<th>Refference</th>
									<th>Application</th>
									<th>Filing no:</th>
									<th>Filing date</th>
									<th>Class</th>  
									<th>Registration</th>
									<th>Registration date</th> 
									<th>Renewal</th> 
									<th>Status</th>
									<th>Client</th>
									<th>Country</th>
									<th>Category</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($posts as $post)
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div>
													<input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
												</div>
												<!-- <div class="ms-2">
													<h6 class="mb-0 font-14">{{ $post->id }}</h6>
												</div> -->
											</div>
										</td>
										<td >{{$post->aiptref}}</td>
										<!-- <td>
										<img style='width: 80%' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
									    </td> -->
										<td ><a href="{{ route('posts.show', $post) }}">{{$post->title}}</a></td>
										<td ><a href="{{ route('posts.show', $post) }}">{{$post->slug}}</a></td>
										<td ><a href="{{ route('posts.show', $post) }}">{{$post->filingdate}}</a></td>
										<td ><a href="{{ route('posts.show', $post) }}">{{$post->registrationno}}</a></td>
										<td ><a href="{{ route('posts.show', $post) }}">{{$post->registrationdate}}</a></td>
										<td ><a href="{{ route('posts.show', $post) }}">{{ $post->class }}</a></td>
										<td ><a href="{{ route('posts.show', $post) }}">{{$post->renewal}}</a></td>										
										<td ><a href="{{ route('posts.show', $post) }}">{{$post->status}}</a></td>
										<td ><a href="{{ route('posts.show', $post) }}">{{ $post->excerpt }}</a></td>
										<td ><a href="{{ route('posts.show', $post) }}">{{ $post->country }}</a></td>
										<td ><a href="{{ route('posts.show', $post) }}">{{ $post->category->name }}</a></td>
									
                                        <!-- <td style=" text-align: center;">{{ $post->created_at->diffForHumans() }}</td> -->
                                        
                                        <td>
											<div class="d-flex order-actions">
												<a href="{{ route('posts.show', $post) }}" class=""><i class='bx bxs-edit'></i></a>
								        </div>
										</td>
									</tr>
                                    @endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>


			</div>
		</div>


@endsection
