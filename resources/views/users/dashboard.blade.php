@extends('layouts.main')

@section('title', 'Relatorio Usuario Painel')

@section('content')
<div class="row">
<div class="col-xs-6 col-sm-8 col-lg-10"> 
<a href="/users/create" class="btn btn-success"><i class="bi bi-plus-square-dotted"></i> Cadastrar Usuario</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Login</th>
                <th scope="col">Perfil</th>
                <th scope="col">Menu</th>

            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td scropt="row">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->profile == 0 ? "Administrador" : "Visualizador"}}</td>
                    <td>
                        <a href="/users/edit/{{ $user->id }}" class="btn btn-warning edit-btn"><i class="bi bi-wrench-adjustable"></i> Editar</a> 
                    </td>  

                    <td> 
                        <form action="/users/{{ $user->id }}" method="POST">
                            @csrf
                            @method('DELETE')    
                            <button type="submit" class="btn btn-danger delete-btn" ><i class="bi bi-trash3-fill"></i> </button>
                        </form>
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>

</div>
</div>


@endsection