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

  
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">Enhanced Search</h2>
            <form action="{{route('trademarkstkts.report')}}" methode="POST">
             
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                          <div class="col-2">
                              <div class="form-group">
                                      <label>Procedures:</label>
                                      <select class="select2" name="procedures" style="width: 100%;">
                                      <option value="0" selected>choose</option>
                                      @foreach ($procedures as $procedure)
                                      <option value="{{ $procedure->id }}">{{ $procedure->procedure_name }}</option>
                                      @endforeach
                                      </select>
                                  </div>
                            </div>
                            <div class="col-2">
                            <div class="form-group">
                                    <label>Status:</label>
                                    <select class="select2" name="methodes" style="width: 100%;">
                                    <option value="0" selected>choose</option>
                                        @foreach ($methodes as $methode)
                                        <option value="{{ $methode->id }}">{{ $methode->_methode_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>associates:</label>
                                    <select class="select2" name="associates" style="width: 100%;">
                                    <option value="0" selected>choose</option>
                                        @foreach ($associates as $associate)
                                        <option value="{{ $associate->id }}">{{ $associate->associate_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>countries :</label>
                                    <select class="select2" name="countries" style="width: 100%;">
                                    <option value="0" selected>choose</option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>clients :</label>
                                    <select class="select2" name="clients" style="width: 100%;">
                                    <option value="0" selected>choose</option>
                                      @foreach ($clients as $client)
                                      <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Users :</label>
                                    <select class="select2" name="users" style="width: 100%;">
                                    <option value="0" selected>choose</option>
                                      @foreach ($users as $user)
                                      <option value="{{ $user->id }}">{{ $user->username }}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                            <input type="search" class="form-control" placeholder="Type your keywords here" name="search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
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
      "orientation": 'landscape',
    
    });
  });
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
