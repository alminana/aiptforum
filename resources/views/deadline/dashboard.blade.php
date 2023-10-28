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
                                <h6 class="mb-0 text-uppercase">Notifications</h6>
                                <hr/>
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-primary" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                                                    <div class="d-flex align-items-center">
                                                        <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                                                        </div>
                                                        <div class="tab-title">Trademark Filing</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
                                                    <div class="d-flex align-items-center">
                                                        <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                                        </div>
                                                        <div class="tab-title">Trademark Publication</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab" aria-selected="false">
                                                    <div class="d-flex align-items-center">
                                                        <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                                                        </div>
                                                        <div class="tab-title">Trademark Registration</div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content py-3">
                                            {{-- Trademark Procedure --}}
                                            <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi.</p>
                                            </div>
                                            {{-- Trademark Actual --}}
                                            <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                                                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                                            </div>
                                                {{-- Trademark Priority --}}
                                            <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                                                <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- end tab --}}

						<!--start table-->
			
                        <div class="row">
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
                            </div>
                            <!-- end col -->
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
                        </div>
                        
                        {{-- end table --}}
		</div>
		<!--end page wrapper -->
@endsection