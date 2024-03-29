@extends('main_layouts.master')

@section('title')
@section("style")
<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection
	
@section('content')  
		<!--start page wrapper -->
		<div class="page-wrapper">
			{{-- <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
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
				</div> --}}
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">{{ $category->name }}</div>
					<div class="ps-3">
						
					</div>

				</div>
				<!--end breadcrumb-->
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="requests-table" style="border:1px;" class="table table-striped table-bordered" role="grid" aria-describedby="requests-table_info">
								<thead>
								<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending"  data-sortable="false" style="width: 54px;">#</th>
								<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">Client</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">Type</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">Image</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">Description</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">Application</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">Class</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">Registration</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">Procedure</th>								
							</tr>
							</thead>
								<thead>
									<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" aria-sort="ascending"  data-sortable="false" style="width: 54px;">#</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">Client</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">Type</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">Image</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">Description</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">Application</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">Class</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">Registration</th>
									<th class="sorting" tabindex="0" aria-controls="requests-table" rowspan="1" colspan="1" style="width: 54px;">Procedure</th>
									</tr>
								</thead>
							
							<tbody>
								@forelse($posts as $post)
								<?php
										$favcolor = ($post->body);
										$color = "";
										switch ($favcolor) {
										case "Done":
											$color = "color:black;background-color:#94F740;";
																					
											break;
										case "New":
											$color = "color:black;background-color:orange";	
																				
											break;
										case "Process":
											$color = "color:black;background-color:#F5FF53;";
																			
											break;
										case "Rejected":
											$color = "color:black;background-color:#9440F7;";
											break;								
										default:
											$color = "color:black;background-color:White;";
																			
										}
											?>
							<tr role="row" class="odd">
								<td style="font-size:12px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->id}}</a></td>
								<td style="font-size:12px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->aiptref}}</a></td>
								<td style="font-size:12px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->clientref}}</a></td>
								<td style="font-size:12px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->excerpt}}</a></td>
								<td style="font-size:12px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->category->name}}</a></td>
								<td style="font-size:12px;">
									<img style='width: 100%' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
								</td>
								<td style="font-size:12px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->title}}</a></td>
								<td style="font-size:12px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->class}}</a></td>
								<td style="font-size:1px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->slug}}</a></td>
								<td style="font-size:12px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->registrationno}}</a></td>
								<td style="font-size:12px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->status}}</a></td>
						
									</a>
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
				$('#requests-table').DataTable({
					initComplete: function() {
					this.api().columns().every(function() {
						var column = this;
						var select = $('<select><option value=""></option></select>')
						.appendTo($(column.header()).empty())
						.on('change', function() {
							var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
							);

							column
							.search(val ? '^' + val + '$' : '', true, false)
							.draw();
						});

						column.data().unique().sort().each(function(d, j) {
						select.append('<option value="' + d + '">' + d + '</option>')
						});
					});
					}
				});
				});
		</script>
		@endsection


























		@extends('main_layouts.master')

@section('title')
@section("style")
<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection
	
@section('content')  
		<!--start page wrapper -->
		<div class="page-wrapper">
			{{-- <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
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
				</div> --}}
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">{{ $category->name }}</div>
					<div class="ps-3">
						
					</div>

				</div>
				<!--end breadcrumb-->
				<div class="card">
					<div class="card-body">
						<table id="tbAdresse" class="table table-striped table-bordered" cellspacing="0">
							<thead>
							  <tr>
								
										<th style="font-size:12px;">AIPTREF</th>
										<th style="font-size:12px;">Client Ref.</th>
										<th style="font-size:12px;">Client</th> 
										<th style="font-size:12px;">Image</th>
										<th style="font-size:12px;">Application</th>
										<th style="font-size:12px;">Class</th>
										<th style="font-size:12px;">Filing no:</th>
										<th style="font-size:12px;">Registration</th>
										<th style="font-size:12px;">Procedure</th>
										<th style="font-size:12px;">Requested deadline</th>
										<th style="font-size:12px;">Actual deadline</th>
										<th style="font-size:12px;">Country</th>
								
							  </tr>
							</thead>
							<tfoot>
							  <tr>
								
										<th style="font-size:12px;">AIPTREF</th>
										<th style="font-size:12px;">Client Ref.</th>
										<th style="font-size:12px;">Client</th> 
										<th style="font-size:12px;">Type</th>
										<th style="font-size:12px;">Image</th>
										<th style="font-size:12px;">Application</th>
										<th style="font-size:12px;">Class</th>
										<th style="font-size:12px;">Filing no:</th>
										<th style="font-size:12px;">Registration</th>
										<th style="font-size:12px;">Procedure</th>
										<th style="font-size:12px;">Requested deadline</th>
										<th style="font-size:12px;">Actual deadline</th>
										<th style="font-size:12px;">Country</th>

							  </tr>
							</tfoot>
							<tbody>
								@forelse($posts as $post)
								<?php
										$favcolor = ($post->body);
										$color = "";
										switch ($favcolor) {
										case "Done":
											$color = "color:black;background-color:#94F740;";
																					
											break;
										case "New":
											$color = "color:black;background-color:orange";	
																				
											break;
										case "Process":
											$color = "color:black;background-color:#F5FF53;";
																			
											break;
										case "Rejected":
											$color = "color:black;background-color:#9440F7;";
											break;								
										default:
											$color = "color:black;background-color:White;";
																			
										}
											?>
							<tr>
							
								<td style="font-size:12px; font-weight:bold;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->aiptref}}</a></td>
								<td style="font-size:12px; font-weight:bold;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->clientref}}</a></td>
								<td style="font-size:12px; font-weight:bold;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->category->name}}</a></td>
								<td style="font-size:12px; font-weight:bold;">
									<img style='width: 100%' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
								</td>

								<td style="font-size:12px; font-weight:bold;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->title}}</a></td>
								<td style="font-size:12px font-weight:bold;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->class}}</a></td>
								
								<td style="font-size:12px font-weight:bold;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->slug}}</a></td>
								<td style="font-size:12px; font-weight:bold; "><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->registrationno}}</a></td>
								<td style="font-size:12px; font-weight:bold;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->status}}</a></td>
								<td style="font-size:12px; font-weight:bold; "><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->requesteddate}}</a></td>
								<td style="font-size:12px; font-weight:bold; "><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->proceduredate}}</a></td>
								<td style="font-size:12px;font-weight:bold; "><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->country}}</a></td>

									
									</a>
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
		<!--end page wrapper -->
		@endsection
	

    
		@section("script")

		<script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
		<script>
			$(document).ready(function() {
			// Setup - add a text input to each header cell
			$('#tbAdresse thead th').each(function() {
				var title = $(this).text();
				$(this).html('<input type="text"   placeholder="Search ' + title + '" />');
			});

			// DataTable
			var table = $('#tbAdresse').DataTable();

			// Apply the search
			table.columns().every(function() {
				var that = this;

				$('input', this.header()).on('keypress change', function(e) {
				var keycode = e.which;
				//launch search action only when enter is pressed
				if (keycode == '13') {
					console.log('enter key pressed !')
					if (that.search() !== this.value) {
					that
						.search(this.value)
						.draw();
					}
				}

				});
			});
			});
		</script>
		@endsection