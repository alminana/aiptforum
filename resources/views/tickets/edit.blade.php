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

            
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Edit Trade Mark</h5>
                    <br>
                    <h4>Main Info</h4>
                    <hr>

                    <form class="form-group" action="{{route('trademarkstkts.update',$trademarkstkt[0]->id)}}" method="POST" enctype="multipart/form-data">
              
                    @csrf
                    @method('PATCH')
                 
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row">
                                            <div class="col">
                                               
                                                <div class="mb-3">
                                                    <label for="inputProductDescription" class="form-label">AIPTREF:</label>
                                                    <input type="text" placeholder="Please Input AIPT Reference" name="aiptref" required="" class="form-control" id="inputProductTitle" value="{{$trademarkstkt[0]->aiptref}}" >                                        
                                                    
                                                </div>
                                            </div>
                                            <div class="col">
                                              
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Client Reference</label>
                                            <input type="text" value="{{$trademarkstkt[0]->clientref}}" placeholder="Please Input n/a if theres is no Client References no." name="clientref" class="form-control" id="inputProductclientref">

                                                                                    </div>
                                            </div>
                                            <div class="col">
                                             
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Name Of Trade Marks</label>
                                            <input type="text" value="{{$trademarkstkt[0]->trademark_name}}" name="Name_TradeMark" required=""  class="form-control" id="inputProductTitle">

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
                                        <option value="{{ $client->id }}" @if($client->id == $trademarkstkt[0]->client_id) selected='selected' @endif>{{ $client->client_name }}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                        <div class="form-group">
                                        <label>the associates</label>
                                        <select class="form-control select2" style="width: 100%;" name="associate">
                                    
                                          @foreach ($associates as $associate)
                                          <option value="{{ $associate->id }}" @if($associate->id == $trademarkstkt[0]->associate_id) selected='selected' @endif>{{ $associate->associate_name }}</option>
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
                                          <option  value="{{ $procedure->id }}" @if($procedure->id == $trademarkstkt[0]->procedure_id) selected='selected' @endif>{{ $procedure->procedure_name }}</option>
                                          @endforeach
                                        
                                        </select>
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                        <div class="form-group">
                                        <label>status</label>
                                        <select class="form-control select2" style="width: 100%;" name="methode">
                                        @foreach ($methodes as $methode)
                                          <option  value="{{ $methode->id }}" @if($methode->id == $trademarkstkt[0]->methode_id) selected='selected' @endif style="color:{{$methode->color}}">{{ $methode->_methode_name }}</option>
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
                                        <select class="form-control select2" style="width: 100%;" name="assigned" <?php if(auth()->user()->seniority != 'manger'){echo 'disabled';} ?>>
                                    
                                          @foreach ($users as $user)
                                          <option value="{{ $user->id }}" @if($user->id == $trademarkstkt[0]->assigned_to) selected='selected' @endif>{{ $user->name }}</option>
                                          @endforeach
                                        
                                        </select>

                                          </div>
                                            </div>
                                            <div class="col">
                                  
                                        <div class="mb-3">
                                        <label>the countries</label>
                                        <select class="form-control select2" style="width: 100%;" name="country">
                                   
                                        @foreach ($countries as $country)
                                          <option value="{{ $country->id }}" @if($country->id == $trademarkstkt[0]->country_id) selected='selected' @endif>{{ $country->country_name }}</option>
                                          @endforeach  
                                        </select>
                                        </div>
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="col">
                                           
                                      
                                          <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Class (s)</label>
                                          
                                            <input type="text" value="{{$trademarkstkt[0]->class}}" placeholder="Please Input n/a if there is no Filing no. yet" class="form-control" name="class" id="inputProductTitle">

                                          </div>
                                            </div>

                                            <div class="col">
                                               
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Registration no.</label>
                 
                                            <input type="text" value="{{$trademarkstkt[0]->register_no}}" placeholder="Please Input n/a if there is no Registration no. yet  " class="form-control" name="registrationno" id="inputProductTitle">

                                                                                    </div>
                                            </div>
                                          </div>

                                          <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">filing_no no.</label>
                 
                                           
                                            <input type="text" value="{{$trademarkstkt[0]->filing_no}}" placeholder="Please Input n/a if there is no Registration no. yet  " class="form-control" name="filing_no" id="inputProductTitle">

                                            <label for="inputProductTitle" class="form-label">filing date.</label>
                 
                                           
                                            <input type="date" value="{{$trademarkstkt[0]->filing_date}}" placeholder="Please Input n/a if there is no Registration no. yet  " class="form-control" name="filing_date" id="inputProductTitle">


                                                                                    </div>
                                            </div>
                                          </div>


                                          <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Logo </label>
                 
                                            <img src="/public/TradeMarksLogo/{{ $trademarkstkt[0]->img_paths }}" width="200px" height="200px" name="img_paths">

                                            <input type="file" name="attach" class="form-control">
                                          </div>
                                            </div>
                                          </div>

                                         
                                          </div>
                                        <br>
                                        <br>
                                       
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Secondary Info </label> <hr> <br><br>

                                            <label for="inputProductTitle" class="form-label">Add Attachments and comments</label>
                                          
                                            @if ($message = Session::get('success'))
                                              <div class="alert alert-success alert-block">
                                                  <button type="button" class="close" data-dismiss="alert">×</button>
                                                      <strong>{{ $message }}</strong>
                                              </div>
                                              @endif 

                                             <div class="row">
                                      
                                                    <div class="col-md-6">
                                                    <label for="inputProductTitle" class="form-label">Name of File or comment in English (max 50 char)</label>
                                                        <input type="text" name="comment" class="form-control">
                                                    </div>

                                                    <div class="col-md-6">
                                                    <label for="inputProductTitle" class="form-label">Attachment</label>
                                                        <input type="file" name="attach" class="form-control">
                                                    </div>
                                      
                                                </div>
                                            <br><br><br>
                                            <br><br><br>
                                            <label for="inputProductTitle" class="form-label">Tickets comments</label>

                                            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   
                    <th>type </th>
                    <th>comment</th>
                    <th>attachment(if available)</th>
                    <th>added by </th>
                    <th>added at </th>
                  
                    <!-- Add other user fields as needed -->
                  </tr>
                  </thead>
                  <tbody>
                 
                  @foreach ($trademark_ticket_histories as $comment)
                    <tr>
                       
                            <td>{{ $comment->type }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>
                            <a class="btn btn-info" href= "{{ asset('/files/') . '/' . $comment->file_path }}" target="_blank"> <i class="fas fa-folder"></i>Show <?php if (is_null($comment->file_path)) { echo '(no attachment)'; } ?></a>
                            <a class="btn btn-info" href= "{{ asset('/files/') . '/' . $comment->file_path }}" download> <i class="fas fa-folder"></i>download <?php if (is_null($comment->file_path)) { echo '(no attachment)'; } ?></a>
                            </td>
                            <td>{{ $comment->username }}</td>
                            <td>{{ $comment->created_at }}</td>
                        <!-- Add other user fields as needed -->
                    </tr>
                @endforeach
                  </tbody>
                </table>
              </div>
                                        </div>  
                                         <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Folder Link</label>
                                            <input type="text" value="{{$trademarkstkt[0]->folder_path}}" placeholder="Please Input the folder link from qnap storage" name="inputPfolderlink" class="form-control" id="inputPfolderlink">

                                                                                    </div> 

                                        <button class="btn btn-primary" type="submit" <?php //if(auth()->user()->id != $trademarkstkt[0]->assigned_to){echo 'disabled';} ?>>update TradeMark </button>
                                        
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
