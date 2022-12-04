@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> Adicionar Slider
                    <a href="{{url('admin/sliders')}}" class="btn btn-danger btn-sm text-white float-end">Voltar</a>
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
                <form action="{{url('admin/sliders/criar')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Titulo</label>
                            <input type="text" name="titulo" class="form-control">
                            @error('titulo')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Imagem</label>
                            <input type="file" name="imagem" class="form-control">
                            @error('imagem')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Descricao</label>
                            <textarea  name="discricao" class="form-control" rows="3"></textarea>
                            @error('discricao')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Estado</label><br/>
                            <input type="checkbox" name="estado" >
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary float-end">Salvar</button>
                        </div>

                        
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>


@endsection