$(document).ready(function () {
    var lastId = 0; //Set id to 0 so you will get all records on page load.
    var request = function () {
    $.ajax({
        type: 'GET',
        url: "/notifications",
      //  data: { id: lastId }, //Add request data
      data:{ 
                _token:'{{ csrf_token() }}'
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
             //   console.log(dataResult);
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
