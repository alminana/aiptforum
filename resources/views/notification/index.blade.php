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

    <div class="container mt-2">

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Notifications </h2>
            </div>
          
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered table-sm">
       <thead>
        <tr>
            <th>#Message</th>
            <th>Mark as Read</th>
           
          
        </tr>
       </thead>
    
        <tbody id="bodyData">
      
        
          <?php //dd($unreadNotification->id); ?>
          @if(Auth::User()->department_id == 8)

          @foreach(Auth::User()->unreadNotifications as $unreadNotification)
          <tr>
          <td>kindly verify this user <a href="/users/edit/{{$unreadNotification->data['userId']}}">click here</a></td>
          <td><a href="{{route('notifications.mark_read',$unreadNotification->id)}}" class="btn btn-info" role="button">Mark As Read</a></td>
          </tr>
          @endforeach 

          @elseif(Auth::User()->department_id == 2)

        
          @foreach(Auth::User()->unreadNotifications as $unreadNotification)
         
          <tr>
          <td>
          <?php 
          $check_trademark = DB::table('trade_mark_tickets')
          ->where('trade_mark_tickets.id', $unreadNotification->data['trademarks'])
          ->leftJoin('countries', 'countries.id', '=', 'trade_mark_tickets.country_id')
          ->get();
          ?>
            kindly check this trademark  [{{ $check_trademark[0]->trademark_name; }} in ({{$check_trademark[0]->country_name}})]  <a href="/trademarkstkts/show/{{$unreadNotification->data['trademarks']}}">click here</a> 
            because it has a todayremindin day about {{$unreadNotification->data['discription']}}
          </td>
          <td><a href="{{route('notifications.mark_read',$unreadNotification->id)}}" class="btn btn-info" role="button">Mark As Read</a></td>
          </tr>
          @endforeach 
          @endif
       
       
        </tbody> 
     
        
    </table>

   
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



</body>
</html>
