@extends('main_layouts.master')

@section('title')
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
			<div class="">
            
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-8">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<div>
											<h5><p style="color: red">Check the checkbox to hide the row Items *</p></h5>
										</div>
										<div class="row form-check-inline">
											<div class="container-fluid mt-12">
												<div class="row">
												<div class="col" style="color:black">
													<div class="form-check">
														<label class="form-check-label">
														  <input type="checkbox" class="form-check-input" id="post_id" name="post_id">ID
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
													
													</div>
												
													<div class="col" style="color:black">
													<div class="form-check">
														<label class="form-check-label">
														  <input type="checkbox" class="form-check-input" name="status">Method
														</label>
													  </div>
													  <div class="form-check">
														<label class="form-check-label">
														  <input type="checkbox" class="form-check-input" name="slug">Filing 
														</label>
													  </div>
													  <div class="form-check ">
														<label class="form-check-label">
														  <input type="checkbox" class="form-check-input" name="registrationno" >Reg.no.
														</label>
													  </div>
													  <div class="form-check ">
														<label class="form-check-label">
														  <input type="checkbox" class="form-check-input" name="requesteddate" >Req. 
														</label>
													  </div>
				
												  </div>
												  <div class="col" style="color:black">
													<div class="form-check">
														<label class="form-check-label">
														  <input type="checkbox" class="form-check-input" name="country">Country
														</label>
													  </div>
													  <div class="form-check">
														<label class="form-check-label">
														  <input type="checkbox" class="form-check-input" name="client">Client
														</label>
													  </div>
													  <div class="form-check ">
														<label class="form-check-label">
														  <input type="checkbox" class="form-check-input" name="class" >Class
														</label>
													  </div>
													  <div class="form-check ">
														<label class="form-check-label">
														  <input type="checkbox" class="form-check-input" name="body" >Description
														</label>
													  </div>
												  </div>
												  <div class="col" style="color:black">
													<div class="form-check">
														<label class="form-check-label">
														  <input type="checkbox" class="form-check-input" name="country">Country
														</label>
													  </div>
													  <div class="form-check ">
														<label class="form-check-label">
														  <input type="checkbox" class="form-check-input" name="proceduredate" >Actual
														</label>
													  </div>
													  <div class="form-check ">
														<label class="form-check-label">
														  <input type="checkbox" class="form-check-input" name="deadline" >Status
														</label>
													  </div>
												  </div>
												  
												  
												</div>
											  </div>
										
										</div>
									</div>
									{{-- graph --}}
									<div class="col-md-6">
										<div id="piechart" style="width: 500px; height: 200px;"></div>
										
									</div>
								</div>
							
							</div>
						</div>
						

						
			
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th class="post_id" style="font-size:11px;">ID</th>
										<th class="aiptref" style="font-size:11px;">AIPTREF</th>
										<th class="clientref" style="font-size:11px;">Client Reference</th>
										<th class="title" style="font-size:11px;">Application</th>
										<th class="deadline" style="font-size:11px;">Status</th>
                                        <th class="status" style="font-size:11px;">Method</th>
										<th class="requesteddate" style="font-size:11px;">Requested Deadline</th>
										<th class="proceduredate" style="font-size:11px;">Actual Deadline</th>
										<th class="slug" style="font-size:11px;">Filing no:</th>
										<th class="registrationno" style="font-size:11px;">Registration no:</th>
                                        <th class="class" style="font-size:11px;">Class</th>
										<th class="excerpt" style="font-size:11px;">Client</th> 
										<th class="country" style="font-size:11px;">Country</th>
										<th class="body" style="font-size:11px;">Condition</th>
										<th class="body" style="font-size:11px;">Created At</th>
                                       
									</tr>
								</thead>
								<tbody>
							@foreach($posts as $post)
								
							<tr>
{{-- 							
								{{-- <?php
										$remaining = \Carbon\Carbon::now()->diffInDays($item->proceduredate);
										$expire = strtotime($item->proceduredate);
											$today = strtotime("today midnight");
											$day_diff =   $expire - $today;
											if($remaining > 7){
												echo floor($day_diff/(60*60*24)),'<p style="color: yellow;color:black; text-align: center">Upcoming </p>';	
											} else {
												
												echo floor($day_diff/(60*60*24)),'<p style="color: red;color:black; text-align: center">Deadline </p>' ;
											}
                                       									  
								?>  --}}
								@php
									$remaining = \Carbon\Carbon::now()->diffInDays($post->requesteddate);
									$expire = strtotime($post->requesteddate);
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

                     
									<td class="post_id" href="{{ route('posts.show', $post) }}" style="{{ $color }}">{{  $post->id }}</td>
									<td class="aiptref" href="{{ route('posts.show', $post) }}" style="{{ $color }}">{{  $post->aiptref }}</td>
									<td class="clientref" href="{{ route('posts.show', $post) }}" style="{{ $color }}">{{ $post->clientref }}</td>
									<td class="title" href="{{ route('posts.show', $post) }}" style="{{ $color }}">{{ $post->title }}</td>

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
									<td class="" style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->status }}</td>
									<td class="requesteddate" style="{{ $color }}">
										{{ $post->requesteddate }}
									</td>
									<td class="proceduredate" style="{{ $color }}">
										<a href="{{ route('admin.posts.edit', $post) }}"><button  class="btn btn-primary">{{ $post->proceduredate }}</button></a>

									</td>
									
									<td class="slug" style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->slug }}</td>
									<td class="registrationno" style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->registrationno }}</td>
									<td class="class" style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->class }}</td>
									<td class="excerpt" style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->excerpt }}</td>
									<td class="country" style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->country }}</td>
                               

                                    <td class="body" style="{{ $color }}" href="{{ route('posts.show', $post) }}">
                
                                        {{ $post->body }}
                                    
                                    </td> 
									<td class="country" style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->created_at }}</td>

                            	</td> 
                                
                            </td>
                            </tr>
								
							@endforeach
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.s">

	</script>


	<script>
		$("input:checkbox").attr("checked",false).click(function(){
			var shcolumn="."+$(this).attr("name");
			$(shcolumn).toggle();
		});
	</script>
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

<script type="text/javascript">
	$("input[type='button']").click(function(){
	alert(this.value);
	});
	</script>

		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() {
			var data = google.visualization.arrayToDataTable([
			['Task', 'Hours per Day'],
			['New Application', 11],
			['Expired',  2],
			['Active',  12],
			['Done',  2],
			]);
			var options = {
			title: 'Application Statistic'
			};
			var chart = new google.visualization.PieChart(document.getElementById('piechart'));
			chart.draw(data, options);
		}
		</script>
@endsection
