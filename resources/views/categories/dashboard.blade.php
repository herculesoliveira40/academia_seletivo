@extends('layouts.main')

@section('title', 'Relatorio Categoria Painel')

@section('content')
<div class="row">
<div class="col-xs-6 col-sm-8 col-lg-10"> 
<a href="/categories/create" class="btn btn-success"><i class="bi bi-plus-square-dotted"></i> Criar Categoria</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Menu</th>

            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td scropt="row">{{ $category->id }}</td>
                    <td>{{ $category->name_category }}</td>

                    <td>
                        <a href="/categories/edit/{{ $category->id }}" class="btn btn-warning edit-btn"><i class="bi bi-wrench-adjustable"></i> Editar</a> 
                    </td>  

                    <td> 
                        <form action="/categories/{{ $category->id }}" method="POST">
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