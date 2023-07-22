@extends('main_layouts.master')

@section('title')
@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	@endsection
	@section("content")
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
				@forelse($categories as $category)
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary"><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></p>
                                    <h4 class="my-1 text-danger"><a href="{{ route('categories.show', $category) }}">{{ $category->posts_count }}</a><h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				@empty
					<p class='lead'>There are no categories to show.</p>
				@endforelse
                
            </div><!--end row-->

            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Recent Application</h6>
                        </div>
                        
                    </div>
                    <div class="table-responsive">
                        <table id="tbAdresse" class="table align-middle mb-0">
                            <thead class="table-light">
                            <tr>
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
								<tr>
									<td class="deadline" href="" >
										<a style="font-weight:bold; font-size:12; color:black;" href="{{ route('posts.show', $post) }}">
											<span class="badge bg-gradient-quepal text-white shadow-sm w-100">
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
@endsection

@section("script")
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






    <script src="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/js/index.js') }}"></script>
@endsection
