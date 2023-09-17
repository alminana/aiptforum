@extends("admin_dashboard.layouts.app")
@section('title')
@section("style")
	<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	@endsection
	@section("wrapper")
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

		
			

      
        </div>
    </div>
@endsection

@section("script")
@section("script")

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
@endsection






    <script src="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard_assets/js/index.js') }}"></script>
@endsection
