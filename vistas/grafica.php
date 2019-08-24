<?php 
  
  require_once "conexion.php";

 ?>
<head>
  
  <title>Bar </title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
  <script type="text/javascript" src="http://www.chartjs.org/assets/Chart.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

  <script src="utils.js"></script>
  <style>
  canvas {
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
  }
  </style>
</head>


<body>
  <div id="container" style="width: 75%;">
    <canvas id="canvas"></canvas>
  </div>
  <button id="randomizeData">Randomize Data</button>
  <button id="addDataset">Add Dataset</button>
  <button id="removeDataset">Remove Dataset</button>
  <button id="addData">Add Data</button>
  <button id="removeData">Remove Data</button>
  <script>
    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var color = Chart.helpers.color;
    var barChartData = {
      labels: [<?
          $sql = " SELECT * FROM ventas ";
          $result = mysqli_query($connection, $sql);
          while ($registros = mysqli_fetch($result))
          {
            ?>
            '<?php echo $registros ?>'
            <?

          }
        ?>]
        ,
      datasets: [{
        label: 'Dataset 1',
        backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
        borderColor: window.chartColors.red,
        borderWidth: 1,
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ]
      }]

    };

    window.onload = function() {
      var ctx = document.getElementById('canvas').getContext('2d');
      window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'Chart.js Bar Chart'
          }
        }
      });

    };

    document.getElementById('randomizeData').addEventListener('click', function() {
      var zero = Math.random() < 0.2 ? true : false;
      barChartData.datasets.forEach(function(dataset) {
        dataset.data = dataset.data.map(function() {
          return zero ? 0.0 : randomScalingFactor();
        });

      });
      window.myBar.update();
    });

    var colorNames = Object.keys(window.chartColors);
    document.getElementById('addDataset').addEventListener('click', function() {
      var colorName = colorNames[barChartData.datasets.length % colorNames.length];
      var dsColor = window.chartColors[colorName];
      var newDataset = {
        label: 'Dataset ' + (barChartData.datasets.length + 1),
        backgroundColor: color(dsColor).alpha(0.5).rgbString(),
        borderColor: dsColor,
        borderWidth: 1,
        data: []
      };

      for (var index = 0; index < barChartData.labels.length; ++index) {
        newDataset.data.push(randomScalingFactor());
      }


  
 
      window.myBar.update();
    });
  </script>

