@extends("admin_dashboard.layouts.app")
@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	@endsection
		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">past</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.patents.create')}}">Add New</a></li>

							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
	
                <div class="page-content">
                    <div class="card">
                        <div class="card-body">
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
                          
									@forelse($past as $past)
                                   
                                <td class="aiptref"><a style="font-size:12; color:black;" href="">{{$past->aiptref}}</a></td>
                                <td class="clientref"><a style="font-size:12; color:black;" href="">{{$past->clientref}}</a></td>
                                <td class="title"><a style="font-size:12; color:black;" href="">{{$past->title}}</a></td>
                                <td class="client"><a style="font-size:12; color:black;" href="">{{$past->client}}</a></td>
								<td class="pctdate">
                                    <a style="font-size:12; color:black;"  href=""><button style="font-weight:bold; font-size:16; color:white; align-item:center;"  class="btn btn-success">{{$past->pct_date}}</button></a>
                                </td>
								<td class="title"><a style="font-size:12; color:black;" href="">{{$past->pct_no}}</a></td>
                                <td class="regulardate">
                                    <a style="font-size:12; color:black;"  href=""><button style="font-weight:bold; font-size:16; color:white; align-item:center;"  class="btn btn-success">{{$past->regular_date}}</button></a>
                                </td>
								<td class="title"><a style="font-size:12; color:black;" href="">{{$past->regular_no}}</a></td>
								<td class="filingno"><a style="font-size:12; color:black;" href="">{{$past->filingno}}</a></td>
								<td class="procedure"><a style="font-size:12; color:black;" href="">{{$past->procedure}}</a></td>

                                <td class="requesteddate">
                                    <a style=" font-size:12; color:black;"  href=""><button style="font-weight:bold; font-size:16; color:white; align-item:center;"  class="btn btn-danger">{{$past->requesteddate}}</button></a>
                                </td>
								<td class="proceduredate">
                                    <a style=" font-size:12; color:black;"  href=""><button style="font-weight:bold; font-size:16; color:white; align-item:center;"  class="btn btn-danger">{{$past->proceduredate}}</button></a>
                                </td>
								<td class="country"><a style="font-size:12; color:black;" href="">{{$past->country}}</a></td>

                                
                                <td class="annuity"  href=""><a style="font-size:12; color:black;"  href="">{{$past->annuity}}</a></td>
                                <td class="annual_office_fee"  href=""><a style="font-size:12; color:black;"  href="">{{$past->annual_office_fee}}</a></td>
								<td class="proceduredate">
                                    <a style=" font-size:12; color:black;"  href=""><button style="font-weight:bold; font-size:16; color:white; align-item:center;"  class="btn btn-danger">{{$past->annual_deadline}}</button></a>
                                </td>
                                <td class="deadline_Status"  href=""><a style=" font-size:12; color:black;"  href="">{{$past->deadline_Status}}</a></td>
								<td>
									<div class="d-flex order-actions">
										<a href="{{route('admin.patents.edit', $past)}}" class=""><i class='bx bxs-edit'></i></a>
									
										<form method='post' action="{{route('admin.patents.destroy')}}" id='delete_form_{{ $past->id }}'>
										@csrf 
										@method('DELETE')
										<!-- Button trigger modal -->
										<a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"  class="ms-3"><i class='bx bxs-trash'></i></a>
										<!-- Modal -->
										<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
											<div class="modal-header">
												<h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to delete this data</h1>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												<button type="button" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $past->id }}').submit();" class="btn btn-primary">Delete</button>
											</div>
											</div>
										</div>
										</div>
										</form> 											
									</div>
								</td>
                                </tr>
                          
                                @empty
								<p class='lead'>There are no Client to show.</p>
							@endforelse
								</tbody>
							</table>
                            </div>
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


	

	
