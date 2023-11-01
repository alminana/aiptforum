@extends('main_layouts.master')

@section('title')
@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	@endsection
	@section("content")
    <div class="page-wrapper">
        <div class="page-content">
            {{-- <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
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
                
            </div> --}}

		
			

            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
						<div class="p-2">
							<h3 class="font-size-16">
								<strong style="font-size:12; color: black;f">
								
									<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
										<div style="font-weight: 200"  class="breadcrumb-title  pe-3"><a  href="">Trademark</a></div>
										<div class="ps-3">
											<nav aria-label="breadcrumb">
												<ol class="breadcrumb mb-0 p-0">
													<li class="breadcrumb-item">
														<a href="{{route('post.create')}}">
														<button type="button" class="btn btn-primary">Add New</button>
														<a href="{{ route('deadline.getData') }}">
															<button type="button" class="btn btn-primary">Filter</button>
														</a>
														</a>
													</li>
												
												</ol>
												
											</nav>
										</div>
									</div>
								</strong>
						    </h3>
						</div>
                        
                    </div>
                    <div class="table-responsive">
						<table  id="tbAdresse" class="table table-striped table-bordered">
                            <thead class="table-light">
                            <tr>
								{{-- <th class="deadline" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Condition</th>	 --}}
								<th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
								<th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
								<th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Application</th>
								<th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Method</th>
								{{-- <th class="image" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Image</th> --}}
								{{-- <th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Requested Date</th>
								<th class="proceduredate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Actual Date</th> --}}
								<th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing #</th>
								{{-- <th class="registrationno" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Registration #</th> --}}
								<th class="class"  class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">class</th>						
								<th class="excerpt" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client</th>	
								<th class="country"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>	
								<th class="action"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Action</th>	

                            </tr>
                            </thead>
                            <tbody>
								@forelse($posts as $post)
								@php
												$colors = "";
												$Filed = "Filed";
												$Published = "Published";
												$Opposed = "Opposed";
												$Registered = "Registered";
												$officeaction = "Office Action";
												$abandon = "Abandon";
												$Nodeadline = "No Deadline";
												$status= ($post->status);
											
														if(($status == $Filed)){
															
															$colors = "color:black;background-color:yellow;";
														}elseif($status == $Published){
													
															$colors = "color:black;background-color:green;";
														}elseif ($status == $Opposed) {
															
															$colors = "color:black;background-color:orange;";
														}elseif ($status == $Registered) {
														
															$colors = "color:black;background-color:violet;";
														}elseif($status == 	$Nodeadline  ){

															$colors = "color:black;background-color:white;";
														}elseif($status == $officeaction ){
															
															$colors = "color:black;background-color:gray;";
														}

														elseif($status == $abandon ){
															
															$colors = "color:black;background-color:red;";
														}
											 @endphp
								<tr>
									{{-- <td class="deadline" style="{{ $color }}" href="" >
										<a style="f; align-item:center; font-size:12; color:black;" href="{{ route('post.show', $post) }}">

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
										
											 
									</td> --}}
								<td class="aiptref"><a style="font-size:12; color: black; f" href="{{ route('post.show', $post) }}">{{$post->aiptref}}</a></td>
								<td class="clientref"><a style="font-size:12; color: black; f" href="{{ route('post.show', $post) }}">{{ $post->clientref }}</a></td>
                                <td class="title"><a style="font-size:12; color: black; f" href="{{ route('post.show', $post) }}">{{ $post->title }}</a></td>
                                <td class="status" style="{{ $colors }}"><a style="font-size:12; color: black; " href="{{ route('post.show', $post) }}">
									
										<a style="f; align-item:center; font-size:12; color:black;" href="{{ route('post.show', $post) }}">

									
												@php
												$colors = "";
												$Filing = "Filing";
												$Rejected = "Rejected";
												$Registration = "Final Registration";
												$Publication = "Publication";
												$NoDeadline = "No Deadline";
												$status= ($post->status);
											
														if(($status == $Filing)){
															
															$color = "color:black;background-color:yellow;";
														}elseif($status == $Publication){
													
															$color = "color:black;background-color:green;";
														} elseif ($status == $Rejected) {
															
															$color = "color:black;background-color:orange;";
														}	elseif ($status == $Registration) {
														
															$color = "color:black;background-color:violet;";
														}elseif($status == $NoDeadline ){
															$color = "color:black;background-color:white;";
														}
											 @endphp
											  </button>

										
										</a>
										
											 
								
									
									{{ $post->status }}</a>
								</td>
                                {{-- <td class="image">
								</a>  --}}
								{{-- <img style='width: 60%' src="{{Storage::disk('s3')->temporaryUrl($post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg', now()->addMinutes(20))}}" /> --}}
{{-- 
									<img style='width: 30%; height:20' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
								</td> --}}
                                {{-- <td  class="requesteddate">
									<a style="font-size:15; color:black; "  href="{{ route('post.show', $post) }}">
										@php
												$expire = strtotime($post->requesteddate);
												$today = strtotime("today midnight");
												$day_diff = $today - $expire; 
												$default  =  strtotime("01/01/0001");                               
												$color = "";
												$deadline = "Deadline";
												$upcomming = "Upcoming";
												$safe = "01/01/0001";
												$done = "done";
														if(($expire == $default)){
															echo "No Deadline";
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
										<span> - {{ $post->requesteddate }}</span>
										</a>
								</td>

								<td class="proceduredate">
									<a style="font-size:12; color: black; f"  href="{{ route('post.show', $post) }}">
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
															echo "No Deadline";
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
										<span> - {{ $post->proceduredate }}</span>
										
									</a>
								</td> --}}
								
								<td class="slug"  href="{{ route('post.show', $post) }}"><a style="font-size:12; color: black; f"  href="{{ route('post.show', $post) }}">{{ $post->slug }}</a></td>
								{{-- <td class="registrationno"  href="{{ route('post.show', $post) }}"><a style="font-size:12; color: black; f"  href="{{ route('post.show', $post) }}">{{ $post->registrationno }}</a></td> --}}
								<td class="class"  href="{{ route('post.show', $post) }}"><a style="font-size:12; color: black; f"  href="{{ route('post.show', $post) }}">{{ $post->class }}</a></td>
								<td class="excerpt"  href="{{ route('post.show', $post) }}"><a style="font-size:12; color: black; f"  href="{{ route('post.show', $post) }}">{{ $post->excerpt }}</a></td>
								<td class="country"  href="{{ route('post.show', $post) }}"><a style="font-size:12; color: black; f"  href="{{ route('post.show', $post) }}">{{ $post->country }}</a></td>

								<div class="d-flex order-actions">
									<td class="action"><a href="{{ route('admin.posts.edit', $post) }}" class=""><i class='bx bxs-edit'></i></a></td>
								</div>
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
