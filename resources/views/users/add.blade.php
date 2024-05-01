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

                <h3 class="card-title">Create User </h3>
              <br>  <br>  <br>

             
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <strong>Whoops!</strong> There were some problems with your input.<br><br>
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif


              <div class="container">
              <div class="row justify-content-center">
              <div class="col-md-8">
                
              <form class="form-group" action="/users/store" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                @csrf
                  <div class="row g-3 align-items-center">
                    <div class="input-group">
                    <span class="input-group-text">First and last name</span>
                    <input type="text" aria-label="First name" class="form-control" name="fname"  value="{{ old('fname') }}" placeholder="first name">
                    <input type="text" aria-label="Last name" class="form-control" name="lname" value="{{ old('lname') }}" placeholder="last name">
                    </div>
                  </div>
                    <br><br>
                  <div class="row g-3 align-items-center">
                    <div class="input-group">
                    <span class="input-group-text">Email address</span>
                    <br>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ old('email') }}"  placeholder="Enter email">
                    
                    <select class="form-select" aria-label="Default select example"name = "gender">
                      <option selected>Open this select menu</option>
                      <option value="male">male</option>
                      <option value="female">female</option>
                    </select>

                    </div>
                  </div>

                    <br>
                  
                    <div class="form-group">
                   
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Image path:</strong>
                          <input type="file" name="image" class="form-control" placeholder="image">
                      </div>
                  </div>
                  </div>
            <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>his manger</label>
                  <select class="form-control select2" style="width: 100%;" name="manger">
                    <option selected="selected">choose his manger</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>departments</label>
                  <select class="form-control select2" style="width: 100%;" name="departments">
                    <option selected="selected">choose his department</option>
                    @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>seniority</label>
                  <select class="form-control select2" style="width: 100%;" name="seniority">
                    <option selected="selected">choose his seniority</option>
                    <option value="jouniior">jouniior</option>
                    <option value="senior">senior</option>
                    <option value="manger">manger</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
         
        </div>
                  

              

                  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                 </div>
               
              </form>
            </div> </div> </div> 










          
     

            
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
