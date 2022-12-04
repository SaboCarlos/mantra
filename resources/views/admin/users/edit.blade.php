@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Editar Usuarios
                    <a href="{{url('admin/users')}}" class="btn btn-danger btn-sm text-white float-end">Voltar</a>
                </h4>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ( $errors->all() as $error )
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('admin/users/'.$user->id)}}" method="POST">
                    @csrf

                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Nome</label>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email</label>
                            <input type="text" name="email" readonly value="{{$user->email}}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Selecionar Função</label>
                            <select name="role_as" class="form-control">
                                <option value="">Selecionar Função</option>
                                <option value="0" value="{{$user->role_as =='0'? 'selected':''}}">User</option>
                                <option value="1" value="{{$user->role_as =='1'? 'selected':''}}">Admin</option>
                            </select>
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection