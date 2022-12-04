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
                    <a href="{{url('admin/users/criar')}}" class="btn btn-primary btn-sm text-white float-end">Adicionar Produto</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Função</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user )
                        <tr>
                            <td>{{ $user->id}}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>
                                @if ($user->role_as =='0')
                                    <label class="badge btn-primary">usuario</label>
                                @elseif ($user->role_as =='1')
                                    <label class="badge btn-success">Admin</label>
                                @else
                                    <label class="badge btn-danger">Nada</label>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/users/'.$user->id.'/edit')}}" class="btn btn-sm btn-success">Editar</a>
                                <a href="{{url('admin/users/'.$user->id.'/delete')}}" onclick="return confirm('Voçê tem a certeza que quer deletar esse usuario?')" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5"> Não à usuarios Disponiveis</td>
                        </tr>
                        @endforelse
                        
                    </tbody>
                </table>
                <div>
                    {{ $users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection