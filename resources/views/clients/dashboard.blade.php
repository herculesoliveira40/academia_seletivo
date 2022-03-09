@extends('layouts.main')

@section('title', 'Relatorio Clientes Painel')

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
        title: 'Quantidade Clientes Categoria:',
        legend: 'true',
        pieSliceText: 'value',    
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
                    {{-- FIM pieChattttttttttttttttttttttttttttttttttttttttttttttttttttt --}}


<div class="row">
<div class="col-xs-6 col-sm-8 col-lg-10"> 
{{-- <a href="/clients/create" class="btn btn-success"><i class="bi bi-plus-square-dotted"></i> Cadastrar Cliente</a> --}}

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Categoria</th>
                <th scope="col">Menu</th>

            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td scropt="row">{{ $client->id }}</td>
                    <td>{{ $client->name_client }}</td>
                    <td>{{ $client->name_category }}</td>

                    <td>
                        <a href="/clients/edit/{{ $client->id }}" class="btn btn-warning edit-btn"><i class="bi bi-wrench-adjustable"></i> Editar</a> 

                      <!-- Button trigger modal -->
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $client->id }}">
                          <i class="bi bi-trash3-fill"></i>
                        </a>
                      <!-- Modal -->
                      <form id="delete" action="/clients/{{ $client->id }}" method="POST">
                          @csrf
                          @method('DELETE')
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> Escolha a opção desejada: </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <div class="alert alert-danger" role="alert"> 
                                      <h4> Tem certeza?, confirmar delete :( </h4>
                                  </div>
                              </div>
                              <input type="hidden" name="index_id" id="index_id" value="">
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger delete-btn" ><i class="bi bi-trash3-fill"></i> Delete </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>

</div>
</div>


 

@endsection