@extends('main_layouts.master')

@section('title')
@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	@endsection
	@section("content")
    <div class="page-wrapper">
        <div class="page-content">
    
			<form method="GET" action="{{ route('categories.actual') }}" id="myForm">
                <p>List of Actual Deadline</p>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="tbAdresse"  class="table table-striped table-bordered">
								<thead>
									<tr>
										<th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
										<th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
										<th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Application</th>
										<th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Method</th>
										<th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Actual Date</th>
										<th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing #</th>
										<th class="class"  class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">class</th>						
										<th class="excerpt" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client</th>	
										<th class="country"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>	
		
									</tr>
								</thead>
								<tbody>


								
									@forelse($posts as $post)
									@php
                                                        $expire = strtotime($post->proceduredate);
                                                        $today = strtotime("today midnight");
                                                        $day_diff = $today - $expire; 
                                                        $default  =  strtotime("01/01/0001");                               
                                                        $color = "";
                                                        $deadline = "Deadline";
                                                        $upcomming = "Upcoming";
														$default = "01/01/0001";
                                                        $done = "done";
                                                        if(($expire == $default)){
                                              
                                                     $color = "display:none";
                                                      }elseif($today == $expire){
                                                      
                                                        $color = "color:black;background-color:orange;";
                                                      } elseif ($day_diff <= 30) {
                                                
                                                        $color = "color:black;background-color:yellow;";
                                                      }	elseif ($today >= $expire) {
                                               
                                                        $color = "display:none";
                                                      }	
                                                            
                                                      @endphp
									<tr>
								  
									<td style="{{ $color }}" class="aiptref"><a style="font-size:12; color: black; " href="{{ route('post.show', $post) }}">{{$post->aiptref}}</a></td>
									<td style="{{ $color }}" class="clientref"><a style="font-size:12; color: black; " href="{{ route('post.show', $post) }}">{{ $post->clientref }}</a></td>
									<td style="{{ $color }}" class="title"><a style="font-size:12; color: black; " href="{{ route('post.show', $post) }}">{{ $post->title }}</a></td>
									<td style="{{ $color }}" class="status"><a style="font-size:12; color: black; " href="{{ route('post.show', $post) }}">{{ $post->status }}</a></td>
								   
									<td  style="{{ $color }}" class="proceduredate">
										<a style="font-size:15; color:black; "  href="{{ route('post.show', $post) }}">
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
                                                         $color = "display:none";
                                                      }elseif($today == $expire){
                                                        echo "DueDate ";
                                                        $color = "color:black;background-color:orange;";
                                                      } elseif ($day_diff <= 30) {
                                                        echo "Upcoming";
                                                        $color = "color:black;background-color:yellow;";
                                                      }	elseif ($today >= $expire) {
                                                        echo "Expired";
														$color = "display:none";
                                                      }	
                                                            
                                                      @endphp
											<span> - {{ $post->proceduredate }}</span>
											</a>
									</td>
	
								
									
									<td style="{{ $color }}" class="slug"  href="{{ route('post.show', $post) }}"><a style="font-size:12; color: black; "  href="{{ route('post.show', $post) }}">{{ $post->slug }}</a></td>
									<td style="{{ $color }}" class="class"  href="{{ route('post.show', $post) }}"><a style="font-size:12; color: black; "  href="{{ route('post.show', $post) }}">{{ $post->class }}</a></td>
									<td style="{{ $color }}" class="excerpt"  href="{{ route('post.show', $post) }}"><a style="font-size:12; color: black; "  href="{{ route('post.show', $post) }}">{{ $post->excerpt }}</a></td>
									<td style="{{ $color }}" class="country"  href="{{ route('post.show', $post) }}"><a style="font-size:12; color: black; "  href="{{ route('post.show', $post) }}">{{ $post->country }}</a></td>
								</tr>
								@empty
								<p class='lead'>There are no Application to show.</p>
								@endforelse
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</form>
			

			
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