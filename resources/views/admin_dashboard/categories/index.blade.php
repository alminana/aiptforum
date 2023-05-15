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
					<div class="breadcrumb-title pe-3">Categories</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Categories</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
								<tr>
									<th>Category#</th>
									<th>Category Name</th>
									<th>Creator</th>
                                    <th>Related Posts</th>
									<th>Created at</th>
									<th>Actions</th>
									</tr>
								</thead>
								<tbody>
								@forelse($categories as $category)
									<tr>
									<td>
											<div class="d-flex align-items-center">
												<div>
													<input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
												</div>
												<div class="ms-2">
													<h6 class="mb-0 font-14">{{ $category->id }}</h6>
												</div>
											</div>
										</td>
										<td>{{ $category->name }} </td>
                                         <td>{{ $category->user->name }}</td>
                                        <td>
                                            <a class='btn btn-primary btn-sm' href="{{ route('admin.categories.show', $category) }}">Related Posts</a>
                                        </td>
                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                        <td>
											<div class="d-flex order-actions">
												<a href="{{ route('admin.categories.edit', $category) }}" class=""><i class='bx bxs-edit'></i></a>
												<a href="#" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $category->id }}').submit();" class="ms-3"><i class='bx bxs-trash'></i></a>
											
                                                <form method='post' action="{{ route('admin.categories.destroy', $category) }}" id='delete_form_{{ $category->id }}'>@csrf @method('DELETE')</form>
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
		<!--end page wrapper -->
		@endsection
	

    @section("script")

    <script>
        $(document).ready(function () {
        
            setTimeout(() => {
                $(".general-message").fadeOut();
            }, 5000);

        });


		
		$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  }) 


    });

  });

    </script>
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

		$(document).ready(function () {
        
		setTimeout(() => {
			$(".general-message").fadeOut();
		}, 5000);

	});
	</script>
    @endsection



































