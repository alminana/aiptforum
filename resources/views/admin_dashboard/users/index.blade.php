@extends("admin_dashboard.layouts.app")
		
		@section("wrapper")
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Users</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Users</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
						<div class="position-relative">
                                <form method="GET" action="{{route('admin.users.index')}}">
                                <input type="search" name="search" class="form-control ps-5 " style="padding: 10px 450px;" placeholder="Search Application"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                                </form>
                                </div>
                                <div class="ms-auto"><a href="{{route('admin.users.index')}}" class="btn btn-primary ">Clear</a></div>
						  <div class="ms-auto"><a href="{{ route('admin.categories.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>New Category</a></div>
						</div>
						<div class="table-responsive">
						<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>

									<tr>
										<th>User#</th>
										<th>Image</th>
										<th>Name</th>
										<th>Email</th>
										<th>Role</th>
										<th>Related Posts</th>
										<th>Created at</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
								@forelse($users as $user)
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div>
													<input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
												</div>
												<div class="ms-2">
													<h6 class="mb-0 font-14">#U-{{ $user->id }}</h6>
												</div>
											</div>
										</td>
										<td>
                                            <img width='50' src="{{ $user->image ? asset('storage/' . $user->image->path) : asset('storage/placeholders/user_placeholder.jpg') }}" alt="">    
                                        </td>
                                        <td>{{ $user->name }} </td>
                                        <td>{{ $user->email }} </td>
                                        <td>{{ $user->role->name }}</td>
                                        <td>
                                            <a class='btn btn-primary btn-sm' href="{{ route('admin.users.show', $user) }}">Related Posts</a>
                                        </td>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                        <td>
											<div class="d-flex order-actions">
												<a href="{{ route('admin.users.edit', $user) }}" class=""><i class='bx bxs-edit'></i></a>
												<!-- <a href="#" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $user->id }}').submit();" class="ms-3"><i class='bx bxs-trash'></i></a>
											
                                                <form method='post' action="{{ route('admin.users.destroy', $user) }}" id='delete_form_{{ $user->id }}'>@csrf @method('DELETE')</form> -->
												<form method='post' action="{{ route('admin.users.destroy', $user) }}" id='delete_form_{{ $user->id }}'>
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
														User : 
														{{ $user->name }} 
													</label>
													
													<br/>
													
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
														<button type="button" onclick="event.preventDefault(); document.getElementById('delete_form_{{ $user->id }}').submit();" class="btn btn-primary">Delete</button>
													</div>
													</div>
												</div>
												</div>
												</form> 
                                            </div>
										</td>
									</tr>
									@empty
										<p class='lead'>There are no User to show.</p>
									@endforelse
								</tbody>
							</table>
						</div>

                        <div class='mt-4'>
                        {{ $users->links() }}
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

    </script>
    @endsection