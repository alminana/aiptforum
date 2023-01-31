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
			<div class="">
            
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-8">
					<div class="card-body">
					
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
									<th style="font-size:11px;">No.</th>
									<th style="font-size:11px;">AIPTREF</th>
										<th style="font-size:11px;">Client Reference</th>
										<th style="font-size:11px;">Application</th>
										{{-- <th style="font-size:11px;">Remaining days</th> --}}
										<th style="font-size:11px;">Deadline</th>
                                        <th style="font-size:11px;">Method</th>
										<th style="font-size:11px;">Requested Deadline</th>
										<th style="font-size:11px;">Actual Deadline</th>
										<th style="font-size:11px;">Filing no:</th>
										<th style="font-size:11px;">Registration no:</th>
                                        <th style="font-size:11px;">Class</th>
										<th style="font-size:11px;">Client</th> 
										<th style="font-size:11px;">Country</th>
										<th style="font-size:11px;">Status</th>
										{{-- <th style="font-size:11px;">Created_At</th> --}}
                                       
									</tr>
								</thead>
								<tbody>
							@foreach($posts as $post)
								
							<tr>
							
							    <!-- <td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->aiptref}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->clientref}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}"></a>{{ $post->title }}</td> -->

								@php
									// $procedureDate =  '2022-11-06';
									// $remaining = \Carbon\Carbon::now()->diffInDays($procedureDate);
									// if($remaining <=  7) {
									// 	dd("red");
									// }else {
									// 	dd("not 7 days");
									// }
									$expire = strtotime($post->proceduredate);
									$today = strtotime("today midnight");
									$day_diff = $today - $expire;                                    
									$color = "";
									$deadline = "Deadline";
									$upcomming = "Upcoming";
									$safe = "safe";
									$done = "done";
									if(($today == NULL)){
										echo "new ";
										$color = "color:black;background-color:white;";
									}elseif($today >= $expire){
										echo "expired ";
										$color = "color:black;background-color:red;";
									} elseif ($day_diff <= 30) {
										echo "active";
										$color = "color:black;background-color:yellow;";
									}elseif ($day_diff > 30 )  {
										echo "active";
									}
                                    // if (($remaining == NULL)) {
                                    //     $color = "color:black;background-color:white;";
                                    // } elseif(($remaining <= 7 )) {
                                    // 	$color = "color:black;background-color:red;";
                                    // }elseif(($remaining < 30 )) {
                                    //    $color = "color:black;background-color:yellow;";
                                    // }elseif(($remaining > 180 and $remaining > 365 )) {
                                    //    $color = "color:black;background-color:orange;";
                                    // }

                                    // $expire = strtotime($post->proceduredate);
									// $today = strtotime("today midnight");
									// $day_diff = $today - $expire;
									// $total =floor($day_diff/(60*60*24));


									// if($remaining <=  7) {
									// 	$color = "color:black;background-color:red;";
									// }
									// elseif($remaining <= 30) {
										
									// 	$color = "color:black;background-color:yellow;";
							
									// }elseif($remaining <= 180) {
										
									// 	$color = "color:black;background-color:green;";
										
									// }elseif($remaining < 0) {
										
									// 	$color = "color:black;background-color:white;";
										
									// }
									
									

								@endphp

                                
									<td href="{{ route('posts.show', $post) }}" style="{{ $color }}">{{  $post->id }}</td>
									<td href="{{ route('posts.show', $post) }}" style="{{ $color }}">{{  $post->aiptref }}</td>
									<td href="{{ route('posts.show', $post) }}" style="{{ $color }}">{{ $post->clientref }}</td>
									<td href="{{ route('posts.show', $post) }}" style="{{ $color }}">{{ $post->title }}</td>

									{{-- <td href="{{ route('posts.show', $post) }}" style="{{ $color, $deadline , $upcomming }}">
										<p>	
											<?php
									
									$expire = strtotime($post->proceduredate);
									$today = strtotime("today midnight");
									$day_diff = $today - $expire;                                   
									$color = "";
									$deadline = "Deadline";
									$upcomming = "Upcoming";
									$safe = "safe";
									$done = "done";
											if(($expire == NULL)){
												echo "new ";
												$color = "color:black;background-color:white;";
											}elseif($today >= $expire){
												echo "expired ";
												$color = "color:black;background-color:red;";
											} elseif ($day_diff <= 30) {
												echo "active";
												$color = "color:black;background-color:yellow;";
											}elseif ($day_diff > 30 )  {
												echo "active";
											}	
											
																				
										?>
										</p>
									</td> --}}
									<td href="{{ route('posts.show', $post) }}" style="{{ $color, $deadline , $upcomming }}">
										<p>	
											<?php
									
											$expire = strtotime($post->proceduredate);
											$today = strtotime("today midnight");
											$day_diff = $today - $expire;
											if($today >= $expire){
												echo "expired ";
												$color = "color:black;background-color:red;";
											} elseif ($day_diff <= 30) {
												echo "active";
												$color = "color:black;background-color:yellow;";
											}elseif ($day_diff > 30 )  {
												echo "active";
											}							
										    ?>
										
										</p>
									     	
									</td>
									<td style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->status }}</td>
									<td style="{{ $color }}">
										{{ $post->requesteddate }}
									</td>
									<td style="{{ $color }}">
										<button data-toggle="modal" data-target="#form" onClick="" class="btn btn-sm btn-danger" style="color: white">{{ $post->proceduredate }}</button>

									</td>
									
									<td style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->slug }}</td>
									<td style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->registrationno }}</td>
									<td style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->class }}</td>
									<td style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->excerpt }}</td>
									<td style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->country }}</td>
									<td style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->body }}</td>

                            	</td> 
                                
                            </td>
                            </tr>
								<!-- MODAL -->        
				<div class="modal" id="form" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title" id="defModalHead">Update Status</h4>
							</div>
							<form action="/users" method="POST" class="form-horizontal section">
				
								{{ csrf_field() }}
				
								<input type="hidden" name="_method" value="POST">
				
								<div class="modal-body">
									<label for="inputProductTitle" class="form-label"><b>Aipt Referrence</b></label>
									<input type="text" class="form-control" name="name" placeholder="User Name" value="" />
									
									<label for="inputProductTitle" class="form-label"><b>Application Name</b></label>
									<input type="text" class="form-control" name="name" placeholder="User Name" value="" />
									
									<label for="inputProductTitle" class="form-label"><b>Procedure</b></label>
									<input type="number" class="form-control" name="age" placeholder="User Age" value="" />

									<label for="inputProductTitle" class="form-label"><b>Status</b></label>
									<select required name='agent' class="form-control" class="single-select">
										
										<option value="">Done</option>
										<option value="">Waiting</option>
										<option value="">On Process</option>
										<option value="">Cancel</option>
									</select>

									@error('agent')
										<p class='text-danger'>{{ $message }}</p>
									@enderror
								</div>
				
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
				
							</form>
						</div>
					</div>
				</div>
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

    <script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
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
@endsection