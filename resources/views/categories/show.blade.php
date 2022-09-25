@extends('main_layouts.master')

@section('title', ' Category | AIPTFORUM')

@section('content')

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



            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-9">All Application </h6>
                        </div>
                        <div class="dropdown ms-auto">
                            <div class="d-lg-flex align-items-center mb-4 gap-3">
                                <div class="position-relative">
                                <form method="GET" action="{{ route('categories.index', $category) }}">
                                <input type="search" name="search" class="form-control ps-5 " style="padding: 10px 550px;" placeholder="Search Application"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                                </form>
                                </div>
                                <div class="ms-auto"><a href="{{ route('categories.index') }}" class="btn btn-primary ">Clear</a></div>
                            </div>
                            <!-- <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                    <div class="table-responsive">
					
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                            <tr>
                                <th style="font-size:11px;">#</th>
                                <th style="font-size:11px;">Refference</th>
								<th style="font-size:11px;">Application</th>
                                <th style="font-size:11px;">Filing no:</th>
                                <th style="font-size:11px;">Filing date</th>
                                <th style="font-size:11px;">Class</th>  
                                <th style="font-size:11px;">Registration</th>
                                <th style="font-size:11px;">Registration date</th> 
                                <th style="font-size:11px;">Renewal</th> 
								<th style="font-size:11px;">Status</th>
                                <th style="font-size:11px;">Client</th>
								<th style="font-size:11px;">Country</th>
								<th style="font-size:11px;">Category</th>
								
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
                                <td><img style='width: 80%' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='product-img-2' alt="Post Thumbnail"></td> 
                                <!-- <td><img src="{{ asset('admin_dashboard_assets/images/products/01.png') }}" class="product-img-2" alt="product img"></td> -->
                                <td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->title}}</a></td>
								<td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->slug}}</a></td>
								<td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->filingdate}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{ $post->class }}</a></td>
                                <td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->registrationno}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->registrationdate}}</a></td>
                                <td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->renewal}}</a></td>
								<td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{$post->status}}</a></td>
								<td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{ $post->excerpt }}</a></td>
								<td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{ $post->country }}</a></td>
                                <td style="font-size:11px;"><a style="color:black;" href="{{ route('posts.show', $post) }}">{{ $post->category->name }}</a></td>
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
@endsection
