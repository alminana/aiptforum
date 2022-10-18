@extends('main_layouts.master')

@section('title', ' Category | AIPTFORUM')
@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	@endsection

@section('content')     
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Application</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('categories.index') }}"><i class="bx bx-home-alt"></i></a>
								</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
                    <div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
									<th style="font-size:11px;">#</th>
                                    <th style="font-size:11px;">Refference</th>
                                    <th style="font-size:11px;">Image</th>
                                    <th style="font-size:11px;">Agent</th>
									<th style="font-size:11px;">Annuity Due</th>
									<th style="font-size:11px;">Annuity Deadline</th>
                                    <th style="font-size:11px;">Application</th>
                                    <th style="font-size:11px">Client Refference</th>
                                    <th style="font-size:11px;">Filing no:</th>
                                    <th style="font-size:11px;">Filing date</th>
                                    <th style="font-size:11px;">Class</th>  
                                    <th style="font-size:11px;">Registration</th>
                                    <th style="font-size:11px;">Registration date</th> 
                                    <th style="font-size:11px;">Renewal</th> 
                                    <th style="font-size:11px;">Status</th>
                                    <th style="font-size:11px;">Client</th>
                                    <th style="font-size:11px;">Country</th>
                                    <th style="font-size:11px;">Project</th>
                                    <th style="font-size:11px;">Action</th>
									</tr>
								</thead>
								<tbody>
							@forelse($posts as $post)
							<tr>
                                <td>
								    <div class="d-flex align-items-center">
										<div>
											<input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
										</div>
										<!-- <div class="ms-2">
											<h6 class="mb-0 font-14">{{ $post->id }}</h6>
										</div> -->
									</div>
								</td>
								<td style="font-size:11px;"><a style="color:black;"  href="{{ route('posts.show', $post) }}">{{$post->aiptref}}</a></td>
                                <td><a href="{{ route('posts.show', $post) }}"><img style='width: 80%' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='product-img-2' alt="Post Thumbnail"></a></td> 
                                <!-- <td><img src="{{ asset('admin_dashboard_assets/images/products/01.png') }}" class="product-img-2" alt="product img"></td> -->
                                <td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->agent}}</a></td>
								<td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->annuitydue}}</a></td>
								<td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->annuitydeadline}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->title}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->clientref}}</a></td>
								<td class="bg-primary" style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->slug}}</a></td>
                                <td class="bg-primary"style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->filingdate}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{ $post->class }}</a></td>
                                <td class="bg-success" style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->registrationno}}</a></td>
                                <td class="bg-success"style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->registrationdate}}</a></td>
                                <td class="bg-danger" style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->renewal}}</a></td>
								<td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->status}}</a></td>
								<td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{ $post->excerpt }}</a></td>
								<td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{ $post->country }}</a></td>
                                <td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{ $post->category->name }}</a></td>
                                <td>
                                <div class="d-flex order-actions">
										<a href="{{ route('pdf.generatepdf', $post->id) }}" class=""><i class='bx bxs-printer'></i></a>
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