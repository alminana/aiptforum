@extends('main_layouts.master')

@section('title')
@section("style")
<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection
	
@section('content')  
		<!--start page wrapper -->
		<div class="page-wrapper">
		
			<div class="page-content">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="tbAdresse" cellspacing="0" style="border:1px color:grey;" class="table table-striped table-bordered" role="grid" aria-describedby="tbAdresse_info">
								<thead>
								<tr role="row">
									<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Condition</th>	
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
				
		
							</tr>
							</thead>
								<tfoot>
									<tr role="row">
										<th class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Condition</th>	
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
								<td class="deadline" href="" style="{{ $color }}">
									<a style="font-weight:bold; font-size:12; color:black;" href="{{ route('posts.show', $post) }}">
										<p>	
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
									
									</p>
										
									</a>
									
										 
								</td>
								<td class="aiptref" style="{{ $color }}"  ><a style="font-weight:bold; font-size:12; color:black;"  href="{{ route('posts.show', $post) }}">{{  $post->aiptref }}</a> </td>
								<td class="clientref" style="{{ $color }}" href="{{ route('posts.show', $post) }}"style="font-weight:bold; font-size:12; color:black;"  style="{{ $color }}"><a style="font-weight:bold; font-size:12; color:black;"  href="{{ route('posts.show', $post) }}">{{ $post->clientref }}</a></td>
								<td class="title" href="{{ route('posts.show', $post) }}" style="{{ $color }}"> <a style="font-weight:bold; font-size:12; color:black;"  href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></td>

							
								<td class="" style="{{ $color }}" href="{{ route('posts.show', $post) }}"><a style="font-weight:bold; font-size:12; color:black;"  href="{{ route('posts.show', $post) }}">{{ $post->status }}</a></td>
								<td style="font-size:11px;{{ $color }};"><a href="{{ route('posts.show', $post) }}">
									<img style='width: 50%' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
</a>

									{{-- <a style="color:black;"href="{{ route('posts.show', $post) }}">

										<img style='width: 60%' src="{{Storage::disk('s3')->temporaryUrl($post->image->path, now()->addMinutes(20))}}" />
							
									</a> --}}
								</td>
								<td class="requesteddate" style="{{ $color }}">
									<a style="font-weight:bold; font-size:12; color:black;"  href="{{ route('admin.posts.edit', $post) }}"><button style="font-weight:bold; font-size:16; color:white; align-item:center;"  class="btn btn-success">{{ $post->requesteddate }}</button></a>
								</td>

								<td class="proceduredate" style="{{ $color }}">
									<a style="font-weight:bold; font-size:12; color:black;"  href="{{ route('admin.posts.edit', $post) }}"><button style="font-weight:bold; font-size:16; color:white; align-item:center;"  class="btn btn-primary">{{ $post->proceduredate }}</button></a>
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

