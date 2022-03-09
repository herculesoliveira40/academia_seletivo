@extends('layouts.main')

@section('title', 'Editar Cliente')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/users/dashboard"> <i class="bi bi-speedometer"></i> Clientes </a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-pencil-square"></i> Editar Cliente: {{$client->id}}</li>
  </ol>
</nav>
<h1>Editar Cliente</h1>
  <form action="/clients/update/{{ $client->id }}" method="POST" enctype="multipart/form-data">
    
    @csrf               {{--DIRETIVA SALVAR DADOS NO BANCO--}}
    @method('PUT')
    <div class="form-group">
      <label for="name_client">Nome Cliente:</label>
      <input type="text" class="form-control" id="name_client" name="name_client" value="{{ $client->name_client }}">
    </div>
    <div class="form-group">
      <label for="phone">Telefone Cliente:</label>
      <input type="tel" class="form-control" id="phone" name="phone" value="{{ $client->phone }}">
    </div>
    <div class="form-group">
      <label for="cpf">CPF Cliente:</label>
      <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $client->cpf }}">
    </div>
    <div class="form-group">
      <label for="observation">Descrição:</label>
      <textarea name="observation" id="observation" class="form-control" placeholder="Observação Cliente"> {{ $client->observation }} </textarea>
    </div>
    <div class="form-group">
      <label for="profile">Disponivel?</label>
      <select name="profile" id="profile" class="form-control">
        <option value="0">Operador</option>
        <option value="1" {{ $client->profile == 1 ? "selected='selected'" : ""}}>Inativo</option>
      </select>
    </div>
    <div class="form-group">
      <label for="categoria_id" class="form-label"> Categoria do Cliente: </label>
      <select  name="category_id" id="category_id"  class="form-control">  
          @foreach ($categories as $category)
          <option value="{{$category->id}}" {{ $client->category_id == ($loop->index +1) ? "selected='selected'" : ""}}>{{$category->name_category}}</option>
          @endforeach
      </select>  
    </div>
    <input type="submit" class="btn btn-success" value="Editar Cliente">
  </form>
@endsection
