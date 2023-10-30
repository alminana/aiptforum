@extends('main_layouts.master')

@section('title', ' Category | AIPTFORUM')
@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	@endsection

@section('content')  
<br/>
 <div class="page-wrapper">
<div class="container-fluid">
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


    <div class="row">
        <div class="col-md-12 text-center ">
            <strong>Search</strong>
            <input type="radio" name="customer_wise_report" value="customer_wise_credit" class="search_value"> &nbsp;&nbsp;


            <strong>Filing </strong>
            <input type="radio" name="customer_wise_report" value="customer_wise_paid" class="search_value">

            <strong>Acceptance </strong>
            <input type="radio" name="customer_wise_report" value="customer_wise_paid" class="search_value">

            <strong>Appeal </strong>
            <input type="radio" name="customer_wise_report" value="customer_wise_paid" class="search_value">

            <strong>Registration </strong>
            <input type="radio" name="customer_wise_report" value="customer_wise_paid" class="search_value">

            <strong>Renewal </strong>
            <input type="radio" name="customer_wise_report" value="customer_wise_paid" class="search_value">


        </div>        
    </div> <!-- // end row  -->

<!--  /// Customer Credit Wise  -->
    <div class="show_credit" style="display:none">
     
            <div class="card-body">
                <div class="table-responsive">
                    <table  id="tbAdresse" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="aiptref" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">AIPTREF</th>
                                <th class="clientref"class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Client Ref.</th>
                                <th class="title" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Country</th>
                                <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Procedure</th>
                                <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Class</th>
                                <th class="status" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Examination Report</th>
                                <th class="requesteddate" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Registrability (%)</th>
                                <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Our Opinion</th>
                                <th class="slug" class="sorting" tabindex="0" aria-controls="tbAdresse" rowspan="1" colspan="1" style="width: 54px;">Action</th>
                            </tr>
                        </thead>
                   
                        <tbody>
                        @forelse($search  as $key => $item)
                     
                    <tr>
                    
                        <td style="font-size:11px;"><a style="color:black;" href="" >{{$item->aiptref}}</a></td>
                        <td style="font-size:11px;"><a style="color:black;"href="" >{{$item->clientref}}</a></td>
                        <td style="font-size:11px;"><a style="color:black;"href="" ></a>{{$item->country }}</td>
                        <td style="font-size:11px;"><a style="color:black;"href="" ></a>{{$item->status }}</td>  
                        <td style="font-size:11px;"><a style="color:black;"href="" ></a>{{$item->class }}</td>  
                        <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                        <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                        <td style="font-size:11px;"><a style="color:black;"href="" ></a></td>
                        <td style="font-size:11px;"><a style="color:black;"href="" ></a>
                            <div class="d-flex order-actions">
                                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='bx bxs-edit'></i></a>
                                <a href=""><i class='bx bxs-comment-add'></i></a>
                                <a href="" class=""><i class='bx bxs-cloud-lightning'></i></a>
                            </div>
                        </td>
                    </td>
                    </tr>
                    @empty
                        <p class='lead'>There are no Application to show.</p>
                    @endforelse
                        </tbody>
                    </table>
                
        
       
        {{-- <form method="GET" action="{{ route('customer.wise.credit.report') }}" id="myForm">

            <div class="row">
                <div class="col-sm-8 form-group">
                    <label>Customer Name </label>
              <select name="customer_id" class="form-select select2"  >
                <option value="">Select Customer</option>
                @foreach($customers as $cus)
                <option value="{{ $cus->id }}">{{ $cus->name }}</option>
               @endforeach
                </select>                    
                </div>

                <div class="col-sm-4" style="padding-top: 28px;">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>

            </div>

        </form> --}}

    </div>
<!--  /// End Customer Credit Wise  -->

<!--  /// show_paid  -->
<div class="show_paid" style="display:none">
    2
    {{-- <form method="GET" action="{{ route('customer.wise.paid.report') }}" id="myForm">

            <div class="row">
                <div class="col-sm-8 form-group">
                    <label>Customer Name </label>
              <select name="customer_id" class="form-select select2"  >
                <option value="">Select Customer</option>
                @foreach($customers as $cus)
                <option value="{{ $cus->id }}">{{ $cus->name }}</option>
               @endforeach
                </select>                    
                </div>

                <div class="col-sm-4" style="padding-top: 28px;">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>

            </div>

        </form> --}}

    </div>
<!--  /// End show_paid  -->






                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>

@section("script")
<script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_dashboard_assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

<script>
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


    <script type="text/javascript">
        $(document).on('change','.search_value', function(){
            var search_value = $(this).val();
            if (search_value == 'customer_wise_credit') {
                $('.show_credit').show();
            }else{
                $('.show_credit').hide();
            }
        }); 
    </script>


    <script type="text/javascript">
        $(document).on('change','.search_value', function(){
            var search_value = $(this).val();
            if (search_value == 'customer_wise_paid') {
                $('.show_paid').show();
            }else{
                $('.show_paid').hide();
            }
        }); 
    </script>
@endsection



