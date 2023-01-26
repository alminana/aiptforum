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


							
									$remaining = \Carbon\Carbon::now()->diffInDays($post->proceduredate);
									$color = "";
									$deadline = "Deadline";
									$upcomming = "Upcomming";
									$safe = "safe";
									$done = "done";
									if($remaining <=  7) {
										$color = "color:black;background-color:red;";
										
									}

									elseif($remaining <= 30) {
										
										$color = "color:black;background-color:yellow;";
							
									}elseif($remaining <= 180) {
										
										$color = "color:black;background-color:green;";
										
									}elseif($remaining < 0) {
										
										$color = "color:black;background-color:white;";
										
									}
									
									$expire = strtotime($post->proceduredate);
									$today = strtotime("today midnight");
									$day_diff =   $expire - $today;
									$total =floor($day_diff/(60*60*24));
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
											$day_diff =   $expire - $today;
											if ($remaining > 30 and  $remaining >= 180) {
												echo  floor($day_diff/(60*60*24)),"yellow";
											} elseif ($remaining > 15 and $remaining >= 30) {
												echo  floor($day_diff/(60*60*24)),"green";
											} elseif ($remaining == 7 and $remaining <= 7) {
												echo  floor($day_diff/(60*60*24)),"red";
											} elseif ($remaining == 0 and $remaining <= 0) {
												echo  floor($day_diff/(60*60*24)),"white";
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
											if($remaining >= 30){
												
												echo 'safe';

											} elseif ($remaining >= 15) {
												
												echo 'Upcoming';

											} elseif($remaining <= 7){
												echo 'Deadline';
												
											}	elseif($remaining <= 0){
												echo 'done';	
											}							
										?>
											{{-- {{$remaining}} --}}
											{{-- {{ $post->proceduredate->diffForHumans() }} --}}
										</p>
									     	
									</td>
									<td style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->status }}</td>
									<td style="{{ $color }}">
										{{ $post->requesteddate }}
									</td>
									<td style="{{ $color }}">
										{{ $post->proceduredate }}
									</td>
									
									<td style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->slug }}</td>
									<td style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->registrationno }}</td>
									<td style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->class }}</td>
									<td style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->excerpt }}</td>
									<td style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->country }}</td>
									<td style="{{ $color }}" href="{{ route('posts.show', $post) }}">{{ $post->body }}</td>
									{{-- <td style="{{ $color }}">{{ $post->created_at }} </td> --}}

								{{-- @if($remaining <= 30)
									
								
								@elseif($remaining <= 7 )

									<td style='color:white;background-color:red;'>{{ $post->aiptref }}</td>
									<td style='color:white;background-color:red;'>{{ $post->clientref }}</td>
									<td style='color:white;background-color:red;'>{{ $post->title }}</td>

									<td style='color:white;background-color:red;'>
										<p>     
												7'days Remaining
										</p>
									</td>
									<td style='color:white;background-color:red;'>{{ $post->status }}</td>
									<td style='color:white;background-color:red;'>
										{{ $post->proceduredate }}
									</td>
									
									<td style='color:white;background-color:red;'>{{ $post->slug }}</td>
									<td style='color:white;background-color:red;'>{{ $post->class }}</td>
									<td style='color:white;background-color:red;'>{{ $post->excerpt }}</td>
									<td style='color:white;background-color:red;'>{{ $post->country }}</td>
									<td style='color:white;background-color:red;'>{{ $post->body }}</td>
									<td style='color:white;background-color:red;'>{{ $post->created_at  }}</td>
								@else 
									
									<td style='color:white;background-color:Green;'>{{ $post->aiptref }}</td>
									<td style='color:white;background-color:Green;'>{{ $post->clientref }}</td>
									<td style='color:white;background-color:Green;'>{{ $post->title }}</td>

									<td style='color:white;background-color:Green;'>
										<p>     
												Done
										</p>
									</td>
									<td style='color:white;background-color:Green;'>{{ $post->status }}</td>
									<td style='color:white;background-color:Green;'>
										{{ $post->proceduredate }}
									</td>
									<td style='color:white;background-color:Green;'>{{ $post->slug }}</td>
									<td style='color:white;background-color:Green;'>{{ $post->class }}</td>
									<td style='color:white;background-color:Green;'>{{  $post->excerpt }}</td>
									<td style='color:white;background-color:Green;'>{{ $post->country }}</td>
									<td style='color:white;background-color:Green;'>{{ $post->body }}</td>
									<td style='color:white;background-color:Green;'>{{ $post->created_at  }}</td>
								@endif --}}
							
								

							
								
                                
                            	</td> 
                                <!-- <td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->status}}</a></td>
								<td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">
								
                                {{date('m/d/Y',strtotime(($post->proceduredate)))}} 
                                 </a></td>
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->category->name}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->slug}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->class}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->excerpt}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->country}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->body}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}"> {{date('m/d/Y',strtotime(($post->created_at)))}} </a></td> -->
                                
                            </td>
                            </tr>
                            {{-- @empty
								<p class='lead'>There are no Application to show.</p> --}}
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

