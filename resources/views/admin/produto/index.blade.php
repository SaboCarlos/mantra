@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message')}}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4> Produtos
                    <a href="{{url('admin/produto/criar')}}" class="btn btn-primary btn-sm text-white float-end">Adicionar Produto</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Categoria</th>
                            <th>Nome</th>
                            <th>Localização</th>
                            <th>Preço</th>
                            <th>Estado</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produto as $produto )
                        <tr>
                            <td>{{$produto->id}}</td>
                            <td>
                                @if ($produto->categoria)
                                    {{$produto->categoria->nome}}
                                @else
                                    Não à Categorias
                                @endif
                               
                            </td>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->localizacao}}</td>
                            <td>{{$produto->Preco}}</td>
                            <td>{{$produto->estado == '1' ? 'Desativado': 'Ativado'}}</td>
                            <td>
                                <a href="{{ url('admin/produto/'.$produto->id.'/edit')}}" class="btn btn-sm btn-success">Editar</a>
                                <a href="{{url('admin/produto/'.$produto->id.'/delete')}}" onclick="return confirm('Voçê tem a certeza que quer deletar esse produto?')" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7"> Não à Produtos Disponiveis</td>
                        </tr>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection