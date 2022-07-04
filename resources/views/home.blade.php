<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- <link rel="stylesheet" href="{{asset('css/app.css')}} "> -->
    <!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"> -->
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="mt-5">


                <h3>Select Dates To Get Astroid By Date</h3>

                <br><br>

                <form method="post" action="javascript:void(0)">
                    
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <div class="col-md-2"><label>From Date:</label></div>
                        <div class="col-md-10s"> <input type="date" class="form-group ml-3" name="fromDate" id="fromDate"><br></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2"><label>To Date:</label></div>
                        <div class="col-md-10s"> <input type="date" class="form-group ml-3" name="toDate" id="toDate"></div>
                    </div>
                           <input type="submit" value="Submit" name="filter" id="filter">
                </form>
            </div>
        </div>
        <div id="result_data"></div>

    </div>
    <!-- <script src="{{asset('js/app.js')}} "></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
    <script>var baseurl = "<?= url('/') ?>"</script>

    <script>
        $(document).ready(function() {
      
            $("#filter").click(function(){
                
                var fromDate = $('#fromDate').val();
              
                var toDate = $('#toDate').val();
                                
                if(fromDate != '' && toDate != ''){
                    
                    $.ajax({
                        url: baseurl+'/getdata',
                        method: 'POST',
                        data: {fromDate:fromDate,toDate:toDate,_token: $('meta[name="csrf-token"]').attr('content')},
                        success:function(data)
                        {                            
                            $('#result_data').html(data);
                        }
                    
                    });
                    
                }else{
                    alert("Please Select Date");
                    location.reload();
                }
            });
        });
    </script>
</body>

</html>