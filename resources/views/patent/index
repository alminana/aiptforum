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
                    <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
    <div class="page-content">
            <div>
                                <h5><p style="color: red">Check the checkbox to hide the row Items *</p></h5>
                            </div>
                            <div class="row ">
                                
                                    <div class="col" style="color:black">
                                        <div class="form-check ">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" name="deadline" >Status
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" name="aiptref">AIPTREF
                                            </label>
                                          </div>
                                          <div class="form-check ">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" name="clientref" >Client Ref
                                            </label>
                                          </div>
                                          <div class="form-check ">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" name="title" >Application
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" name="status">Method
                                            </label>
                                          </div>
                                        </div>
                                    
                                        <div class="col" style="color:black">
                                        
                                        <div class="form-check">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" name="image">Image
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" name="requesteddate">Requested Date
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" name="proceduredate">Actual Deadline
                                            </label>
                                          </div>
                                          <div class="form-check ">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" name="slug" >Filing
                                            </label>
                                          </div>
                                          <div class="form-check ">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" name="registrationno" >Registration
                                            </label>
                                          </div>
    
                                      </div>
                                      <div class="col" style="color:black">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" name="class">Class
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" name="excerpt">Client
                                            </label>
                                          </div>
                                          <div class="form-check ">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" name="country" >Country
                                            </label>
                                          </div>
                                      </div>
                                      <div class="col" style="color:black">
                                        
                                         
                                      </div>
                                      
                                      
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
                                    <th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Regular Date</th>
                                    <th class="proceduredate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing no.</th>
                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Procedure</th>
                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Requested Date</th>
                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Actual Date</th>
                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>
                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Annuity</th>
                                    <th class="registrationno" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Annual Official Fee</th>
                                    <th class="class"  class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Annual Deadine</th>						
                                    <th class="country"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Deadline Status</th>		                
                                    <th class="action"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Actions</th>		                             

							</tr>
							</thead>
								<tfoot>
									<tr role="row">
                                        <th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
                                        <th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
                                        <th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Title</th>
                                        <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client</th>
                                        <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">PCT Date</th>
                                        <th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Regular Date</th>
                                        <th class="proceduredate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing no.</th>
										<th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Procedure</th>
                                        <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Requested Date</th>
                                        <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Actual Date</th>
                                        <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>
										<th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Annuity</th>
                                        <th class="registrationno" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Annual Official Fee</th>
                                        <th class="class"  class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Annual Deadine</th>						
                                        <th class="country"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Deadline Status</th>				
                                        <th class="action"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Actions</th>		                             					
										</tr>
								</thead>
							
							<tbody>
							
								@forelse($patents as $patent)
                                <td class="aiptref"><a style="font-size:12; color:black;" href="{{route('patent.show', $patent )}}">{{$patent->aiptref}}</a></td>
                                <td class="clientref"><a style="font-size:12; color:black;" href="{{route('patent.show', $patent )}}">{{$patent->clientref}}</a></td>
                                <td class="title"><a style="font-size:12; color:black;" href="{{route('patent.show', $patent )}}">{{$patent->title}}</a></td>
                                <td class="client"><a style="font-size:12; color:black;" href="{{route('patent.show', $patent )}}">{{$patent->client}}</a></td>
								<td class="pctdate">
                                    <a style="font-size:12; color:black;"  href="{{route('patent.show', $patent )}}"><button style="font-weight:bold; font-size:16; color:white; align-item:center;"  class="btn btn-success">{{$patent->pct_date}}</button></a>
                                </td>
                                <td class="regulardate">
                                    <a style="font-size:12; color:black;"  href="{{route('patent.show', $patent )}}"><button style="font-weight:bold; font-size:16; color:white; align-item:center;"  class="btn btn-success">{{$patent->regular_date}}</button></a>
                                </td>
								<td class="filingno"><a style="font-size:12; color:black;" href="{{route('patent.show', $patent )}}">{{$patent->filingno}}</a></td>
								<td class="procedure"><a style="font-size:12; color:black;" href="{{route('patent.show', $patent )}}">{{$patent->procedure}}</a></td>

                                <td class="requesteddate">
                                    <a style=" font-size:12; color:black;"  href="{{route('patent.show', $patent )}}"><button style="font-weight:bold; font-size:16; color:white; align-item:center;"  class="btn btn-danger">{{$patent->requesteddate}}</button></a>
                                </td>
								<td class="proceduredate">
                                    <a style=" font-size:12; color:black;"  href="{{route('patent.show', $patent )}}"><button style="font-weight:bold; font-size:16; color:white; align-item:center;"  class="btn btn-danger">{{$patent->proceduredate}}</button></a>
                                </td>
								<td class="country"><a style="font-size:12; color:black;" href="{{route('patent.show', $patent )}}">{{$patent->country}}</a></td>

                                
                                <td class="annuity"  href=""><a style="font-size:12; color:black;"  href="{{route('patent.show', $patent )}}">{{$patent->annuity}}</a></td>
                                <td class="annual_office_fee"  href=""><a style="font-size:12; color:black;"  href="{{route('patent.show', $patent )}}">{{$patent->annual_office_fee}}</a></td>
                                <td class="annual_deadline"  href=""><a style="font-size:12; color:black;"  href="{{route('patent.show', $patent )}}">{{$patent->annual_deadline}}</a></td>
                                <td class="deadline_Status"  href=""><a style=" font-size:12; color:black;"  href="">{{$patent->deadline_Status}}</a></td>
                                <td>
									<div class="d-flex order-actions">
										<a href="{{ route('patent.edit', $patent) }}" class=""><i class='bx bxs-edit'></i></a>									
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

