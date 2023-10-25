@extends('main_layouts.master')
@section('title')
@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	@endsection
	@section("content")
   	<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				
				</div>
						<!--end row-->
			<div class="row">
				<div class="col-12">
					<div>
						<div class="p-2">
							<h3 class="font-size-16">
								<strong>
									Filter Requested Date
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
					<form method="GET" action="{{route('deadline.trequested')}}">
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
                                <h3 class="font-size-16"><strong>Reports 
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
							
                                    <th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
                                    <th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
                                    <th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Application</th>
                                    <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Method</th>
                                    <th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Requested Date</th>
                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing #</th>
                                    <th class="class"  class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">class</th>						
                                    <th class="excerpt" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client</th>	
                                    <th class="country"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>	
									</tr>
								</thead>
                           
								<tbody>
								@forelse($allData as $key => $item)
                                @php
                                $expire = strtotime($item->requesteddate);
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
							<tr>
							
							    <td style="font-size:11px;"><a style="color:black;" href="" >{{$item->aiptref}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="" >{{$item->clientref}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="" ></a>{{$item->title }}</td>
                                <td style="font-size:11px;"><a style="color:black;"href="" ></a>{{$item->status }}</td>
							
                                <td style="{{ $color }}" class="requesteddate">
                                    <a style="font-size:15; color:black; " >
                                        @php
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
                                        <span> - {{date('m/d/Y',strtotime(($item->requesteddate)))}} </span>
                                        </a>
                                </td>
								
                                <td style="font-size:11px;"><a style="color:black;"href="" >{{$item->slug}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="" >{{$item->class}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;"href="" >{{$item->excerpt}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;"href="" >{{$item->country}}</a></td>
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




    <script src="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/js/index.js') }}"></script>
@endsection
