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
					<div class="breadcrumb-title pe-3">Comments</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.comments.index') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.comments.create') }}">Add New</a></li>

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
										<th>Comment#</th>
										<th>Reference</th>
										<th>Application</th>
								
										<th>Procedure</th>
										<th>Filing No.</th>
										<th>Client</th>
										<th>Country</th>
										<th>Class</th>
								
										<th>Actual Deadline</th>
										<th>Comment Author</th>
                                        <th>Comment Body</th>
                                        <th>View Comment</th>
									
										<th>Created at</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($comments as $comment)
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div>
													<input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
												</div>
												<div class="ms-2">
													<h6 class="mb-0 font-14">#P-{{ $comment->id }}</h6>
												</div>
											</div>
										</td>
										<td>{{$comment->post->aiptref}}</td>
										<td>{{$comment->post->title}}</td>
										<td>{{$comment->post->status}}</td>
										<td>{{$comment->post->slug}}</td>
										<td>{{$comment->post->excerpt}}</td>
										<td>{{$comment->post->country}}</td>
										<td>{{$comment->post->class}}</td>
										<td>{{$comment->post->proceduredate}}</td>
										<td>{{ $comment->user->name }} </td>
                                        <td>{{ \Str::limit($comment->the_comment, 60) }} </td>
                                        <td>
                                            <a target='_blank' class='btn btn-primary btn-sm' href="{{ route('posts.show', $comment->post->id) }}#comment_{{ $comment->id }}">View Comment</a>
                                        </td>
                                        <td>{{ $comment->created_at->diffForHumans() }}</td>
                                        <td>
											<div class="d-flex order-actions">
												<a href="{{ route('admin.comments.edit', $comment) }}" class=""><i class='bx bxs-edit'></i></a>
												<!-- <a href="#" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $comment->id }}').submit();" class="ms-3"><i class='bx bxs-trash'></i></a>
											
                                                <form method='post' action="{{ route('admin.comments.destroy', $comment) }}" id='delete_form_{{ $comment->id }}'>@csrf @method('DELETE')</form> -->

												{{-- <form method='post' action="{{ route('admin.comments.destroy', $comment) }}" id='delete_form_{{ $comment->id }}'>
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
													<div class="modal-fullscreen-xxl-down">
													<label for="inputProductTitle" style="text-align:center" class="form-label">
														Comment : 
														{{ \Str::limit($comment->the_comment, 60) }} 
													</label>
													
													<br/>
													
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
														<button type="button" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $comment->id }}').submit();" class="btn btn-primary">Delete</button>
													</div>
													</div>
												</div>
												</div>
												</form>  --}}

                                            </div>
										</td>
									</tr>
                                    @endforeach
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
	</script>
    @endsection


































