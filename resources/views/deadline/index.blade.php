@extends('main_layouts.master')

@section('title', ' Category | AIPTFORUM')
@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	@endsection

@section('content')  


		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
            
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Applications</div>
					<div class="ps-3">
						<form action="/filter" method="post">
							@csrf
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0">

								</ol>
							</nav>
						</form> 
					
					</div>

				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
									<th style="font-size:11px;">AIPTREF</th>
										<th style="font-size:11px;">Client Reference</th>
										<th style="font-size:11px;">Application</th>
										<th style="font-size:11px;">Remaining days</th>
                                        <th style="font-size:11px;">Method</th>
										<th style="font-size:11px;">Deadline</th>
                                        <th style="font-size:11px;">Type</th>
										<th style="font-size:11px;">Filing no:</th>
                                        <th style="font-size:11px;">Class</th>
										<th style="font-size:11px;">Client</th> 
										<th style="font-size:11px;">Country</th>
										<th style="font-size:11px;">Status</th>
                                        <!-- <th style="font-size:11px;">Today</th> -->
									</tr>
								</thead>
								<tbody>
								@forelse($posts as $post)
							<tr>
							
							    <td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->aiptref}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->clientref}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}"></a>{{ $post->title }}</td>
                                <td  style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">
									<?php
									
							
									  if($floor = 7){
										$to_date = time();
										// $from_date = strtotime("2022-10-1");
										$from_date = strtotime($post->proceduredate);
										$day_diff = $to_date - $from_date;
										  echo floor($day_diff/(60*60*24));
										
									  }else{
										$to_date = time();
										// $from_date = strtotime("2022-10-1");
										$from_date = strtotime($post->proceduredate);
										$day_diff = $to_date - $from_date;
										  echo floor($day_diff/(60*60*24));
										
									  }
									  
									?>
								
                                </a>
                            </td>
                                <td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->status}}</a></td>
								<td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">
								<input type="date" id="d2" value="{{$post->proceduredate}}">
                                <!-- {{date('m/d/Y',strtotime(($post->proceduredate)))}}  -->
                                 </a></td>
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->category->name}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->slug}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->class}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->excerpt}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->country}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->body}}</a></td>
                                <!-- <td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">
									<input type="date" id="d1" value="{{$post->proceduredate}}">
								
                                </a> -->
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
		// try 1
        // $(document).on('proceduredate',function(){
        //     var proceduredates = document.getElementById(".proceduredate").value;
        //     var d1 = Math.abs((new Date().getTime() / 1000).toFixed(0));
        //     var d2 = Math.abs((new Date(proceduredates).getTime() / 1000).toFixed(0));

        //     const dateOne = new Date(d1);
        //     const dateOne = new Date(d2);
        //     const time = Math.abs(dateTwo - dateOne);
        //     const days = Math.ceil(time / (1000 * 60 * 60 * 24));
        //     document.getElementId(".remaining_date").innerHTML=days;
        //     $(this).closest("tr").find("input.remaining_date").val(total); 
        // });

			// try 2
		function calculateDays(){
			var d1 = document.getElementById("d1").value;
			var d2 = document.getElementById("d2").value;
			const dateOne = new Date(d1);
			const dateTwo = new Date(d2);
			const time = Math.abs(dateTwo - dateOne);
			const days = Math.ceil(time / (1000 * 60 * 60 * 24));
			document.getElementById("output").innerHTML=days;
		}
</script>

       

       
    @endsection