<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  @include('layouts.headerscript')


  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>



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

   
        <h2>Trade Marks</h2> 

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        
      
               <!-- /.card-header -->
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
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

                       
                        <th style="" class="text-center">
                            actions
                        </th>
                      
                    </tr>
                  </thead>
                  <tbody>
               
                  @foreach ($trademarkstkts as $trademarkstkt)
                    <tr>                                          
                        <td>{{ $trademarkstkt->clientref }}</td>
                        <td>{{ $trademarkstkt->procedure_name }}</td>
                        <td>{{ $trademarkstkt->associate_name }}</td>
                        <td>{{ $trademarkstkt->trademark_name }}</td>
                        <td>{{ $trademarkstkt->img_paths }}</td>
                        <td>{{ $trademarkstkt->class }}</td>
                        <td>{{ $trademarkstkt->_methode_name }}</td>
                        <td>{{ $trademarkstkt->register_no }}</td>
                        <td>{{ $trademarkstkt->country_name }}</td>
                        <td>{{ $trademarkstkt->client_name }}</td>
                        <td style="color:{{ $trademarkstkt->color }}">{{ $trademarkstkt->_methode_name }}</td>
                        <td>{{ $trademarkstkt->name }}</td>
                        <td class="project-actions text-right">
                        <a class="btn btn-info" href="{{ route('trademarkstkts.show',$trademarkstkt->id) }}"> <i class="fas fa-folder"></i>Show</a>
                        </td>
                        <!-- Add other user fields as needed -->
                    </tr>
                @endforeach
              
                  </tbody>
                </table>
                <br>
                <div >
                <div class="d-flex justify-content-center">
                {!! $trademarkstkts->links() !!}
                </div>
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





    
</body>
</html>
