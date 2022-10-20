@extends('main_layouts.master')

@section('title', ' Profile | AIPTFORUM')

@section('content')

    @php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
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
                            <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">User Details</h5>
                    <hr/>
                    <form action="{{ route('admin.users.update', $user) }}" method='post' enctype='multipart/form-data'>
                    @csrf
                        @method('PATCH')

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <div class="mb-3">
                                            <label for="input_name" class="form-label">Name</label>
                                            <input name='name' type='text' class="form-control" id="input_name" value='{{ old("name", $user->name) }}'>
                                        
                                            @error('name')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="input_email" class="form-label">Username</label>
                                            <input name='username' type='username' class="form-control" id="input_username" value='{{ old("username", $user->username) }}'>
                                        
                                            @error('username')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="input_email" class="form-label">Email</label>
                                            <input name='email' type='email' class="form-control" id="input_email" value='{{ old("email", $user->email) }}'>
                                        
                                            @error('email')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="input_password" class="form-label">Password</label>
                                            <input name='password' type='password' class="form-control" id="input_password">
                                        
                                            @error('password')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class='row'>
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
                                                    <img style="weight:10px;height:200px; " src="{{ $user->image ? asset('storage/' . $user->image->path) : asset('storage/placeholders/user_placeholder.jpg') }}" alt="">
                                                </div>
                                            </div>
                                        </div>

                                         
                                        <div class="mb-3">
                                            <label for="input_role_id" class="form-label">Role</label>
                                            <input name='role_id' type='text' class="form-control" id="input_role_id" value='{{ old("role_id", $user->role_id) }}'>
                                        
                                            @error('role_id')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <button class='btn btn-primary' type='submit'>Update User</button>

                                        <!-- <a 
                                        onclick='event.preventDefault(); document.getElementById("delete_user_{{ $user->id }}").submit()'
                                        href="#"
                                        class='btn btn-danger'>
                                            Delete User
                                        </a> -->
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
