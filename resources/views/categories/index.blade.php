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
                
            </div>

			<!--end row-->
			<div class="row">
				<div class="col-12">
					<div>
						<div class="p-2">
							<h3 class="font-size-16">
								<strong>
									Daily Report 
								</strong>
						    </h3>
						</div>

					</div>

				</div>
			</div>
			<!--breadcrumb-->
			<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-8">
				<div class="card-body">
				<form method="GET" action="{{route('deadline.getData')}}">
					{{ csrf_field() }}
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="">From Date</label>
									<input type="date" name="start_date" id="start_date" class="form-control"> 
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">To Date</label>
									<input type="date" name="end_date" id="end_date" class="form-control">
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label for=""></label><br>
									<button type="submit" value="Submit" class="btn btn-success">Filter</button>
								</div>
							</div>

							<div class="col-md-">
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
							</div>
						</div>
					</form>
				</div>
			</div>
			<!--end breadcrumb-->
			

            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
						<div class="p-2">
							<h3 class="font-size-16">
								<strong>
									Recent Applications
								</strong>
						    </h3>
						</div>
                        
                    </div>
                    <div class="table-responsive">
						<table  id="tbAdresse" class="table table-striped table-bordered">
                            <thead class="table-light">
                            <tr>
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
								<tr>
									<td class="deadline" style="{{ $color }}" href="" >
										<a style="font-weight:bold; align-item:center; font-size:12; color:black;" href="{{ route('posts.show', $post) }}">

											<span class="badge bg-gradient-quepal text-white shadow-sm w-50">
												@php
												$expire = strtotime($post->proceduredate);
												$today = strtotime("today midnight");
												$day_diff = $today - $expire; 
												$default  =  strtotime("01/01/0001");                               
												$color = "";
												$deadline = "Deadline";
												$upcomming = "Upcoming";
												$safe = "01/01/0001";
												$done = "done";
														if(($expire == $default)){
															echo "New/Done";
															$color = "color:black;background-color:green;";
														}elseif($today == $expire){
															echo "DueDate ";
															$color = "color:black;background-color:orange;";
														} elseif ($day_diff <= 30) {
															echo "Upcoming";
															$color = "color:black;background-color:yellow;";
														}	elseif ($today >= $expire) {
															echo "Expired";
															$color = "color:black;background-color:red;";
														}	
														
											@endphp
											  </button>

											<div class="badge badge-secondary">
												
											</div>
										</a>
										
											 
									</td>
								<td class="aiptref"><a style="font-size:12; color:black;" href="{{ route('posts.show', $post) }}">{{$post->aiptref}}</a></td>
								<td class="clientref"><a style="font-size:12; color:black;" href="{{ route('posts.show', $post) }}">{{ $post->clientref }}</a></td>
                                <td class="title"><a style="font-size:12; color:black;" href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></td>
                                <td class="status"><a style="font-size:12; color:black;" href="{{ route('posts.show', $post) }}">{{ $post->status }}</a></td>
                                <td class="image">
									<img style='width: 50%' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
								</td>
                                <td class="requesteddate">
									<a style="font-size:12; color:black;"  href="{{ route('posts.show', $post) }}"><button style="font-weight:bold; font-size:16; color:white; align-item:center;"  class="btn btn-success">{{ $post->requesteddate }}</button></a>
								</td>

								<td class="proceduredate">
									<a style=" font-size:12; color:black;"  href="{{ route('posts.show', $post) }}"><button style="font-weight:bold; font-size:16; color:white; align-item:center;"  class="btn btn-danger">{{ $post->proceduredate }}</button></a>
								</td>
								
								<td class="slug"  href="{{ route('posts.show', $post) }}"><a style="font-size:12; color:black;"  href="{{ route('posts.show', $post) }}">{{ $post->slug }}</a></td>
								<td class="registrationno"  href="{{ route('posts.show', $post) }}"><a style="font-size:12; color:black;"  href="{{ route('posts.show', $post) }}">{{ $post->registrationno }}</a></td>
								<td class="class"  href="{{ route('posts.show', $post) }}"><a style="font-size:12; color:black;"  href="{{ route('posts.show', $post) }}">{{ $post->class }}</a></td>
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
@endsection

@section("script")
@section("script")

<script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

<script>

$("input:checkbox").attr("checked",false).click(function(){
			var shcolumn="."+$(this).attr("name");
			$(shcolumn).toggle();
		});

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

	$(function() {                   
             $("#start-date").datepicker({
              dateFormat: "dd/mm/yy",
               maxDate: 0,
              onSelect: function (date) {
                  var dt2 = $('#end-date');
                  var startDate = $(this).datepicker('getDate');
                  var minDate = $(this).datepicker('getDate');
                  if (dt2.datepicker('getDate') == null){
                    dt2.datepicker('setDate', minDate);
                  }              
                  //dt2.datepicker('option', 'maxDate', '0');
                  dt2.datepicker('option', 'minDate', minDate);
              }
            });
            $('#end-date').datepicker({
                dateFormat: "dd/mm/yy",
                maxDate: 0
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
