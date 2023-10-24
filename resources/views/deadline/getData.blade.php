@extends('main_layouts.master')

@section('title', ' Category | AIPTFORUM')
@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	@endsection

@section('content')  


		<!--start page wrapper -->
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
									Select Date to filter the data 
								</strong>
						    </h3>
						</div>

					</div>

				</div>
			</div>
			<!--breadcrumb-->
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-8">
					<div class="card-body">
					<form method="GET" action="{{route('deadline.getData')}}">
						{{ csrf_field() }}
							<div class="row">
								<div class="col-md-4">
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
										<button type="submit" value="Submit" class="btn btn-primary">Filter</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!--end breadcrumb-->
			    <div class="row">
                    <div class="col-12">
                        <div>
                            <div class="p-2">
                                <h3 class="font-size-16"><strong>Daily Reports 
                                    <span class="btn btn-info"> {{ date('d-m-Y',strtotime($start_date)) }} </span> -
                                    <span class="btn btn-success"> {{ date('d-m-Y',strtotime($end_date)) }} </span>
                                </strong></h3>
                            </div>

                        </div>

                    </div>
                </div>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table  id="tbAdresse" class="table table-striped table-bordered">
								<thead>
									<tr>
									<th style="font-size:11px;">AIPTREF</th>
										<th style="font-size:11px;">Client Reference</th>
										<th style="font-size:11px;">Application</th>
										<th style="font-size:11px;">Remaining days</th>
                                        <th style="font-size:11px;">Method</th>
										<th style="font-size:11px;">Requested Deadline</th>
										<th style="font-size:11px;">Actual Deadline</th>
                                        {{-- <th style="font-size:11px;">Type</th> --}}
										<th style="font-size:11px;">Filing no:</th>
                                        <th style="font-size:11px;">Class</th>
										<th style="font-size:11px;">Client</th> 
										<th style="font-size:11px;">Country</th>
										<th style="font-size:11px;">Status</th>
										<th style="font-size:11px;">Created_At</th>
                                        <!-- <th style="font-size:11px;">Today</th> -->
									</tr>
								</thead>
								<tbody>
								@forelse($allData as $key => $item)
							<tr>
							
							    <td style="font-size:11px;"><a style="color:black;" href="" >{{$item->aiptref}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="" >{{$item->clientref}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="" ></a>{{$item->title }}</td>
							
								<td  style="font-size:11px; width:50px;"><a style="color:black;" href="" >
									<?php
									
									$expire = strtotime($item->proceduredate);
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
											
																				
										?>
								
								
                                </a>
                            	</td>
                                <td style="font-size:11px;"><a style="color:black;"href="" >{{$item->status}}</a></td>
								<td style="font-size:11px;"><a style="color:black;" href="" >
							
									{{date('m/d/Y',strtotime(($item->requesteddate)))}} 
								</a></td>
								
								<td style="font-size:11px;"><a style="color:black;" href="" >
							
                                {{date('m/d/Y',strtotime(($item->proceduredate)))}} 
                                 </a></td>
								{{-- <td style="font-size:11px;"><a style="color:black;"href="" >{{$item->category->name}}</a></td> --}}
								<td style="font-size:11px;"><a style="color:black;"href="" >{{$item->slug}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;"href="" >{{$item->class}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;"href="" >{{$item->excerpt}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;"href="" >{{$item->country}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;"href="" >{{$item->body}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="" > {{date('m/d/Y',strtotime(($item->created_at)))}} </a></td>
                        
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
		