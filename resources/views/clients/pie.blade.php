@extends('layouts.main')

@section('title', 'Show users')

@section('content')
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Categoria Nome', 'Quantidade Clientes Categoria'],
          <?= $charData; ?>
        ]);

      var options = {
        title: 'Clientes Categoria:',
        legend: 'true',
        pieSliceText: 'label',    
        is3D: false,
        pieStartAngle: 100,
      };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
@endsection