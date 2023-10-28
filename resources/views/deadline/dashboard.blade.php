@extends('main_layouts.master')
@section('title')
@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	@endsection
	@section("content")
   	<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
					@forelse($categories as $category)
					<div class="col">
						<div class="card radius-10 border-start border-0 border-3 border-success">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary"><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></p>
										<h4 class="my-1 text-danger"><a href="{{ route('categories.show', $category) }}">{{ $category->posts_count }}</a><h4>
									</div>
									<div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					@empty
						<p class='lead'>There are no categories to show.</p>
					@endforelse
					
				</div>
                        {{-- start tab --}}
                        <div class="row row-cols-12 row-cols-md-12 row-cols-lg-12 row-cols-xl-12">
                            <div class="col">
                                <h6 class="mb-0 text-uppercase">Trademark</h6>
                                <hr/>
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-primary" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#search" role="tab" aria-selected="true">
                                                    <div class="d-flex align-items-center">
                                                        <div class="tab-icon"><i class='bx bx-search font-18 me-1'></i>
                                                        </div>
                                                        <div class="tab-title"> Search</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#filing" role="tab" aria-selected="false">
                                                    <div class="d-flex align-items-center">
                                                        <div class="tab-icon">
                                                        </div>
                                                        <div class="tab-title"> Filing</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#acceptance" role="tab" aria-selected="false">
                                                    <div class="d-flex align-items-center">
                                                        <div class="tab-icon">
                                                        </div>
                                                        <div class="tab-title"> Acceptance</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#appeal" role="tab" aria-selected="false">
                                                    <div class="d-flex align-items-center">
                                                        <div class="tab-icon">
                                                        </div>
                                                        <div class="tab-title"> Appeal</div>
                                                    </div>
                                                </a>
                                            </li>
                                           
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#registration" role="tab" aria-selected="false">
                                                    <div class="d-flex align-items-center">
                                                        <div class="tab-icon">
                                                        </div>
                                                        <div class="tab-title"> Registration</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#renewal" role="tab" aria-selected="false">
                                                    <div class="d-flex align-items-center">
                                                        <div class="tab-icon">
                                                        </div>
                                                        <div class="tab-title"> Renewal</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#abandon" role="tab" aria-selected="false">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-icon">
                                                    </div>
                                                    <div class="tab-title"> Abandon</div>
                                                </div>
                                            </a>
                                            </li>
                                
                                        </ul>
                                        <div class="tab-content py-3">
                                            {{-- Trademark search --}}
                                            <div class="tab-pane fade show active" id="search" role="tabpanel">
                                                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-8">
                                                    <div class="card-body">
                                                    <form method="GET" action="{{route('deadline.dashboard')}}">
                                                        {{ csrf_field() }}
                                                        <div class="col-xl-12">
                                                          
                                                                <div class="card-body">
                                                                    <div class="table-responsive">
                                                                        <table id="tbAdresse" class="table table-striped table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                        
                                                                                <th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
                                                                                <th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
                                                                                <th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>
                                                                                <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Examination Report</th>
                                                                                <th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Registrability (%)</th>
                                                                                <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Our Opinion</th>
                                                                                <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                       
                                                                            <tbody>
                                                                                @forelse($search as $key => $item)
                                                                        <tr>
                                                                        
                                                                            <td style="font-size:11px;" ><a style="color:black;" href="" >{{$item->aiptref}}</a></td>
                                                                            <td style="font-size:11px;"><a style="color:black;"href="" >{{$item->clientref}}</a></td>
                                                                            <td style="font-size:11px;"><a style="color:black;"href="" >{{$item->country}}</a></td>
                                                                            <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                            <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                            <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                            <td style="font-size:11px;">
                                                                                <div class="d-flex order-actions">
                                                                                    <a href="{{ route('admin.categories.edit', $category) }}" class=""><i class='bx bxs-edit'></i></a>
                                                                                    <a href="{{ route('post.show', $post) }}"><i class='bx bxs-comment-add'></i></a>
                                                                                    <a href="" class=""><i class='bx bxs-show'></i></a>
                                                                                    <a href="" class=""><i class='bx bxs-download'></i></a>
                                                                                </div>
                                                                            </td>
                                                                          
                                                                        </td>
                                                                        </tr>
                                                                        @empty
                                                                        <p class='lead'>There are no Application to show.</p>
                                                                         @endforelse
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                          <!-- Button trigger modal -->

                                                            </div><!-- end card -->
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                
                                            </div>


                                            {{-- Trademark filing --}}
                                            <div class="tab-pane fade" id="filing" role="tabpanel">
                                                <div class="tab-pane fade show active" id="search" role="tabpanel">
                                                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-8">
                                                        <div class="card-body">
                                                        <form method="GET" action="{{route('deadline.dashboard')}}">
                                                            {{ csrf_field() }}
                                                            <div class="col-xl-12">
                                                              
                                                                    <div class="card-body">
                                                                        <div class="dropdown float-end">
                                                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="mdi mdi-dots-vertical"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                                            </div>
                                                                        </div>
                                    
                                                                        
                                    
                                                                        <div class="table-responsive">
                                                                            <table  id="tbAdresse" class="table table-striped table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                            
                                                                                    <th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
                                                                                    <th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
                                                                                    <th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>
                                                                                    <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Class</th>
                                                                                    <th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing No.</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing Date</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                           
                                                                                <tbody>
                                                                              
                                                                            <tr>
                                                                            
                                                                                <td style="font-size:11px;"><a style="color:black;" href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                            </td>
                                                                            </tr>
                                                                        
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                              
                                                                </div><!-- end card -->
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Button trigger modal -->
                                         
                                            </div>
                                            {{-- Trademark ooposition --}}
                                            <div class="tab-pane fade" id="acceptance" role="tabpanel">
                                                <div class="tab-pane fade show active" id="search" role="tabpanel">
                                                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-8">
                                                        <div class="card-body">
                                                        <form method="GET" action="{{route('deadline.dashboard')}}">
                                                            {{ csrf_field() }}
                                                            <div class="col-xl-12">
                                                                
                                                                    <div class="card-body">
                                                                        <div class="dropdown float-end">
                                                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="mdi mdi-dots-vertical"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                                            </div>
                                                                        </div>
                                    
                                                                        
                                    
                                                                        <div class="table-responsive">
                                                                            <table  id="tbAdresse" class="table table-striped table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                            
                                                                                    <th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
                                                                                    <th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
                                                                                    <th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>
                                                                                    <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Class</th>
                                                                                    <th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing No.</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing Date</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Publication Date</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Registration Date</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                            
                                                                                <tbody>
                                                                                
                                                                            <tr>
                                                                            
                                                                                <td style="font-size:11px;"><a style="color:black;" href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                            </td>
                                                                            </tr>
                                                                        
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                
                                                                </div><!-- end card -->
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </div>
                                            {{-- Trademark acceptance --}}
                                            <div class="tab-pane fade" id="appeal" role="tabpanel">
                                                <div class="tab-pane fade show active" id="search" role="tabpanel">
                                                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-8">
                                                        <div class="card-body">
                                                        <form method="GET" action="{{route('deadline.dashboard')}}">
                                                            {{ csrf_field() }}
                                                            <div class="col-xl-12">
                                                                
                                                                    <div class="card-body">
                                                                        <div class="dropdown float-end">
                                                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="mdi mdi-dots-vertical"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                                            </div>
                                                                        </div>
                                    
                                                                        
                                    
                                                                        <div class="table-responsive">
                                                                            <table  id="tbAdresse" class="table table-striped table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                            
                                                                                    <th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
                                                                                    <th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
                                                                                    <th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>
                                                                                    <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Class</th>
                                                                                    <th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing No.</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing Date</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Publication Date</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Opposition Filing Date</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                            
                                                                                <tbody>
                                                                                
                                                                            <tr>
                                                                            
                                                                                <td style="font-size:11px;"><a style="color:black;" href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                            </td>
                                                                            </tr>
                                                                        
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                
                                                                </div><!-- end card -->
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </div>
                                            {{-- Trademark registration --}}
                                            <div class="tab-pane fade" id="registration" role="tabpanel">
                                                <div class="tab-pane fade show active" id="search" role="tabpanel">
                                                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-8">
                                                        <div class="card-body">
                                                        <form method="GET" action="{{route('deadline.dashboard')}}">
                                                            {{ csrf_field() }}
                                                            <div class="col-xl-12">
                                                                
                                                                    <div class="card-body">
                                                                        <div class="dropdown float-end">
                                                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="mdi mdi-dots-vertical"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                                            </div>
                                                                        </div>
                                    
                                                                        
                                    
                                                                        <div class="table-responsive">
                                                                            <table  id="tbAdresse" class="table table-striped table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                            
                                                                                    <th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
                                                                                    <th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
                                                                                    <th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>
                                                                                    <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Class</th>
                                                                                    <th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing No.</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing Date</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Registration Number</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Registration Date</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Renewal Date</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                            
                                                                                <tbody>
                                                                                
                                                                            <tr>
                                                                            
                                                                                <td style="font-size:11px;"><a style="color:black;" href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                            </td>
                                                                            </tr>
                                                                        
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                
                                                                </div><!-- end card -->
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </div>
                                              {{-- Trademark Renewal --}}
                                            <div class="tab-pane fade" id="renewal" role="tabpanel">
                                                <div class="tab-pane fade show active" id="search" role="tabpanel">
                                                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-8">
                                                        <div class="card-body">
                                                        <form method="GET" action="{{route('deadline.dashboard')}}">
                                                            {{ csrf_field() }}
                                                            <div class="col-xl-12">
                                                                
                                                                    <div class="card-body">
                                                                        <div class="dropdown float-end">
                                                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="mdi mdi-dots-vertical"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                                            </div>
                                                                        </div>
                                    
                                                                        
                                    
                                                                        <div class="table-responsive">
                                                                            <table  id="tbAdresse" class="table table-striped table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                            
                                                                                    <th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
                                                                                    <th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
                                                                                    <th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>
                                                                                    <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Class</th>
                                                                                    <th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing No.</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing Date</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Registration Number</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Renewal Deadline H</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Renewal Deadline AD</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                            
                                                                                <tbody>
                                                                                
                                                                            <tr>
                                                                            
                                                                                <td style="font-size:11px;"><a style="color:black;" href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                            </td>
                                                                            </tr>
                                                                        
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                
                                                                </div><!-- end card -->
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </div>
                                               {{-- Trademark Abandon --}}
                                               <div class="tab-pane fade" id="abandon" role="tabpanel">
                                                <div class="tab-pane fade show active" id="search" role="tabpanel">
                                                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-8">
                                                        <div class="card-body">
                                                        <form method="GET" action="{{route('deadline.dashboard')}}">
                                                            {{ csrf_field() }}
                                                            <div class="col-xl-12">
                                                                
                                                                    <div class="card-body">
                                                                        <div class="dropdown float-end">
                                                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="mdi mdi-dots-vertical"></i>
                                                                            </a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                                                                <!-- item-->
                                                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                                            </div>
                                                                        </div>
                                    
                                                                        
                                    
                                                                        <div class="table-responsive">
                                                                            <table  id="tbAdresse" class="table table-striped table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                            
                                                                                    <th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
                                                                                    <th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
                                                                                    <th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>
                                                                                    <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Class</th>
                                                                                    <th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing No.</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Filing Date</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Registration Number</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Renewal Deadline H</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Renewal Deadline AD</th>
                                                                                    <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                            
                                                                                <tbody>
                                                                                
                                                                            <tr>
                                                                            
                                                                                <td style="font-size:11px;"><a style="color:black;" href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                                <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                                                                            </td>
                                                                            </tr>
                                                                        
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                
                                                                </div><!-- end card -->
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- end tab --}}

						<!--start table-->
			
                        {{-- <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            </div>
                                        </div>
    
                                        <h4 class="card-title mb-4">Annuity Deadline</h4>
    
                                        <div class="table-responsive">
                                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Position</th>
                                                        <th>Status</th>
                                                        <th>Age</th>
                                                        <th>Start date</th>
                                                        <th style="width: 120px;">Salary</th>
                                                    </tr>
                                                </thead><!-- end thead -->
                                                <tbody>
                                                    <tr>
                                                        <td><h6 class="mb-0">Charles Casey</h6></td>
                                                        <td>Web Developer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                        </td>
                                                        <td>
                                                            23
                                                        </td>
                                                        <td>
                                                            04 Apr, 2021
                                                        </td>
                                                        <td>$42,450</td>
                                                    </tr>
                                                     <!-- end -->
                                                     <tr>
                                                        <td><h6 class="mb-0">Alex Adams</h6></td>
                                                        <td>Python Developer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div>
                                                        </td>
                                                        <td>
                                                            28
                                                        </td>
                                                        <td>
                                                            01 Aug, 2021
                                                        </td>
                                                        <td>$25,060</td>
                                                    </tr>
                                                     <!-- end -->
                                                     <tr>
                                                        <td><h6 class="mb-0">Prezy Kelsey</h6></td>
                                                        <td>Senior Javascript Developer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                        </td>
                                                        <td>
                                                            35
                                                        </td>
                                                        <td>
                                                            15 Jun, 2021
                                                        </td>
                                                        <td>$59,350</td>
                                                    </tr>
                                                     <!-- end -->
                                                     <tr>
                                                        <td><h6 class="mb-0">Ruhi Fancher</h6></td>
                                                        <td>React Developer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                        </td>
                                                        <td>
                                                            25
                                                        </td>
                                                        <td>
                                                            01 March, 2021
                                                        </td>
                                                        <td>$23,700</td>
                                                    </tr>
                                                     <!-- end -->
                                                     <tr>
                                                        <td><h6 class="mb-0">Juliet Pineda</h6></td>
                                                        <td>Senior Web Designer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                        </td>
                                                        <td>
                                                            38
                                                        </td>
                                                        <td>
                                                            01 Jan, 2021
                                                        </td>
                                                        <td>$69,185</td>
                                                    </tr>
                                                     <!-- end -->
                                                     <tr>
                                                        <td><h6 class="mb-0">Den Simpson</h6></td>
                                                        <td>Web Designer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div>
                                                        </td>
                                                        <td>
                                                            21
                                                        </td>
                                                        <td>
                                                            01 Sep, 2021
                                                        </td>
                                                        <td>$37,845</td>
                                                    </tr>
                                                     <!-- end -->
                                                     <tr>
                                                        <td><h6 class="mb-0">Mahek Torres</h6></td>
                                                        <td>Senior Laravel Developer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                        </td>
                                                        <td>
                                                            32
                                                        </td>
                                                        <td>
                                                            20 May, 2021
                                                        </td>
                                                        <td>$55,100</td>
                                                    </tr>
                                                     <!-- end -->
                                                </tbody><!-- end tbody -->
                                            </table> <!-- end table -->
                                        </div>
                                    </div><!-- end card -->
                                </div><!-- end card -->
                            </div> --}}
                            <!-- end col -->
                            {{-- <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            </div>
                                        </div>
    
                                        <h4 class="card-title mb-4">Registered Mark</h4>
    
                                        <div class="table-responsive">
                                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Position</th>
                                                        <th>Status</th>
                                                        <th>Age</th>
                                                        <th>Start date</th>
                                                        <th style="width: 120px;">Salary</th>
                                                    </tr>
                                                </thead><!-- end thead -->
                                                <tbody>
                                                    <tr>
                                                        <td><h6 class="mb-0">Charles Casey</h6></td>
                                                        <td>Web Developer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                        </td>
                                                        <td>
                                                            23
                                                        </td>
                                                        <td>
                                                            04 Apr, 2021
                                                        </td>
                                                        <td>$42,450</td>
                                                    </tr>
                                                     <!-- end -->
                                                     <tr>
                                                        <td><h6 class="mb-0">Alex Adams</h6></td>
                                                        <td>Python Developer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div>
                                                        </td>
                                                        <td>
                                                            28
                                                        </td>
                                                        <td>
                                                            01 Aug, 2021
                                                        </td>
                                                        <td>$25,060</td>
                                                    </tr>
                                                     <!-- end -->
                                                     <tr>
                                                        <td><h6 class="mb-0">Prezy Kelsey</h6></td>
                                                        <td>Senior Javascript Developer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                        </td>
                                                        <td>
                                                            35
                                                        </td>
                                                        <td>
                                                            15 Jun, 2021
                                                        </td>
                                                        <td>$59,350</td>
                                                    </tr>
                                                     <!-- end -->
                                                     <tr>
                                                        <td><h6 class="mb-0">Ruhi Fancher</h6></td>
                                                        <td>React Developer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                        </td>
                                                        <td>
                                                            25
                                                        </td>
                                                        <td>
                                                            01 March, 2021
                                                        </td>
                                                        <td>$23,700</td>
                                                    </tr>
                                                     <!-- end -->
                                                     <tr>
                                                        <td><h6 class="mb-0">Juliet Pineda</h6></td>
                                                        <td>Senior Web Designer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                        </td>
                                                        <td>
                                                            38
                                                        </td>
                                                        <td>
                                                            01 Jan, 2021
                                                        </td>
                                                        <td>$69,185</td>
                                                    </tr>
                                                     <!-- end -->
                                                     <tr>
                                                        <td><h6 class="mb-0">Den Simpson</h6></td>
                                                        <td>Web Designer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div>
                                                        </td>
                                                        <td>
                                                            21
                                                        </td>
                                                        <td>
                                                            01 Sep, 2021
                                                        </td>
                                                        <td>$37,845</td>
                                                    </tr>
                                                     <!-- end -->
                                                     <tr>
                                                        <td><h6 class="mb-0">Mahek Torres</h6></td>
                                                        <td>Senior Laravel Developer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                        </td>
                                                        <td>
                                                            32
                                                        </td>
                                                        <td>
                                                            20 May, 2021
                                                        </td>
                                                        <td>$55,100</td>
                                                    </tr>
                                                     <!-- end -->
                                                </tbody><!-- end tbody -->
                                            </table> <!-- end table -->
                                        </div>
                                    </div><!-- end card -->
                                </div><!-- end card -->
                            </div>
                        </div> --}}
                        
                        {{-- end table --}}
		</div>
		<!--end page wrapper -->
        <script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
        <script src="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
        <script src="{{ asset('admin_dashboard_assets/plugins/chartjs/js/Chart.min.js') }}"></script>
        <script src="{{ asset('admin_dashboard_assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
        <script src="{{ asset('admin_dashboard_assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
        <script src="{{ asset('admin_dashboard_assets/js/index.js') }}"></script>
       
        @section("script")
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
            
                $(function() {                   
                         $("#start-date").datepicker({
                          dateFormat: "dd/mm/yy",
                           maxDate: 0,
                          onSelect: function (date) {
                              var dt2 = $('#end-date');
                              var startDate = $(this).datepicker('getDate');
                              var minDate = $(this).datepicker('getDate');
                              if (dt2.datepicker('getDate') == null){
                                dt2.datepicker('setDate', minDate);
                              }              
                              //dt2.datepicker('option', 'maxDate', '0');
                              dt2.datepicker('option', 'minDate', minDate);
                          }
                        });
                        $('#end-date').datepicker({
                            dateFormat: "dd/mm/yy",
                            maxDate: 0
                        });           
                     });
                
            
            
            </script>
        

@endsection



