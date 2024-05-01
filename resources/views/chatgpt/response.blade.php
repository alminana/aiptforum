<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My ChatGPT App</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body>

    <nav class="navbar navbar-light bg-light justify-content-between">
    <a href="{{ route('chatgpt.index') }}" class="nav-link" class="btn btn-danger">Back</a>
    </nav>
    
     <div class="container mt-5">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ChatGPT answer</div>

                    <div class="card-body">
                        <p>{{ $response }}</p>
                    </div>
                </div>
            </div>
        </div>  
    </div>
        </div>
    </body>
</html>