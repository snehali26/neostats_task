{{-- @extends('master') --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="{{asset('css/app.css')}} "> -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <style type="text/css">
        canvas { background-color : #eee;
            }
    </style>


    <title>Document</title>
</head>

<body>
    <br><br>
    Fastest Asteroid Speed in km/h : <br>
    {{$fastestAseroidId . "=" . $fastestAseroid}} <br>
    Closest Asteroid Id & Distance(in KM) <br>
    {{$closestAseroidId . "=" . $closestAseroid}} <br>
    <br><br>

    
    
    <!-- <canvas id="rice" width="600" height="400"></canvas> -->

    <div style="width: 700px;height: 700px;" class="ml-5">
        <canvas id="myChart" width="400" height="400" style="border: solid;color: red;"></canvas>
    </div>

    <!-- <script src="{{asset('js/app.js')}} "></script> -->
    <!-- <script src="//code.jquery.com/jquery-3.2.1.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="{{ asset('public/assets/Chart.bundle.min.js') }}" ></script>


    <script>
        var noOfAstroids = <?php  echo json_encode($neo_count_by_date_arry_values); ?>;
        var astroidsAppeardate = <?php  echo json_encode($neo_count_by_date_arry_keys); ?>;
       // var riceData = {
       //    labels: astroidsAppeardate,
       //    datasets: [{
       //      fillColor: "rgba(172,194,132,0.4)",
       //      strokeColor: "#ACC26D",
       //      pointColor: "#fff",
       //      pointStrokeColor: "#9DB86D",
       //      data: noOfAstroids
       //    }]
       //  };

       //  var rice = document.getElementById('rice').getContext('2d');
       //  new Chart(rice).Line(riceData);
        
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels:astroidsAppeardate,
                //labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [
                    {
                        label: '# of Asteroids',
                        // lineTension:1,
                        data: noOfAstroids,
                        //data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>