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
			<div style="font-weight: 200"  class="breadcrumb-title pe-3"><a  href="{{ route('categories.index', $category) }}">{{ $category->name }}</a></div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="{{ route('categories.index', $category) }}"><i class="bx bx-home-alt"></i></a>
						</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
		<!--end breadcrumb-->
			<div class="page-content">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="tbAdresse" cellspacing="0" style="border:1px color:grey;" class="table table-striped table-bordered" role="grid" aria-describedby="tbAdresse_info">
								<thead>
								<tr role="row">
									<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 0px;">Condition</th>	
									<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 0px;">AIPTREF</th>
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
				
		
							</tr>
							</thead>
								<tfoot>
									<tr role="row">
										<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 5px;">Condition</th>	
										<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 5px;">AIPTREF</th>
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
								<td class="deadline" href="" >
									<a style="font-weight:bold; font-size:12; color:black;" href="{{ route('posts.show', $post) }}">
										<span class="badge bg-gradient-quepal text-white shadow-sm w-50">
											@php
											$remaining = \Carbon\Carbon::now()->diffInDays($post->proceduredate);
											$expire = strtotime($post->proceduredate);
											$today = strtotime("today midnight");
											$day_diff = $today - $expire;                                    
											$color = "";
										
											if ($today >= $expire) {
												echo "Deadline";
												$color = "color:black;background-color:#D99594;";
											}elseif ($remaining < 7 ) {
												echo "Upcoming";
												$color = "color:black;background-color:#FFFF00;";
											} elseif ($expire >= 30) {
												echo "Safe";
												$color = "color:black;background-color:#92D050;";
											}
										@endphp
										</span>
									</a>
									
										 
								</td>
							<td style="{{ $color }}">{{$post->aiptref}}</td>
							<td style="{{ $color }}">{{ $post->clientref }}</td>
							<td style="{{ $color }}">{{ $post->title }}</td>
							<td style="{{ $color }}">{{ $post->status }}</td>
							<td>
								<img style='width: 50%' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
							</td>
							<td class="proceduredate" style="{{ $color }}">
								<a style="font-weight:bold; font-size:12; color:black;"  href="{{ route('admin.posts.edit', $post) }}"><button style="font-weight:bold; font-size:16; color:white; align-item:center;"  class="btn btn-success">{{ $post->requesteddate }}</button></a>
							</td>

							<td class="proceduredate" style="{{ $color }}">
								<a style="font-weight:bold; font-size:12; color:black;"  href="{{ route('admin.posts.edit', $post) }}"><button style="font-weight:bold; font-size:16; color:white; align-item:center;"  class="btn btn-danger">{{ $post->proceduredate }}</button></a>
							</td>
							
							<td class="slug" style="{{ $color }}" href="{{ route('posts.show', $post) }}"><a style="font-weight:bold; font-size:12; color:black;"  href="{{ route('posts.show', $post) }}">{{ $post->slug }}</a></td>
							<td class="registrationno" style="{{ $color }}" href="{{ route('posts.show', $post) }}"><a style="font-weight:bold; font-size:12; color:black;"  href="{{ route('posts.show', $post) }}">{{ $post->registrationno }}</a></td>
							<td class="class" style="{{ $color }}" href="{{ route('posts.show', $post) }}"><a style="font-weight:bold; font-size:12; color:black;"  href="{{ route('posts.show', $post) }}">{{ $post->class }}</a></td>
							<td class="excerpt" style="{{ $color }}" href="{{ route('posts.show', $post) }}"><a style="font-weight:bold; font-size:12; color:black;"  href="{{ route('posts.show', $post) }}">{{ $post->excerpt }}</a></td>
							<td class="country" style="{{ $color }}" href="{{ route('posts.show', $post) }}"><a style="font-weight:bold; font-size:12; color:black;"  href="{{ route('posts.show', $post) }}">{{ $post->country }}</a></td>

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
			$('#tbAdresse ').DataTable( {
		
				dom: 'Bfrtip',
				buttons: [
					'print','excel','pdf','copy'
				]
			} );
		} );

		$(document).ready(function() {
	    	
		

			// Setup - add a text input to each header cell
			$('#tbAdresse thead th').each(function() 
			
			{
				var title = $(this).text();
				$(this).html('<input type="text"   placeholder="Search ' + title + '" />');
				
			});

			// DataTable
			var table = $('#tbAdresse').DataTable();
			
			//Entires


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

