@extends('main_layouts.master')
@section('title')
@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	@endsection
        @section("content")
            <!--start page wrapper -->
                <div class="page-wrapper">
                    <div class="page-content">
                        {{-- total --}}
                        {{-- <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                            <div class="col">
                                <div class="card radius-10 border-start border-0 border-3 border-info">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Total Orders</p>
                                                <h4 class="my-1 text-info">4805</h4>
                                                <p class="mb-0 font-13">+2.5% from last week</p>
                                            </div>
                                            <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class='bx bxs-cart'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card radius-10 border-start border-0 border-3 border-danger">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Total Revenue</p>
                                                <h4 class="my-1 text-danger">$84,245</h4>
                                                <p class="mb-0 font-13">+5.4% from last week</p>
                                            </div>
                                            <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class='bx bxs-wallet'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card radius-10 border-start border-0 border-3 border-success">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Bounce Rate</p>
                                                <h4 class="my-1 text-success">34.6%</h4>
                                                <p class="mb-0 font-13">-4.5% from last week</p>
                                            </div>
                                            <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card radius-10 border-start border-0 border-3 border-warning">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Total Customers</p>
                                                <h4 class="my-1 text-warning">8.4K</h4>
                                                <p class="mb-0 font-13">+8.4% from last week</p>
                                            </div>
                                            <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class='bx bxs-group'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!--end row-->
            
                        <div class="row">
                         
                            <div class="col-12 col-lg-4">
                                <div class="card radius-10">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="mb-0">Project Overview</h6>
                                            </div>
                                            <div class="dropdown ms-auto">
                                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
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
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center ms-auto font-13 gap-2 my-3">
                                            <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #14abef"></i>Trademark</span>
                                            <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #ffc107"></i>Patent</span>
                                            <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #137530"></i>Design</span>
                                            <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #e8590c"></i>Letigation</span>
                                        </div>
                                        <div class="chart-container-1">
                                            <canvas id="chart1"></canvas>
                                        </div>
                                    </div>
                                    <div class="row row-cols-1 row-cols-md-4 row-cols-xl-4 g-0 row-group text-center border-top">
                                        <div class="col">
                                            <div class="p-3">
                                     
                                                <small class="mb-0">Trademark <span> <i class="bx bx-up-arrow-alt align-middle"></i> </span></small>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="p-3">
                                               
                                                <small class="mb-0">Patent<span> <i class="bx bx-up-arrow-alt align-middle"></i> </span></small>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="p-3">
                 
                                                <small class="mb-0">Design <span> <i class="bx bx-up-arrow-alt align-middle"></i> </span></small>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="p-3">
                            
                                                <small class="mb-0">Letigation <span> <i class="bx bx-up-arrow-alt align-middle"></i></span></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="card w-100 radius-10">
                                    <div class="card-body">
                                        <div class="card radius-10 border shadow-none">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                          
                                                        <h4 class="my-1">Trademark</h4>
                                                        <p class="mb-0 font-13"><a href="{{ route('deadline.getData') }}"><i class="bx bx-right-arrow-alt"></i>Trademark Report</a></p>
                                                        <p class="mb-0 font-13"><a href="{{route('categories.requested')}}"><i class="bx bx-right-arrow-alt"></i>Requested Deadline</a></p>
                                                        <p class="mb-0 font-13"><a href="{{route('categories.actual')}}"><i class="bx bx-right-arrow-alt"></i>Actual Deadline</a></p>
                                                    </div>
                                                    <div class="widgets-icons-2 bg-gradient-cosmic text-white ms-auto"><i class="fadeIn animated bx bx-hive"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card radius-10 border shadow-none">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                       
                                                        <h4 class="my-1">Patent</h4>
                                                        <p class="mb-0 font-13"><a href="{{route('past.pct')}}"><i class="bx bx-right-arrow-alt"></i>PCT Deadline</a></p>
                                                        <p class="mb-0 font-13"><a href="{{route('past.regular')}}"><i class="bx bx-right-arrow-alt"></i>Regular Deadline</a></p>
                                                        <p class="mb-0 font-13"><a href="{{route('past.request')}}"><i class="bx bx-right-arrow-alt"></i>Requested Deadline</a></p>
                                                        <p class="mb-0 font-13"><a href="{{route('past.actual')}}"><i class="bx bx-right-arrow-alt"></i>Actual Deadline</a></p>
                                                        <p class="mb-0 font-13"><a href="{{route('past.annual')}}"><i class="bx bx-right-arrow-alt"></i>Annual Deadline</a></p>
                                                    </div>
                                                    <div class="widgets-icons-2 bg-gradient-ibiza text-white ms-auto"><i class='bx bxs-cog'></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card radius-10 mb-0 border shadow-none">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                     
                                                        <h4 class="my-1">Design</h4>
                                                        {{-- <p class="mb-0 font-13">+4.6% from last week</p> --}}
                                                    </div>
                                                    <div class="widgets-icons-2 bg-gradient-moonlit text-white ms-auto"><i class='bx bxs-share-alt'></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="card radius-10">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="mb-0">Trending Clients</h6>
                                            </div>
                                            <div class="dropdown ms-auto">
                                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
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
                                                </ul>
                                            </div>
                                        </div>
                                        {{-- <div class="chart-container-2 mt-4">
                                            <canvas id="chart2"></canvas>
                                        </div> --}}
                                    </div>
                                    <ul class="list-group list-group-flush" style=" height: 400px; overflow: auto">
                                        @forelse($categories as $category)
                                        <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center"><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a> <span class="badge bg-primary rounded-pill">{{ $category->posts_count }}</span>
                                        </li>
                                        @empty
                                            <p class='lead'>There are no categories to show.</p>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div><!--end row-->
                        {{-- total --}}
                        {{-- dashboard --}}
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                      
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <button type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-primary px-5 rounded-0">Search</button>
                                        </a>
                                        <div class="col">
                                          
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Select Procedure</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="GET" action="{{route('deadline.dashboard')}}">
                                                                {{ csrf_field() }}
                                                                    <select required class="single-select form-select" name='status' class="single-select">
                                                                        @foreach($method as $key => $method)
                                                                        <option value="{{ $method->method }}">{{ $method->method }}</option>
                                                                
                                                                        @endforeach
                                                                    </select>

                                                                    @error('method')
                                                                        <p class='text-danger'>{{ $message }}</p>
                                                                    @enderror

                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                
                                                                    <button type="submit" value="Submit" class="btn btn-primary">Search</button>
                                                                
                                                                </div>
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tbAdresse" class="table align-middle mb-0">
                                        <thead class="table-light">
                                        <tr>
                                            <th>AIPTREF</th>
                                            <th>Application</th>
                                            <th>Image</th>
                                            <th>Method</th>
                                            <th>Class</th>
                                            <th>Client</th>
                                            <th>Country</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($allData as $key => $item)
                                                @php
                                                    $expire = strtotime($item->requesteddate);
                                                    $today = strtotime("today midnight");
                                                    $day_diff = $today - $expire; 
                                                    $default  =  strtotime("01/01/0001");                               
                                                    $color = "";
                                                    $deadline = "Deadline";
                                                    $upcomming = "Upcoming";
                                                    $safe = "01/01/0001";
                                                    $done = "done";
                                                    if(($expire == $default)){
                                            
                                                    $color = "color:black;background-color:white;";
                                                    }elseif($today == $expire){
                                            
                                                    $color = "color:black;background-color:#ffab91;";
                                                    } elseif ($day_diff <= 30) {
                                                
                                                    $color = "color:black;background-color:#faf3c0;";
                                                    }	elseif ($today >= $expire) {
                                            
                                                    $color = "color:black;background-color:#ffb3b3;";
                                                    }	
                                                        $colors = "";
                                                        $Filed = "Filed";
                                                        $Published = "Published";
                                                        $Opposed = "Opposed";
                                                        $Registered = "Registered";
                                                        $officeaction = "Office Action";
                                                        $abandon = "Abandon";
                                                        $NewApplication = "New Application";
                                                        $status= ($item->status);
                                                    
                                                        if(($status == $Filed)){
                                                            
                                                            $colors = "color:black;background-color:#00ff00;";
                                                        }elseif($status == $Published){
                                                    
                                                            $colors = "color:black;background-color:#00fffff;";
                                                        }elseif ($status == $Opposed) {
                                                            
                                                            $colors = "color:black;background-color:#cc99ff;";
                                                        }elseif ($status == $Registered) {
                                                        
                                                            $colors = "color:black;background-color:#8B4513; color:white";
                                                        }elseif($status == 	$NewApplication  ){
        
                                                            $colors = "color:black;background-color:#fff00;";
                                                        }elseif($status == $officeaction ){
                                                            
                                                            $colors = "color:black;background-color:#ff9933";
                                                        }
        
                                                        elseif($status == $abandon ){
                                                            
                                                            $colors = "color:black;background-color:#ff6666;";
                                                        }
                                                        
                                                    @endphp
                                                <tr>
                                                    <td>{{$item->aiptref}}</td>
                                                    <td>{{$item->title }}</td>
                                                    <td><img style='width: 20%; height:20%;' src="/storage/{{ $item->image ? $item->image->path : 'placeholders/thumbnail_placeholder.svg' }}"class="product-img-2" alt="product img"></td>
                                                    <td style="{{ $colors }}" style="font-size:11px;"><a style="color:black;"href="" ></a>
                                                        @php
                                                        $colors = "";
                                                                    $Filed = "Filed";
                                                                    $Published = "Published";
                                                                    $Opposed = "Opposed";
                                                                    $Registered = "Registered";
                                                                    $officeaction = "Office Action";
                                                                    $abandon = "Abandon";
                                                                    $Nodeadline = "No Deadline";
                                                                    $status= ($item->status);
                                                                
                                                                    if(($status == $Filed)){
                                                                                
                                                                                $colors = "color:black;background-color:#00ff00;";
                                                                            }elseif($status == $Published){
                                                                        
                                                                                $colors = "color:black;background-color:#00fffff;";
                                                                            }elseif ($status == $Opposed) {
                                                                                
                                                                                $colors = "color:black;background-color:#cc99ff;";
                                                                            }elseif ($status == $Registered) {
                                                                            
                                                                                $colors = "color:black;background-color:#bfafb2;";
                                                                            }elseif($status == 	$NewApplication  ){
            
                                                                                $colors = "color:black;background-color:#fff00;";
                                                                            }elseif($status == $officeaction ){
                                                                                
                                                                                $colors = "color:black;background-color:#ff9933";
                                                                            }
            
                                                                            elseif($status == $abandon ){
                                                                                
                                                                                $colors = "color:black;background-color:#ff6666;";
                                                                            }
                                                            
                                                                @endphp
                                                        {{$item->status }}
                                                    </td>
                                                 
                                                    <td>{{$item->class}}</td>
                                                    <td>{{$item->excerpt}}</td>
                                                    <td>{{$item->country}}</td>
                                                </tr>
                                            
                                                @empty
                                                {{-- <p class='lead'>There are no Application to show.</p> --}}
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
@section("script")

<script src="{{ asset('admin_dashboard_assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

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




    <script src="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/js/index.js') }}"></script>
@endsection
