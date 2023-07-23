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
	    <div class="page-content">
				<div>
									<h5><p style="color: red">Check the checkbox to hide the row Items *</p></h5>
								</div>
								<div class="row ">
									
										<div class="col" style="color:black">
											<div class="form-check ">
												<label class="form-check-label">
												  <input type="checkbox" class="form-check-input" name="deadline" >Status
												</label>
											  </div>
											  <div class="form-check">
												<label class="form-check-label">
												  <input type="checkbox" class="form-check-input" name="aiptref">AIPTREF
												</label>
											  </div>
											  <div class="form-check ">
												<label class="form-check-label">
												  <input type="checkbox" class="form-check-input" name="clientref" >Client Ref
												</label>
											  </div>
											  <div class="form-check ">
												<label class="form-check-label">
												  <input type="checkbox" class="form-check-input" name="title" >Application
												</label>
											  </div>
											  <div class="form-check">
												<label class="form-check-label">
												  <input type="checkbox" class="form-check-input" name="status">Method
												</label>
											  </div>
											</div>
										
											<div class="col" style="color:black">
											
											<div class="form-check">
												<label class="form-check-label">
												  <input type="checkbox" class="form-check-input" name="image">Image
												</label>
											  </div>
											  <div class="form-check">
												<label class="form-check-label">
												  <input type="checkbox" class="form-check-input" name="requesteddate">Requested Date
												</label>
											  </div>
											  <div class="form-check">
												<label class="form-check-label">
												  <input type="checkbox" class="form-check-input" name="proceduredate">Actual Deadline
												</label>
											  </div>
											  <div class="form-check ">
												<label class="form-check-label">
												  <input type="checkbox" class="form-check-input" name="slug" >Filing
												</label>
											  </div>
											  <div class="form-check ">
												<label class="form-check-label">
												  <input type="checkbox" class="form-check-input" name="registrationno" >Registration
												</label>
											  </div>
		
										  </div>
										  <div class="col" style="color:black">
											<div class="form-check">
												<label class="form-check-label">
												  <input type="checkbox" class="form-check-input" name="class">Class
												</label>
											  </div>
											  <div class="form-check">
												<label class="form-check-label">
												  <input type="checkbox" class="form-check-input" name="excerpt">Client
												</label>
											  </div>
											  <div class="form-check ">
												<label class="form-check-label">
												  <input type="checkbox" class="form-check-input" name="country" >Country
												</label>
											  </div>
										  </div>
										  <div class="col" style="color:black">
											
											 
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
									<th class="deadline" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Condition</th>	
									<th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
									<th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
									<th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Application</th>
									<th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Method</th>
									<th class="image" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Image</th>
									<th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Requested Date</th>
									<th class="proceduredate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Actual Date</th>
									<th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing #</th>
									<th class="registrationno" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Registration #</th>
									<th class="class"  class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">class</th>						
									<th class="excerpt" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client</th>	
									<th class="country"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>	
					
		
							</tr>
							</thead>
								<tfoot>
									<tr role="row">
										<th class="deadline" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Condition</th>	
										<th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
										<th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
										<th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Application</th>
										<th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Method</th>
										<th class="image" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Image</th>
										<th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Requested Date</th>
										<th class="proceduredate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Actual Date</th>
										<th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing #</th>
										<th class="registrationno" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Registration #</th>
										<th class="class"  class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">class</th>						
										<th class="excerpt" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client</th>	
										<th class="country"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>	
							
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
									<a style=" font-size:12; color:black;" href="{{ route('posts.show', $post) }}">
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
							<td ><a style=" font-size:12; color:black;" href="{{ route('admin.posts.edit', $post) }}">{{$post->aiptref}}</a></td>
							<td ><a style=" font-size:12; color:black;" href="{{ route('admin.posts.edit', $post) }}">{{ $post->clientref }}</a> </td>
							<td ><a style=" font-size:12; color:black;" href="{{ route('admin.posts.edit', $post) }}">{{ $post->title }}</a></td>
							<td ><a style=" font-size:12; color:black;" href="{{ route('admin.posts.edit', $post) }}">{{ $post->status }}</a></td>
							<td>
								<img style='width: 50%' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
							</td>
							<td class="proceduredate" >
								<a style=" font-size:12; color:black;"  href="{{ route('admin.posts.edit', $post) }}"><button style=" font-size:16; color:white; align-item:center;"  class="btn btn-success">{{ $post->requesteddate }}</button></a>
							</td>

							<td class="proceduredate" >
								<a style=" font-size:12; color:black;"  href="{{ route('admin.posts.edit', $post) }}"><button style=" font-size:16; color:white; align-item:center;"  class="btn btn-danger">{{ $post->proceduredate }}</button></a>
							</td>
							
							<td class="slug"  href="{{ route('posts.show', $post) }}"><a style=" font-size:12; color:black;"  href="{{ route('posts.show', $post) }}">{{ $post->slug }}</a></td>
							<td class="registrationno"  href="{{ route('posts.show', $post) }}"><a style=" font-size:12; color:black;"  href="{{ route('posts.show', $post) }}">{{ $post->registrationno }}</a></td>
							<td class="class"  href="{{ route('posts.show', $post) }}"><a style=" font-size:12; color:black;"  href="{{ route('posts.show', $post) }}">{{ $post->class }}</a></td>
							<td class="excerpt"  href="{{ route('posts.show', $post) }}"><a style=" font-size:12; color:black;"  href="{{ route('posts.show', $post) }}">{{ $post->excerpt }}</a></td>
							<td class="country"  href="{{ route('posts.show', $post) }}"><a style=" font-size:12; color:black;"  href="{{ route('posts.show', $post) }}">{{ $post->country }}</a></td>

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

