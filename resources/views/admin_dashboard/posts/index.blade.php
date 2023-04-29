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
					<div class="breadcrumb-title pe-3">Application</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.posts.create') }}">Add New</a></li>

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
										<th style="font-size:11px;">No.</th>
										<th style="font-size:11px;">AIPTREF</th>
										<th style="font-size:11px;">Client Reference</th>
										<th style="font-size:11px;">Agent</th>
										<th style="font-size:11px;">Image</th>
										<th style="font-size:11px;">Application</th>
										<th style="font-size:11px;">Filing no:</th>
                                   		{{-- <th style="font-size:11px;">Filing date</th> --}}
									
									
										<th style="font-size:11px;">Registration</th>
										{{-- <th style="font-size:11px;">Registration date</th>  --}}
									 
										<th style="font-size:11px;">Client</th> 
										<th style="font-size:11px;">Procedure</th>
										<th style="font-size:11px;">Requested Deadline</th>
										<th style="font-size:11px;">Actual Deadline</th>
										<th style="font-size:11px;">Country</th>
										<th style="font-size:11px;">Class</th>
										<th style="font-size:11px;">Type</th>
										<th style="font-size:11px;">User Id</th>
										{{-- <th style="font-size:11px;">Status</th> --}}

										<th style="font-size:11px;">Action</th>
									</tr>
								</thead>
								<tbody>
								@forelse($posts as $post)
							<tr>
								<td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->id}}</a></td>
							   <td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->aiptref}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->clientref}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}"></a>{{ $post->agent }}</td>

								<td style="font-size:11px;">
									<img style='width: 100%' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
									{{-- <a style="color:black;"href="{{ route('posts.show', $post) }}">

									<img style='width: 60%' src="{{Storage::disk('s3')->temporaryUrl($post->image->path, now()->addMinutes(20))}}" />
							
									</a> --}}
								</td>
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->title}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->slug}}</a></td>
								{{-- <td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->filingdate}}</a></td> --}}

								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->registrationno}}</a></td>
								{{-- <td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->registrationdate}}</a></td> --}}
								{{-- <td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->renewal}}</a></td> --}}
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->excerpt}}</a></td>

								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->status}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->requesteddate}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->proceduredate}}</a></td>

								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->country}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->class}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->category->name}}</a></td>
								<td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->user_id}}</a></td>
								{{-- <td style="font-size:11px;"><a style="color:black;"href="{{ route('posts.show', $post) }}">{{$post->body}}</a></td> --}}
								<td>
											<div class="d-flex order-actions">
												<a href="{{ route('admin.posts.edit', $post) }}" class=""><i class='bx bxs-edit'></i></a>
												<!-- <a href="#"  onclick="event.preventDefault(); document.getElementById('delete_form_{{ $post->id }}').submit();" class="ms-3"><i class='bx bxs-trash'></i></a> -->
											
                                                <form method='post' action="{{ route('admin.posts.destroy', $post) }}" id='delete_form_{{ $post->id }}'>
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
														AIPT REFFERENCE : 
														{{$post->aiptref}}
													</label>
													
													<br/>
													
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
														<button type="button" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $post->id }}').submit();" class="btn btn-primary">Delete</button>
													</div>
													</div>
												</div>
												</div>
												</form> 
											
                                            </div>
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
		$(document).raeady(function() {
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

	
