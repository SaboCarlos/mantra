@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> Editar Categoria
                    <a href="{{url('admin/categoria')}}" class="btn btn-primary btn-sm text-white float-end">Voltar</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{url('admin/categoria/'.$categoria->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Nome</label>
                            <input type="text" name="nome" value="{{$categoria->nome}}" class="form-control">
                            @error('nome')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Imagem</label>
                            <input type="file" name="imagem" class="form-control">
                            <img src="{{asset('/uploads/categoria/'.$categoria->imagem)}}" width="60px" height="60px">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Descricao</label>
                            <textarea  name="discricao" class="form-control" rows="3">{{$categoria->discricao}}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Estado</label><br/>
                            <input type="checkbox" name="estado" {{$categoria->estado =='1' ? 'ckecked':''}} >
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary float-end">Atualizar</button>
                        </div>

                        
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>


@endsection