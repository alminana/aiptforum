
@extends("admin_dashboard.layouts.app")

    
@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Method</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.method.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Methods</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
      
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Method </h5>
                <hr/>

                <form action="{{route('admin.method.update', $method)}}" method='post'>
                    @csrf
                    @method('PATCH')

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">Method Name</label>
                                        <input type="text" value='{{ old("method", $method->method) }}' name='method' required class="form-control" id="inputProductTitle">

                                        @error('method')
                                            <p class='text-danger'>{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button class='btn btn-primary' type='submit'>Update Method</button>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>

            </div>
        </div>


    </div>
</div>
<!--end page wrapper -->
@endsection

@section("script")
<script>
$(document).ready(function () {
    
    setTimeout(() => {
        $(".general-message").fadeOut();
    }, 5000);

});

</script>
@endsection