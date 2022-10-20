@extends("admin_dashboard.layouts.app")
@section("style")
    <link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
@endsection

@section("wrapper")


<div class="page-wrapper">
        <div class="page-content">
		
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
			@forelse($categories as $category)
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary"><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></p>
                                    <h1 class="my-1 text-info"><a href="{{ route('categories.show', $category) }}">{{ $category->posts_count }}</a></h1>
                                    <!-- <p class="mb-0 font-13">{{ $category->user->name }}</p> -->
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				@empty
                    <p class='lead'>There are no categories to show.</p>
                @endforelse
            </div><!--end row-->



            <div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th style="font-size:11px;">AIPTREF</th>
										<th style="font-size:11px;">Client Reference</th>
										<th style="font-size:11px;">Agent</th>
										<th style="font-size:11px;">Image</th>
										<th style="font-size:11px;">Application</th>
										<th style="font-size:11px;">Filing no:</th>
                                   		<th style="font-size:11px;">Filing date</th>
										<th style="font-size:11px;">Publication Date</th>
										<th style="font-size:11px;">Appeal Date</th>
										<th style="font-size:11px;">Oppose Date</th>
										<th style="font-size:11px;">Registration</th>
										<th style="font-size:11px;">Registration date</th> 
										<th style="font-size:11px;">Renewal</th> 
										<th style="font-size:11px;">Client</th> 
										<th style="font-size:11px;">Status</th>
										<th style="font-size:11px;">Country</th>
										<th style="font-size:11px;">Class</th>
										<th style="font-size:11px;">Type</th>
										<th style="font-size:11px;">Annuity Due</th>
										<th style="font-size:11px;">Annuity Deadline</th>
										<th style="font-size:11px;">Action</th>
									</tr>
								</thead>
								<tbody>
								@forelse($posts as $post)
							<tr>
							
								<td >{{$post->aiptref}}</td>
								<td>{{$post->clientref}}</td>
								<td>{{ $post->agent }}</td>
								<td>
								<img style='width: 40%' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
								</td>
								<td>{{$post->title}}</td>
								<td>{{$post->slug}}</td>
								<td>{{$post->filingdate}}</td>
								<td>{{$post->pubdate}}</td>
								<td>{{$post->appealdate}}</td>
								<td>{{$post->opposedate}}</td>
								<td>{{$post->registrationno}}</td>
								<td>{{$post->registrationdate}}</td>
								<td>{{$post->renewal}}</td>
								<td>{{$post->excerpt}}</td>
								<td>{{$post->status}}</td>
								<td>{{$post->country}}</td>
								<td>{{$post->class}}</td>
								<td>{{$post->category->name}}</td>
								<td>{{$post->annuitydue}}</td>
								<td>{{$post->annuitydeadline}}</td>
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
@endsection

@section("script")  
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/js/index.js') }}"></script>
            <!-- Required datatable js -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/assets/js/code.js') }}"></script>   
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
