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
                    
			<!--breadcrumb-->
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-left mb-8">
					<div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <form method="GET" action="{{route('deadline.dashboard')}}">
                                    {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                      
                                                    <label for=""> Trademark Procedure</label>
                                                    <div class="mb-3">
                                                        
                                                        <select required class="form-control" name='status' class="single-select">
                                                            <option value="">Search Trademark Procedure</option>
                                                            @foreach($method as $key => $method)
                                                            <option value="{{ $method->method }}">{{ $method->method }}</option>
                                                      
                                                            @endforeach
                                                        </select>

                                                        @error('method')
                                                            <p class='text-danger'>{{ $message }}</p>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for=""></label><br>
                                                    <button type="submit" value="Submit" class="btn btn-primary">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                            <div class="col-md-6">
                             
                               
                                    {{ csrf_field() }}
                                        <div class="row">
                                          
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for=""></label><br>
                                                    <a href="{{ route('deadline.getData') }}">
                                                        <button type="button" value="Submit" class="btn btn-primary">Filter</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                          </div>

                    </div>
					
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
                            <div class="col-6">
                                <table class="table">
                                    <caption>
                                     Color Legend
                                    </caption>
                                    <tr>
                                        <td scope="col" style="background-color:white;">New Application</td>
                                      <td scope="col" style="background-color:rgb(246, 246, 188);">Filed</td>
                                      <td scope="col" style="background-color:rgb(177, 236, 177);">Published</td>
                                      <td scope="col" style="background-color:violet;">Registered</td>
                                      <td scope="col" style="background-color:gray;" >Office Action</td>
                                      <td scope="col" style="background-color:orange;">Opposed</td>
                                      <td scope="col" style="background-color:rgb(245, 151, 151);">Abandon</td>
                                    
                                    </tr>
                                  </table>
                            </div>
							<table  id="tbAdresse" class="table table-striped table-bordered">
								<thead>
									<tr>
							
                                    <th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
                                    <th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
                                    <th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Application</th>
                                    <th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Image</th>
                                    <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Method</th>
                                    <th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Requested Date</th>
                                    <th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Actual Date</th>
                                    {{-- <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing #</th>
                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Registration#</th> --}}
                                    <th class="class"  class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">class</th>						
                                    <th class="excerpt" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client</th>	
                                    <th class="country"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>	
                                    {{-- <th class="country"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Created_At</th>	 --}}
                                    <th class="country"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Action</th>	
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
                                    



                         
                                    $colors = "";
												$Filed = "Filed";
												$Published = "Published";
												$Opposed = "Opposed";
												$Registered = "Registered";
												$officeaction = "Office Action";
												$abandon = "Abandon";
												$NewApplication = "New Application";
												$status= ($item->status);
											
														if(($status == $Filed)){
															
															$colors = "color:black;background-color:rgb(246, 246, 188);";
														}elseif($status == $Published){
													
															$colors = "color:black;background-color:rgb(177, 236, 177);";
														}elseif ($status == $Opposed) {
															
															$colors = "color:black;background-color:orange;";
														}elseif ($status == $Registered) {
														
															$colors = "color:black;background-color:violet;";
														}elseif($status == 	$NewApplication  ){

															$colors = "color:black;background-color:white;";
														}elseif($status == $officeaction ){
															
															$colors = "color:black;background-color:gray;";
														}

														elseif($status == $abandon ){
															
															$colors = "color:black;background-color:rgb(245, 151, 151);";
														}
										
                              @endphp

                              
							<tr>
							
							    <td style="font-size:11px;"><a style="color:black;" href="" >{{$item->aiptref}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="" >{{$item->clientref}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="" ></a>{{$item->title }}</td>
                                <td style="font-size:11px;"><a style="color:black;"href="" ></a>
                                 
                                        <img style='width: 20%; height:20%;' src="/storage/{{ $item->image ? $item->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
                                        <a style="color:black;">
    
                                        {{-- <img style='width: 60%' src="{{Storage::disk('s3')->temporaryUrl($post->image->path, now()->addMinutes(20))}}" /> --}}
                                        {{-- <img style='width: 60%' src="{{Storage::disk('s3')->temporaryUrl($post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg', now()->addMinutes(20))}}" /> --}}
                                        </a> 
                                    
                                </td>
                                <td style="{{ $colors }}" style="font-size:11px;"><a style="color:black;"href="" ></a>
                                    @php
                                    $colors = "";
												$Filed = "Filed";
												$Published = "Published";
												$Opposed = "Opposed";
												$Registered = "Registered";
												$officeaction = "Office Action";
												$abandon = "Abandon";
												$Nodeadline = "No Deadline";
												$status= ($item->status);
											
                                                if(($status == $Filed)){
															
															$colors = "color:black;background-color:rgb(246, 246, 188);";
														}elseif($status == $Published){
													
															$colors = "color:black;background-color:rgb(177, 236, 177);";
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
															
															$colors = "color:black;background-color:rgb(245, 151, 151);";
														}
											 @endphp
                                    {{$item->status }}
                                </td>
                              
                                <td style="{{ $color }}" class="requesteddate">
                                    <a style="font-size:15; color:black; " >
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
                                <td style="{{ $color }}" class="proceduredate">
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
                            
                                {{-- <td style="font-size:11px;"><a style="color:black;"href="" >{{$item->slug}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;"href="" >{{$item->registrationno}}</a></td> --}}
                                <td style="font-size:11px;"><a style="color:black;"href="" >{{$item->class}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;"href="" >{{$item->excerpt}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;"href="" >{{$item->country}}</a></td>
                                {{-- <td style="font-size:11px;"><a style="color:black;"href="" >{{$item->created_at}}</a></td> --}}
                                <td style="font-size:11px;">
                                <div class="d-flex order-actions">
                                  
                                    <a href="{{ route('post.show', $item) }}"><i class='bx bxs-comment-add'></i></a>
                             
                                    <a href="{{$item->inputPfolderlink}}" target="_blank">Folder Link</a>
                                </div>
                                </td>
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
<script src="{{ asset('admin_dashboard_assets/plugins/select2/js/select2.min.js') }}"></script>
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
