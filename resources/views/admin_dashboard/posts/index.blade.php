@extends("admin_dashboard.layouts.app")
		
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
								<li class="breadcrumb-item active" aria-current="page">All Application</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
							<form method="GET" action="{{ route('admin.posts.index') }}">
								<input type="search" name="search" class="form-control ps-5 radius-640 " style="padding: 10px 600px;" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                            </form>
							</div>
							<div class="ms-auto"><a href="{{ route('admin.posts.index') }}" class="btn btn-primary ">Clear</a></div>
						  <div class="ms-auto"><a href="{{ route('admin.posts.create') }}" class="btn btn-primary ">Add</a></div>
						</div>
						<div class="table-responsive">
						<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>

									<tr>
									    
										<th>AIPTREF</th>
										<th>Image</th>
										<th>Application</th>
										<th>Agent</th>
										<th>Annuity due</th>
										<th>Annuity Deadline</th>
										<th>Client Refference</th>
                                        <th>Filing no:</th>
										<th>Status</th>
                                        <th>Client</th>
										<th>Country</th>
                                        <th>Class</th>
										<th>Project</th>
										<!-- <th>Created at</th> -->
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
								  @forelse($posts as $post)
									<tr>
										<!-- <td>
											<div class="d-flex align-items-center">
												<div>
													<input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
												</div>
												<div class="ms-2">
													<h6 class="mb-0 font-14">#P-{{ $post->id }}</h6>
												</div>
											</div>
										</td> -->
										<td >{{$post->aiptref}}</td>
										<td>
										<img style='width: 40%' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
									    </td>
										<td>{{ $post->title }} </td>
										<td>{{$post->agent}}</td>
										<td>{{$post->annuitydue}}</td>
										<td>{{$post->annuitydeadline}}</td>
										<td>{{$post->clientref}}</td>
										<td>{{$post->slug}}</td>
										<td>{{ $post->status}}</td>
										<td>{{ $post->excerpt }}</td>
										<td>{{$post->country }}</td><td style=" text-align: center;">{{ $post->class}}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <!-- <td>{{ $post->created_at->diffForHumans() }}</td> -->

                                        
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
										<p class='lead'>There are no categories to show.</p>
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
    @endsection