@extends('layouts.main')

@section('title', 'Cadastrar Cliente')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/clients/dashboard"> <i class="bi bi-speedometer"></i> Clientes </a></li>
    <li class="breadcrumb-item active" aria-current="page"> Cadastrar Cliente</li>
  </ol>
</nav>
<h1>Cadastrar Cliente</h1>
  <form action="/clients" method="POST" enctype="multipart/form-data">
    @csrf               {{--DIRETIVA SALVAR DADOS NO BANCO--}}

    <div class="form-group">
      <label for="name">Nome Cliente:</label>
      <input type="text" class="form-control" id="title" name="name" placeholder="Nome do Cliente" required>
    </div>
    <div class="form-group">
      <label for="phone">Telefone Cliente:</label>
      <input type="tel" class="form-control" id="phone" name="phone" placeholder="Telefone" required>
    </div>
    <div class="form-group">
      <label for="cpf">CPF Cliente:</label>
      <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" required>
    </div>
    <div class="form-group">
      <label for="observation">Descrição:</label>
      <textarea name="observation" id="observation" class="form-control" placeholder="Observação Cliente"></textarea>
    </div>
    <div class="form-group">
      <label for="profile">Disponivel?</label>
      <select name="profile" id="profile" class="form-control">
        <option value="0">Operador</option>
        <option value="1">Inativo</option>
      </select>
    </div>
    <div class="form-group">
      <label for="categoria_id" class="form-label"> Categoria do Cliente: </label>
      <select  name="category_id" id="category_id"  class="form-control">  
          @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
      </select>  
    </div>
    <input type="submit" class="btn btn-success" value="Cadastrar Cliente">
  </form>
@endsection