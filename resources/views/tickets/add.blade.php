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

                <h3 class="card-title">Show Ticket Details </h3>
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
            
              @if(session()->has('message'))
                <p class="alert alert-danger"> {{ session()->get('message') }}</p>
                @endif

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Add Trade Mark</h5>
                    <br>
                    <h4>Main Info</h4>
                    <hr>

                    <form class="form-group" action="{{route('trademarkstkts.store')}}" method="POST" enctype="multipart/form-data">
              
                    @csrf
                   
                 
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row">
                                            <div class="col">
                                               
                                                <div class="mb-3">
                                                    <label for="inputProductDescription" class="form-label">AIPTREF:</label>
                                                    <input type="text" placeholder="Please Input AIPT Reference" name="aiptref" required="" class="form-control" id="inputProductTitle" value="" >                                        
                                                    
                                                </div>
                                            </div>
                                            <div class="col">
                                              
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Client Reference</label>
                                            <input type="text" value="" placeholder="Please Input n/a if theres is no Client References no." name="clientref" class="form-control" id="inputProductclientref">

                                                                                    </div>
                                            </div>
                                            <div class="col">
                                             
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Name Of Trade Marks</label>
                                            <input type="text" value="" name="Name_TradeMark" required=""  class="form-control" id="inputProductTitle">

                                                                                    </div>
                                              </div>
                                          </div>
                                      
                                      <hr>

                                      <div class="row">

                                      <div class="col-md-6">
                                        <div class="form-group">
                                        <label>the clients</label>
                                        <select class="form-control select2" style="width: 100%;" name="client">
                                        @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                        <div class="form-group">
                                        <label>the associates</label>
                                        <select class="form-control select2" style="width: 100%;" name="associate">
                                    
                                          @foreach ($associates as $associate)
                                          <option value="{{ $associate->id }}">{{ $associate->associate_name }}</option>
                                          @endforeach
                                        
                                        </select>
                                        </div>
                                      </div>


                                      <div class="col-md-6">
                                        <div class="form-group">
                                        <label>the Applicant</label>
                                        <select class="form-control select2" style="width: 100%;" name="applicant">
                                    
                                          @foreach ($applicants as $applicant)
                                          <option value="{{ $applicant->id }}">{{ $applicant->name }}</option>
                                          @endforeach
                                        
                                        </select>
                                        </div>
                                      </div>

                                      
                                      </div>
                                     
                                      <hr>


                                      <div class="row">

                                      <div class="col-md-6">
                                        <div class="form-group">
                                        <label>the procedure</label>
                                        <select class="form-control select2" style="width: 100%;" name="procedure">
                                    
                                          @foreach ($procedures as $procedure)
                                          <option  value="{{ $procedure->id }}">{{ $procedure->procedure_name }}</option>
                                          @endforeach
                                        
                                        </select>
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                        <div class="form-group">
                                        <label>status</label>
                                        <select class="form-control select2" style="width: 100%;" name="methode">
                                        @foreach ($methodes as $methode)
                                          <option  value="{{ $methode->id }}"style="color:{{$methode->color}}">{{ $methode->_methode_name }}</option>
                                          @endforeach
                                        
                                        </select>
                                        </div>
                                      </div>

                                      
                                      </div>

                                      <hr>


                                        <div class="row">
                                            <div class="col">
                                              
                                         <div class="mb-3">
                                         <label>assigned to  :</label>
                                        <select class="form-control select2" style="width: 100%;" name="user">
                                    
                                          @foreach ($users as $user)
                                          <option value="{{ $user->id }}">{{ $user->name }}</option>
                                          @endforeach
                                        
                                        </select>

                                          </div>
                                            </div>
                                            <div class="col">
                                  
                                        <div class="mb-3">
                                        <label>the countries</label>
                                        <select class="form-control select2" style="width: 100%;" name="country">
                                   
                                        @foreach ($countries as $country)
                                          <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                          @endforeach  
                                        </select>
                                        </div>
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="col">
                                           
                                      
                                          <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Class (s)</label>
                                          
                                            <input type="text" value="" placeholder="Please Input n/a if there is no Filing no. yet" class="form-control" name="class" id="inputProductTitle">

                                          </div>
                                            </div>

                                            <div class="col">
                                               
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Registration no.</label>
                 
                                            <input type="text" value="" placeholder="Please Input n/a if there is no Registration no. yet  " class="form-control" name="registrationno" id="inputProductTitle">

                                                                                    </div>
                                            </div>
                                          </div>

                                          <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">filing_no no.</label>
                 
                                           
                                            <input type="text" value="" placeholder="Please Input n/a if there is no Registration no. yet  " class="form-control" name="filing_no" id="inputProductTitle">

                                            <label for="inputProductTitle" class="form-label">filing date.</label>
                 
                                           
                                            <input type="date" value="" placeholder="Please Input n/a if there is no Registration no. yet  " class="form-control" name="filing_date" id="inputProductTitle">

                                            </div>
                                            </div>
                                          </div>

                                    
                                          <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Logo </label>
                 
                                            <input type="file" name="attach" class="form-control">
                                          </div>
                                            </div>
                                          </div>

                                         
                                          </div>
                                        <br>
                                        <br>
                                      
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Folder Link</label>
                                            <input type="text" value="" placeholder="Please Input the folder link from qnap storage" name="inputPfolderlink" class="form-control" id="inputPfolderlink">
                                        </div> 

                                        <button class="btn btn-primary" type="submit">add TradeMark </button>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>

                </div>
            </div>



          
     

            
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


<script>
    $(document).on("click","#formPass",function() {
        $(this).parents("form").submit();
    });
</script>


</body>
</html>
