@extends('main_layouts.master')

@section('title')
@section("style")
<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection
	
@section('content')  
		<!--start page wrapper -->
		<div class="page-wrapper">
		<div class="page-content">
	<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div style="font-weight: 200"  class="breadcrumb-title pe-3"><a  href="">Patent</a></div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('patent.create')}}"><button type="button" class="btn btn-primary">Add New</button></a>
                 
                    </li>
                </ol>
                
            </nav>
        </div>
    </div>

    <div class="container-fuild">
        <div class="card" style="width: auto; height:25%;">
            <div class="container-fuild">
                <div class="container-fuild alert alert-success" role="alert">
                    Application
                  </div>
                  <div class="container">
                    <div class="row" style="margin-top:15px">
                        <div class="col-2">
                        <label style="color: blueviolet; font-weight:bold">Aipt Reference</label>
                        <h6 style="color:black; font-weight:bold">{{$post->aiptref}}</h6>
                        </div>
                        <div class="col-2">
                            <label style="color: blueviolet; font-weight:bold">Client Reference</label>
                            <h6 style="color:black; font-weight:bold">{{$post->clientref}}</h6>
                        </div>
                        <div class="col-2">
                            <label style="color: blueviolet; font-weight:bold">Filing Number</label>
                            <h6 style="color:black; font-weight:bold">{{$post->filingno}}</h6>
                        </div>
                        <div class="col-2">
                            <label style="color: blueviolet; font-weight:bold">Country</label>
                            <h6 style="color:black; font-weight:bold">{{$post->country}}</h6>
                        </div>
						<div class="col-2">
                            <label style="color: blueviolet; font-weight:bold">Class</label>
                            <h6 style="color:black; font-weight:bold">{{$post->country}}</h6>
                        </div>
                    </div>
                  
                  </div>
              
              </div>
          </div>

    </div>
   
@endsection
