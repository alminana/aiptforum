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

    <div class="container">
        <h2>Users</h2> 

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        
        <div class="card">
               <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   
                    <th>Name</th>
                    <th>User name</th>
                    <th>status </th>
                    <th>department </th>
                    <th>action</th>
                    <!-- Add other user fields as needed -->
                  </tr>
                  </thead>
                  <tbody>
                 <?php  ?>
                  @foreach ($userschunk as $user)
                    <tr>
                       
                        <td>{{ $user[0]->name }}</td>
                        <td>{{ $user[0]->username }}</td>
                            @if( $user[0]->status  == 1 )
                            <td style="color:green"> {{'active [NoNeed to active]'}} </td>
                            @else <td style="color:red"> {{'non-active [active to use]'}} </td>
                            @endif
                            <td>{{ $user[0]->department_name }}</td>
                            <td class="project-actions text-right">
                            <form action="{{route('users.delete',$user[0]->id)}}" method="POST">
                            <a class="btn btn-info" href="{{route('users.show',$user[0]->id)}}"> <i class="fas fa-folder"></i>Show</a>
                            <a class="btn btn-primary" href="{{route('users.edit',$user[0]->id)}}"><i class="fas fa-pencil-alt"></i>Edit</a>
                            @if( $user[0]->status  == 1 )
                            <a class="btn btn-primary" href="{{route('users.unactive',$user[0]->id)}}"><i class="fas fa-pencil-alt"></i>stop</a>
                            @else 
                            <a class="btn btn-primary" href="{{route('users.active',$user[0]->id)}}"> <i class="fas fa-pencil-alt"></i>active</a>
                            @endif
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                         
                        </td>
                        <!-- Add other user fields as needed -->
                    </tr>
                @endforeach
              
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            
    </div>
          
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
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>
