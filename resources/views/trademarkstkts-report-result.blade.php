<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  @include('layouts.headerscript')

 

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ URL::asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">Result of  Search</h2>
            
        </div>
   
        <h2>Trade Marks</h2> 

        <a href="{{route('trademarkstkts.excel')}}" target="_blank" rel="noopener noreferrer">Export to Excel</a>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
       
               <!-- /.card-header -->
              <div class="card-body" id="test">
                
         
                <table id="example1" class="table table-bordered "> 
                  <thead id='headers'>
                    <tr>
                      
                       
                        <th style=>
                        Reference
                        </th>
                        <th style=>
                        Procedure
                        </th>
                        <th style=>
                        Applicant's Name
                        </th>
                        <th style=>
                        Trademark Name 
                        </th>
                        <th style=>
                        LOGO
                        </th>
                        <th style=>
                        Class
                        </th>
                     
                        <th style=>
                        Status Now
                        </th>
                        <th style=>
                        Reg. No.
                        </th>
                        <th style=>
                        Country
                        </th>
                        <th style=>
                        Client
                        </th>
                        <th style=>
                        Status
                        </th>
                        <th style=>
                        Responsible By
                        </th>
                    </tr>
                  </thead>
                  <tbody>
               
                  @if(isset($trademarkstkts))
                  
                  @foreach ($trademarkstkts as $trademarkstkt)
                    <tr>                                          
                        <td>{{ $trademarkstkt[0]->clientref }}</td>
                        <td>{{ $trademarkstkt[0]->procedure_name }}</td>
                        <td>{{ $trademarkstkt[0]->associate_name }}</td>
                        <td>{{ $trademarkstkt[0]->trademark_name }}</td>
                        <td><img src="/public/Tanzania_files/{{ $trademarkstkt[0]->img_paths }}" width="100px" height="100px"></td>
                        <td>{{ $trademarkstkt[0]->class }}</td>
                        <td>{{ $trademarkstkt[0]->_methode_name }}</td>
                        <td>{{ $trademarkstkt[0]->register_no }}</td>
                        <td>{{ $trademarkstkt[0]->country_name }}</td>
                        <td>{{ $trademarkstkt[0]->client_name }}</td>
                        <td style="color:{{ $trademarkstkt[0]->color }}">{{ $trademarkstkt[0]->_methode_name }}</td>
                        <td>{{ $trademarkstkt[0]->name }}</td>
                     
                    </tr>
                  @endforeach

                  @elseif($trademarkstktsQuery)

                  @foreach ($trademarkstktsQuery as $trademarkstkt)
                    <tr>                                          
                        <td>{{ $trademarkstkt->clientref }}</td>
                        <td>{{ $trademarkstkt->procedure_name }}</td>
                        <td>{{ $trademarkstkt->associate_name }}</td>
                        <td>{{ $trademarkstkt->trademark_name }}</td>
                        <td><img src="/public/Tanzania_files/{{ $trademarkstkt->img_paths }}" width="100px" height="100px"></td>
                        <td>{{ $trademarkstkt->class }}</td>
                        <td>{{ $trademarkstkt->_methode_name }}</td>
                        <td>{{ $trademarkstkt->register_no }}</td>
                        <td>{{ $trademarkstkt->country_name }}</td>
                        <td>{{ $trademarkstkt->client_name }}</td>
                        <td style="color:{{ $trademarkstkt->color }}">{{ $trademarkstkt->_methode_name }}</td>
                        <td>{{ $trademarkstkt->name }}</td>
                        <td>
                        <a class="btn btn-info" href="{{ route('trademarkstkts.show',$trademarkstkt->id) }}"> <i class="fas fa-folder"></i>Show</a>
                        </td>
                    </tr>
                  @endforeach
                  
                  @endif 
                  </tbody>
                </table>
                <br>
                <div >
               
                </div>
                
            <div >
         
            
            </div>

              </div>
              <!-- /.card-body -->
          
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @include('layouts.footer')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('layouts.footerscript')




<script>

</script>


<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
</script>


    
</body>
</html>
