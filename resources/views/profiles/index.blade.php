@extends('main_layouts.master')

@section('title', ' Profile | AIPTFORUM')

@section('content')

    @php
    $id = Auth::user()->id;
    $adminData = App\Models\User::find($id);
    @endphp

    <div class="page-wrapper">
        <div class="page-content">
		 <!--breadcrumb-->
         <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">User</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $adminData->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">User Details</h5>
                    <hr/>

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <div class="mb-3">
                                            <label for="input_name" class="form-label">Name</label>
                                            <input name='name' type='text' class="form-control" id="input_name" value='{{ $adminData->name }}'>
                                        
                                            @error('name')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="input_email" class="form-label">Email</label>
                                            <input name='email' type='email' class="form-control" id="input_email" value='{{ $adminData->email }}'>
                                        
                                            @error('email')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        
                                        <!-- <div class="mb-3">
                                            <label for="input_password" class="form-label">Password</label>
                                            <input name='password' type='password' class="form-control" value="{{ $adminData->name }}" id="input_password">
                                        
                                            @error('password')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div> -->

                                        <!-- <div class='row'>
                                            <div class='col-md-8'>
                                                <div class="mb-3">
                                                    <label for="input_image" class="form-label">Image</label>
                                                    <input name='image' type='file' class="form-control" id="input_image">
                                                
                                                    @error('image')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class='col-md-4'>
                                                <div class='user-image'>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="mb-3">
                                            <label for="input_name" class="form-label">Role</label>
                                            <label name='role_id' type='text' class="form-control" id="input_name" value='{{ $adminData->role->name }}'>{{ $adminData->role->name }}</label>
                                        
                                            @error('role_id')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                       
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
