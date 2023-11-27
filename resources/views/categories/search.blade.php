<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name='csrf-token' content="{{ csrf_token() }}">
        <!--favicon-->
        <link rel="icon" href="{{ asset('admin_dashboard_assets/images/favicon-32x32.png') }}" type="image/png" />
        <!--plugins-->
        @yield("style")
        <link href="{{ asset('admin_dashboard_assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin_dashboard_assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin_dashboard_assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
        <!-- loader-->
        <link href="{{ asset('admin_dashboard_assets/css/pace.min.css') }}" rel="stylesheet" />
        <script src="{{ asset('admin_dashboard_assets/js/pace.min.js') }}"></script>
        <!-- Bootstrap CSS -->
        <link href="{{ asset('admin_dashboard_assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <link href="{{ asset('admin_dashboard_assets/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('admin_dashboard_assets/css/icons.css') }}" rel="stylesheet">
    
    
        <!-- Theme Style CSS -->
        <link rel="stylesheet" href="{{ asset('admin_dashboard_assets/css/dark-theme.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin_dashboard_assets/css/semi-dark.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin_dashboard_assets/css/header-colors.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin_dashboard_assets/css/my_style.css') }}" />
        <link rel="stylesheet" href="{{ asset('blog_template/css/style.css') }}">
    	<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    	<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/datatable.jquery.dataTables.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
    
                <!-- jquery.vectormap css -->
                <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    
                <!-- DataTables -->
                <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        
                <!-- Responsive datatable examples -->
                <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />  
        
                <!-- Bootstrap Css -->
                <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
                <!-- Icons Css -->
                <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
                <!-- App Css-->
                <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        
        <title>AIPTFORUM</title>
    </head>
<body>
    <div class="container-fluid">
        <div class="page-content">
   
			

            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
						<div class="p-2">
							<h3 class="font-size-16">
								<strong style="font-size:12; color: black;f">
								
									<div class="page-breadcrumb d-none d-sm-flex align-items-center">
										<div style="font-weight: 200;"  class="breadcrumb-title"><a  href="">All Trademark Application</a></div>
										
									</div>
								</strong>
						    </h3>
						</div>
                    </div>
					<div class="d-flex align-items-center">
						<div class="">
						
								
									<div class="page-breadcrumb d-none d-sm-flex align-items-center">
										<form class="search_box"  action="{{ route('categories.search') }}" id="search" method="GET">
				
											<input  name="search" placeholder="Search " type="text">
											<button type='submit' class="btn btn-primary">Search</button>
										  </form>
										
											<a href="{{ route('posts.download-excel') }}">
												<button type="button" class="btn btn-primary">Export</button>
											</a>
                                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light">
                                                Print
                                            </a>

									</div>
                                   
								</strong>
						    </h3>
						</div>
                    </div>
				<br/>
                    <div class="table-responsive">
						<table  id="example" class="display table table-striped table-bordered">
                            <thead class="table-light">
                            <tr>
								<th class="assignedID" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Unique Id</th>	
								<th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
								<th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
								<th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Application</th>
								<th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Method</th>
								<th class="image" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Image</th>
								<th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing #</th>
								<th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing Date</th>
								<th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Requested Date</th>
								<th class="proceduredate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Actual Date</th>
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
														$colors = "";
												$Filed = "Filed";
												$Published = "Published";
												$Opposed = "Opposed";
												$Registered = "Registered";
												$officeaction = "Office Action";
												$abandon = "Abandon";
												$NewApplication = "New Application";
												$status= ($post->status);
											
														if(($status == $Filed)){
															
															$colors = "color:black;background-color:#00ff00;";
														}elseif($status == $Published){
													
															$colors = "color:black;background-color:#00fffff;";
														}elseif ($status == $Opposed) {
															
															$colors = "color:black;background-color:#cc99ff;";
														}elseif ($status == $Registered) {
														
                                                            $colors = "color:black;background-color:#8B4513; color:white";
														}elseif($status == 	$NewApplication  ){

															$colors = "color:black;background-color:#fff00;";
														}elseif($status == $officeaction ){
															
															$colors = "color:black;background-color:#ff9933";
														}

														elseif($status == $abandon ){
															
															$colors = "color:black;background-color:#ff6666;";
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
								<td class="assignedID"><a style="font-size:12; color: black; f" href="{{ route('post.show', $post) }}">{{$post->assignedID}}</a></td>
								<td class="aiptref"><a style="font-size:12; color: black; f" href="{{ route('post.show', $post) }}">{{$post->aiptref}}</a></td>
								<td class="clientref"><a style="font-size:12; color: black; f" href="{{ route('post.show', $post) }}">{{ $post->clientref }}</a></td>
                                <td class="title"><a style="font-size:12; color: black; f" href="{{ route('post.show', $post) }}">{{ $post->title }}</a></td>
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
												$status= ($post->status);
											
												if(($status == $Filed)){
															
															$colors = "color:black;background-color:#00ff00;";
														}elseif($status == $Published){
													
															$colors = "color:black;background-color:#00fffff;";
														}elseif ($status == $Opposed) {
															
															$colors = "color:black;background-color:#cc99ff;";
														}elseif ($status == $Registered) {
														
															$colors = "color:black;background-color:#bfafb2;";
														}elseif($status == 	$NewApplication  ){

															$colors = "color:black;background-color:#fff00;";
														}elseif($status == $officeaction ){
															
															$colors = "color:black;background-color:#ff9933";
														}

														elseif($status == $abandon ){
															
															$colors = "color:black;background-color:#ff6666;";
														}
										
											 @endphp
									{{$post->status }}
								</td>
                                <td style="font-size:11px;">
									<img style='width: 40%' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
									<a style="color:black;"href="{{ route('posts.show', $post) }}">
									</a> 
								</td> 
                                <td class="slug"  href="{{ route('post.show', $post) }}"><a style="font-size:12; color: black; f"  href="{{ route('post.show', $post) }}">{{ $post->slug }}</a></td>
								<td class="filingdate"  href="{{ route('post.show', $post) }}"><a style="font-size:12; color: black; f"  href="{{ route('post.show', $post) }}">{{ $post->filingdate }}</a></td>
								<td class="requesteddate"  href="{{ route('post.show', $post) }}"><a style="font-size:12; color: black; f"  href="{{ route('post.show', $post) }}">{{ $post->requesteddate }}</a></td>
								<td class="proceduredate"  href="{{ route('post.show', $post) }}"><a style="font-size:12; color: black; f"  href="{{ route('post.show', $post) }}">{{ $post->proceduredate }}</a></td>
								<td class="class"  href="{{ route('post.show', $post) }}"><a style="font-size:12; color: black; f"  href="{{ route('post.show', $post) }}">{{ $post->class }}</a></td>
								<td class="excerpt"  href="{{ route('post.show', $post) }}"><a style="font-size:12; color: black; f"  href="{{ route('post.show', $post) }}">{{ $post->excerpt }}</a></td>
								<td class="country"  href="{{ route('post.show', $post) }}"><a style="font-size:12; color: black; f"  href="{{ route('post.show', $post) }}">{{ $post->country }}</a></td>

								<div class="d-flex order-actions">
									<td class="action">
										<a href="{{ route('admin.posts.edit', $post) }}" class=""><i class='bx bxs-edit'></i></a>
										<a href="{{$post->inputPfolderlink}}" target="_blank">Folder Link</a>
									</td>
						
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
</body>
<script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

<script src="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('admin_dashboard_assets/plugins/chartjs/js/Chart.min.js') }}"></script>
<script src="{{ asset('admin_dashboard_assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
<script src="{{ asset('admin_dashboard_assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('admin_dashboard_assets/js/index.js') }}"></script>
<script>

    $("input:checkbox").attr("checked",false).click(function(){
                var shcolumn="."+$(this).attr("name");
                $(shcolumn).toggle();
            });
    
    $(document).ready(function() {
        $('#example ').DataTable( {
    
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
        
            $(document).ready(function() {
                $('#tbAdresse').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5'
                    ]
                } );
            } );
    
    </script>
</html>
