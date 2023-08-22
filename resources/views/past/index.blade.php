@extends('main_layouts.master')

@section('title')
@section("style")
<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection
	
@section('content')  
		<!--start page wrapper -->
		<div class="page-wrapper">
		<div class="page-content">
	<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div style="font-weight: 200"  class="breadcrumb-title pe-3"><a  href="">Patent</a></div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('past.create')}}"><button type="button" class="btn btn-primary">Add New</button></a>
                 
                    </li>
                </ol>
                
            </nav>
        </div>
    </div>
</div>
    <div class="page-content">                        
          <div class="table-responsive">
            <table id="tbAdresse" cellspacing="0" style="border:1px color:grey;" class="table table-striped table-bordered" role="grid" aria-describedby="tbAdresse_info">
              <thead>
              <tr role="row">
                              
                <th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
                <th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
                <th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Title</th>
                <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client</th>
                <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">PCT Date</th>
                <th class="pct_no" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">PCT no</th>
                <th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Regular Date</th>
                <th class="regular_no" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Regular no</th>
                <th class="proceduredate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing no.</th>
                <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Procedure</th>
                <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Requested Date</th>
                <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Actual Date</th>
                <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>
                <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Annuity</th>
                <th class="registrationno" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Annual Official Fee</th>
                <th class="class"  class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Annual Deadine</th>						
                <th class="country"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Deadline Status</th>		 
                <th class="country"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Actions</th>		
                             
                    
                                  </tr>
                                  </thead>
                                    <tfoot>
                                      <tr role="row">
                                                       
                                        <th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
                                        <th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
                                        <th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Title</th>
                                        <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client</th>
                                        <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">PCT Date</th>
                                        <th class="pct_no" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">PCT no</th>
                                        <th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Regular Date</th>
                                        <th class="regular_no" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Regular no</th>
                                        <th class="proceduredate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing no.</th>
                                        <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Procedure</th>
                                        <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Requested Date</th>
                                        <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Actual Date</th>
                                        <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>
                                        <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Annuity</th>
                                        <th class="registrationno" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Annual Official Fee</th>
                                        <th class="class"  class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Annual Deadine</th>						
                                        <th class="country"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Deadline Status</th>		 
                                        <th class="country"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Actions</th>		
                                                            </tr>
                                    </thead>
                                  
                                  <tbody>
                                  
                                   @forelse ($pasts as $past)
                                
                                 
                                                    <td class="aiptref"><a style="font-size:12; color:black;" href="/past/{{ $past->id }}">{{ $past->aiptref }}</a></td>
                                                    <td class="clientref"><a style="font-size:12; color:black;" href="/past/{{ $past->id }}">{{$past->clientref}}</a></td>
                                                    <td class="title"><a style="font-size:12; color:black;" href="/past/{{ $past->id }}">{{$past->title}}</a></td>
                                                    <td class="client"><a style="font-size:12; color:black;" href="/past/{{ $past->id }}">{{$past->client}}</a></td>
                                                    
                                                    <td   class="pct_date">
                                                      <a style="font-weight:bold; align-item:center; font-size:12; color:black;" href="/past/{{ $past->id }}">
                                                        @php
                                                          $expire = strtotime($past->pct_date);
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
                                                        <span> - {{$past->pct_date}}</span>  
                                                        </a>
                                                    </td>
                                                    <td class="title"><a style="font-size:12; color:black;" href="/past/{{ $past->id }}">{{$past->pct_no}}</a></td>

                                                    <td  class="regular_date">
                                                      <a style="font-weight:bold; align-item:center; font-size:12; color:black;" href="/past/{{ $past->id }}">
                                                        @php
                                                          $expire = strtotime($past->regular_date);
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
                                                               
                                                              }elseif($today == $expire){
                                                                echo "DueDate ";
                                                         
                                                              } elseif ($day_diff <= 30) {
                                                                echo "Upcoming";
                                                         
                                                              }	elseif ($today >= $expire) {
                                                                echo "Expired";
                                                             
                                                              }	
                                                              
                                                        @endphp
                                                        <span> - {{$past->regular_date}}</span>
                                                          
                                                      </a>
                                                    </td> 
                                                    <td class="title"><a style="font-size:12; color:black;" href="/past/{{ $past->id }}">{{$past->regular_no}}</a></td>

                                                    <td class="filingno"><a style="font-size:12; color:black;" href="/past/{{ $past->id }}">{{$past->filingno}}</a></td>
                                                    <td class="procedure"><a style="font-size:12; color:black;" href="/past/{{ $past->id }}">{{$past->procedure}}</a></td>
                    
                                                    <td  class="requesteddate">
                                                      <a style="font-weight:bold; align-item:center; font-size:12; color:black;" href="/past/{{ $past->id }}">
                                                        @php
                                                          $expire = strtotime($past->requesteddate);
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
                                                               
                                                              }elseif($today == $expire){
                                                                echo "DueDate ";
                                                         
                                                              } elseif ($day_diff <= 30) {
                                                                echo "Upcoming";
                                                         
                                                              }	elseif ($today >= $expire) {
                                                                echo "Expired";
                                                             
                                                              }	
                                                              
                                                        @endphp 
                                                        <span> - {{$past->requesteddate}}</span>
                                                          
                                                        </a>
                                                    </td>
                                                  <td   class="proceduredate">
                                                    <a style="font-weight:bold; align-item:center; font-size:12; color:black;" href="/past/{{ $past->id }}">
                                                      @php
                                                          $expire = strtotime($past->proceduredate);
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
                                                               
                                                              }elseif($today == $expire){
                                                                echo "DueDate ";
                                                         
                                                              } elseif ($day_diff <= 30) {
                                                                echo "Upcoming";
                                                         
                                                              }	elseif ($today >= $expire) {
                                                                echo "Expired";
                                                             
                                                              }	
                                                              
                                                        @endphp 
                                                         <span> - {{$past->proceduredate}}</span>
                                                       
                                                       </a>
                                                    </td>
                                    <td class="country"><a style="font-size:12; color:black;" href="/past/{{ $past->id }}">{{$past->country}}</a></td>
                    
                                                    
                                                    <td class="annuity"  href=""><a style="font-size:12; color:black;"  href="/past/{{ $past->id }}">{{$past->annuity}}</a></td>
                                                    <td class="annual_office_fee"  href=""><a style="font-size:12; color:black;"  href="/past/{{ $past->id }}">{{$past->annual_office_fee}}</a></td>
                    
                                                    <td class="annual_office_fee"  href="" >
                                                      <a style="font-weight:bold; align-item:center; font-size:12; color:black;" href="/past/{{ $past->id }}">
                                  
                                                        
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
                                                               
                                                              }elseif($today == $expire){
                                                                echo "DueDate ";
                                                         
                                                              } elseif ($day_diff <= 30) {
                                                                echo "Upcoming";
                                                         
                                                              }	elseif ($today >= $expire) {
                                                                echo "Expired";
                                                             
                                                              }	
                                                              
                                                        @endphp
                                                              <span> - {{$past->annual_deadline}}</span>
                                                       
                                                      </a>
                                                      
                                                         
                                                    </td>
                                                    
                                                    <td class="deadline_Status"  href=""><a style=" font-size:12; color:black;"  href="/past/{{ $past->id }}">{{$past->deadline_Status}}</a></td>
                                                    <td>
                                                      <div class="d-flex order-actions">
                                                        <a href="{{ route('patent.edit', $past) }}" class=""><i class='bx bxs-edit'></i></a>									
                                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                <p class='lead'>There are no Patent to show.</p>
                                                    @endforelse
                                  </tbody>
                                </table>
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
		</script>
		@endsection

