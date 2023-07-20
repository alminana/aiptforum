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
							<table id="tbAdresse" cellspacing="0" style="border:1px;" class="table table-striped table-bordered" role="grid" aria-describedby="tbAdresse_info">
								<thead>
								<tr role="row">
									<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
									<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
									<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Application</th>
									<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Method</th>
									<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Image</th>
									<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Requested Date</th>
									<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Actual Date</th>
									<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing #</th>
									<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Registration #</th>
									<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">class</th>						
									<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client</th>	
									<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>	
									<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Condition</th>						
		
							</tr>
							</thead>
								<tfoot>
									<tr role="row">
										<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
										<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
										<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Application</th>
										<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Method</th>
										<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Image</th>
										<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Requested Date</th>
										<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Actual Date</th>
										<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing #</th>
										<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Registration #</th>
										<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">class</th>						
										<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client</th>	
										<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>	
										<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Condition</th>						
										</tr>
								</thead>
							
							<tbody>
								@forelse($posts as $post)
						
							@php
								$remaining = \Carbon\Carbon::now()->diffInDays($post->proceduredate);
								$expire = strtotime($post->proceduredate);
								$today = strtotime("today midnight");
								$day_diff = $today - $expire;                                    
								$color = "";
							
								if ($today >= $expire) {
									$color = "color:black;background-color:#D99594;";
								}elseif ($remaining < 7 ) {
									$color = "color:black;background-color:#FFFF00;";
								} elseif ($expire >= 30) {
									$color = "color:black;background-color:#92D050;";
								}
							@endphp
							<tr role="row" class="odd">
								<td class="aiptref" href="{{ route('posts.show', $post) }}" style="{{ $color }}">{{  $post->aiptref }}</td>
								<td class="clientref" href="{{ route('posts.show', $post) }}" style="{{ $color }}">{{ $post->clientref }}</td>
								<td class="title" href="{{ route('posts.show', $post) }}" style="{{ $color }}">{{ $post->title }}</td>

							
								<td class="" style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->status }}</td>
								<td style="font-size:11px;{{ $color }};">
									<img style='width: 100%' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">

									{{-- <a style="color:black;"href="{{ route('posts.show', $post) }}">

										<img style='width: 60%' src="{{Storage::disk('s3')->temporaryUrl($post->image->path, now()->addMinutes(20))}}" />
							
									</a> --}}
								</td>
								<td class="requesteddate" style="{{ $color }}">
									<a href="{{ route('admin.posts.edit', $post) }}"><button  class="btn btn-success">{{ $post->requesteddate }}</button></a>
									
								</td>

								<td class="proceduredate" style="{{ $color }}">
									<a href="{{ route('admin.posts.edit', $post) }}"><button  class="btn btn-primary">{{ $post->proceduredate }}</button></a>

								</td>
								
								<td class="slug" style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->slug }}</td>
								<td class="registrationno" style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->registrationno }}</td>
								<td class="class" style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->class }}</td>
								<td class="excerpt" style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->excerpt }}</td>
								<td class="country" style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->country }}</td>
						   

								<td class="deadline" href="{{ route('posts.show', $post) }}" style="{{ $color }}">
									<p>	
										@php
											$remaining = \Carbon\Carbon::now()->diffInDays($post->proceduredate);
											$expire = strtotime($post->proceduredate);
											$today = strtotime("today midnight");
											$day_diff = $today - $expire;                                    
											$color = "";
										
											if ($today >= $expire) {
												echo "deadline";
												$color = "color:black;background-color:#D99594;";
											}elseif ($remaining < 7 ) {
												echo "upcoming";
												$color = "color:black;background-color:#FFFF00;";
											} elseif ($expire >= 30) {
												echo "safe";
												$color = "color:black;background-color:#92D050;";
											}
										@endphp
									
									</p>
										 
								</td>

						
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

