<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel </title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container mt-2">

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('notifications') }}"> notifications </a>
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
            <th>No</th>
            <th>Name</th>
          
        </tr>
       </thead>
       <div id="test">
        <tbody id="bodyData">

        </tbody> 
       </div>
        
    </table>
      
<script>


$(document).ready(function () {
    var lastId = 0; //Set id to 0 so you will get all records on page load.
    var request = function () {
    $.ajax({
        type: 'POST',
        url: "{{ route('notifications') }}",
      //  data: { id: lastId }, //Add request data
      data:{ 
                _token:'{{ csrf_token() }}'
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
             //   console.log(dataResult);
                 const element = document.getElementById("test");
                element.remove();
                var resultData = dataResult.data;
                var bodyData = '';
                var i=1;
                $.each(resultData,function(index,row){
                   
                    bodyData+="<tr>"
                    bodyData+="<td>"+ i++ +"</td><td>"+row.message+"</td>"
                    +"<td>"+row.city+"</td>";
                    bodyData+="</tr>";
                    
                })
                $("#bodyData").append(bodyData);
            }, error: function () {
            console.log(data);
        }
    });
    };
   setInterval(request, 4000);
});


   
        

</script>
   
</div>

</body>

</html>