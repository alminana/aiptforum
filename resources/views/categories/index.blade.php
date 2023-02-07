@extends('main_layouts.master')

@section('title')
@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	@endsection
	
@section('content')  
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
				@forelse($categories as $category)
					<div class="col">
						<div class="card radius-10 border-start border-0 border-3 border-info">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary"><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></p>
										<h1 class="my-1 text-info"><a href="{{ route('categories.show', $category) }}">{{ $category->posts_count }}</a></h1>
								
									</div>
									<div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					@empty
						<p class='lead'>There are no categories to show.</p>
					@endforelse
				</div><!--end row--> 
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Application</div>
					<div class="ps-3">
						
					</div>

				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th style="font-size:11px;">No.</th>
										<th style="font-size:11px;">AIPTREF</th>
										<th style="font-size:11px;">Client Ref.</th>
										<th style="font-size:11px;">Client</th> 
										<th style="font-size:11px;">Type</th>
										<th style="font-size:11px;">Image</th>
										<th style="font-size:11px;">Application</th>
										<th style="font-size:11px;">Class</th>
										<th style="font-size:11px;">Filing no:</th>
										<th style="font-size:11px;">Registration</th>
										<th style="font-size:11px;">Procedure</th>
										<th style="font-size:11px;">Requested deadline</th>
										<th style="font-size:11px;">Actual deadline</th>
										<th style="font-size:11px;">Country</th>
										<th style="font-size:11px;">Agent</th>
										<th style="font-size:11px;">Condition</th> 
										<th style="font-size:11px;">Action</th>
									</tr>
								</thead>
								<tbody>
								@forelse($posts as $post)
							<tr>
								<?php
								$favcolor = ($post->body);
								$color = "";
								switch ($favcolor) {
								case "Done":
									$color = "color:black;background-color:#92D050;";
																			
									break;
								case "New":
									$color = "color:black;background-color:orange";	
																		
									break;
								case "Process":
									$color = "color:black;background-color:#FFFF00;";
																	
									break;
								case "Rejected":
									$color = "color:black;background-color:#9440F7;";
									break;								
								default:
									$color = "color:black;background-color:White;";
																	
								}
									?>

								<td style="font-size:11px;{{ $color }};"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->id}}</a></td>
								<td style="font-size:11px;{{ $color }};"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->aiptref}}</a></td>
								<td style="font-size:11px;{{ $color }};"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->clientref}}</a></td>
								<td style="font-size:11px;{{ $color }};"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->excerpt}}</a></td>
								<td style="font-size:11px;{{ $color }};"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->category->name}}</a></td>
								<td style="font-size:11px;{{ $color }};">
									<img style='width: 50%' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">

									{{-- <a style="color:black;"href="{{ route('posts.show', $post) }}">

										<img style='width: 60%' src="{{Storage::disk('s3')->temporaryUrl($post->image->path, now()->addMinutes(20))}}" />
							
									</a> --}}
								</td>

								<td style="font-size:11px;{{ $color }};"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->title}}</a></td>
								<td style="font-size:11px;{{ $color }};"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->class}}</a></td>
								
								<td style="font-size:11px;{{ $color }};"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->slug}}</a></td>
								<td style="font-size:11px;{{ $color }};"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->registrationno}}</a></td>
								<td style="font-size:11px;{{ $color }};"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->status}}</a></td>
								<td style="font-size:11px;{{ $color }};"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->requesteddate}}</a></td>
								<td style="font-size:11px;{{ $color }};"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->proceduredate}}</a></td>
								<td style="font-size:11px;{{ $color }};"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->country}}</a></td>
								<td  style="font-size:11px;{{ $color }};"><a style="color:black;"href="{{ route('posts.show', $post) }}"></a>{{ $post->agent }}</td>
								
								<td  style="font-size:11px;{{ $color }};"><a style="color:black;" href="" >
									{{$post->body}}
									<?php
								$favcolor = ($post->body);
								$color = "";
								switch ($favcolor) {
									case "Done":
									$color = "color:black;background-color:#92D050;";
																			
									break;
								case "New":
									$color = "color:black;background-color:orange";	
																		
									break;
								case "Process":
									$color = "color:black;background-color:#FFFF00;";
																	
									break;
								case "Rejected":
									$color = "color:black;background-color:#9440F7;";
									break;							
								default:
									$color = "color:black;background-color:White;";
																	
								}
									?>
								
							</td>

								<td  style="{{ $color }};">			
											<div class="d-flex order-actions">
											<a href="{{ route('print.printthis', $post) }}" class=""><i class='bx bxs-printer'></i></a>
												
                                            </div>
								</td>

                            </tr>
                            @empty
								<p class='lead'>There are no Application to show.</p>
							@endforelse
								</tbody>
							</table>
						
				
				</div>
                        
					</div>
				</div>


			</div>
		</div>
		<!--end page wrapper -->
		@endsection
	

    @section("script")

    <script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: ['excel','copy']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		
            setTimeout(() => {
                $(".general-message").fadeOut();
            }, 5000);
        
        });
	</script>
    @endsection