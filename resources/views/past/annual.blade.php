@extends('main_layouts.master')

@section('title')
@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	@endsection
	@section("content")
    <div class="page-wrapper">
        <div class="page-content">
         
			<form method="GET" action="{{ route('past.annual') }}" id="myForm">
        <p>Annual Deadline: Please input in the Annual Deadline Date Search Column Upcoming, DueDate, No Deadline and Expired  </p> 

				<hr/>
        <div class="table-responsive">
          <table id="tbAdresse" cellspacing="0" style="border:1px color:grey;" class="table table-striped table-bordered" role="grid" aria-describedby="tbAdresse_info">
            <thead>
            <tr role="row">
                            
              <th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
              <th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
              <th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Title</th>
              <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client</th>
              <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Annual Date</th>


              <th class="regular_no" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Regular no</th>
              <th class="proceduredate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing no.</th>
              <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Procedure</th>
             
              <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>
         				
 
              <th class="country"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Actions</th>		
                           
                  
                                </tr>
                                </thead>
                                  <tfoot>
                                    <tr role="row">
                                                     
                                      <th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
                                      <th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
                                      <th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Title</th>
                                      <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client</th>
                                      <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Annual Date</th>

                        
                                      <th class="regular_no" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Regular no</th>
                                      <th class="proceduredate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing no.</th>
                                      <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Procedure</th>
     
                                      <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>
                      				
                                      <th class="country"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Actions</th>		
                                                          </tr>
                                  </thead>
                                
                                <tbody>
                                
                                 @forelse ($pasts as $past)
                                                @php
                                                      $expire = strtotime($past->annual_deadline);
                                                      $today = strtotime("today midnight");
                                                      $day_diff = $today - $expire; 
                                                      $default  =  strtotime("01/01/0001");                               
                                                      $color = "";
                                                      $deadline = "Deadline";
                                                      $upcomming = "Upcoming";
                                                      $safe = "01/01/0001";
                                                      $done = "done";
                                                      if(($expire == $default)){
                                               
                                                      $color = "color:black;background-color:white;";
                                                    }elseif($today == $expire){
                                                
                                                      $color = "color:black;background-color:#ffab91;";
                                                    } elseif ($day_diff <= 30) {
                                                 
                                                      $color = "color:black;background-color:#faf3c0;";
                                                    }	elseif ($today >= $expire) {
                                             
                                                      $color = "color:black;background-color:#ffb3b3;";
                                                    }	
                                                          
                                                    @endphp
                              
                                                  <td style="{{ $color }}" class="aiptref"><a style="font-size:12; color: black; " href="/past/{{ $past->id }}">{{ $past->aiptref }}</a></td>
                                                  <td style="{{ $color }}" class="clientref"><a style="font-size:12; color: black; " href="/past/{{ $past->id }}">{{$past->clientref}}</a></td>
                                                  <td style="{{ $color }}" class="title"><a style="font-size:12; color: black; " href="/past/{{ $past->id }}">{{$past->title}}</a></td>
                                                  <td style="{{ $color }}" class="client"><a style="font-size:12; color: black; " href="/past/{{ $past->id }}">{{$past->client}}</a></td>
                                                  
                                                  <td  style="{{ $color }}"  class="annual_deadline">
                                                    <a style="; align-item:center; font-size:12; color: black; " href="/past/{{ $past->id }}">
                                                      @php
                                                      $expire = strtotime($past->annual_deadline);
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
                                                      $color = "color:black;background-color:white;";
                                                    }elseif($today == $expire){
                                                      echo "DueDate ";
                                                      $color = "color:black;background-color:#ffab91;";
                                                    } elseif ($day_diff <= 30) {
                                                      echo "Upcoming";
                                                      $color = "color:black;background-color:#faf3c0;";
                                                    }	elseif ($today >= $expire) {
                                                      echo "Expired";
                                                      $color = "color:black;background-color:#ffb3b3;";
                                                    }	
                                                          
                                                    @endphp
                                                      <span> - {{$past->annual_deadline}}</span>  
                                                      </a>
                                                  </td>

                                                
                                                  <td style="{{ $color }}" class="title"><a style="font-size:12; color: black; " href="/past/{{ $past->id }}">{{$past->regular_no}}</a></td>

                                                  <td style="{{ $color }}" class="filingno"><a style="font-size:12; color: black; " href="/past/{{ $past->id }}">{{$past->filingno}}</a></td>
                                                  <td style="{{ $color }}" class="procedure"><a style="font-size:12; color: black; " href="/past/{{ $past->id }}">{{$past->procedure}}</a></td>
                  
                                                
                                              
                                                  <td style="{{ $color }}" class="country"><a style="font-size:12; color: black; " href="/past/{{ $past->id }}">{{$past->country}}</a></td>
                  
                                           
                                                  
                                                  <td style="{{ $color }}">
                                                    <div class="d-flex order-actions">
                                                      <a href="{{ route('past.edit', $past) }}" class=""><i class='bx bxs-edit'></i></a>	
                                                     {{-- <form method='post' action="{{ route('past.destroy', $past) }}" id='delete_form_{{ $past->id }}'>
                                                        @csrf 
                                                        @method('DELETE')
                                                      
                                                        <a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"  class="ms-3"><i class='bx bxs-trash'></i></a>
                                                    
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                          <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to delete this data </h1>
                                                            <br>
                                                            <div class="container">
                                                              <p>{{$past->aiptref}}</p>
                                                            </div>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                          </div>
                                                          
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $past->id }}').submit();" class="btn btn-primary">Delete</button>
                                                          </div>
                                                          </div>
                                                        </div>
                                                        </div>
                                                        </form> 								 --}}
                                                    </div>
                                                  </td>
                                              </tr>
                                              @empty
                                              <p class='lead'>There are no Patent to show.</p>
                                                  @endforelse
                                </tbody>
                              </table>
                              </div>

			</form>
			

			
        </div>
    </div>
@endsection

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
