@extends('layouts.app')

@section('title','Publicar')


@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <h4 class="alert alert-success mb-2">{{ session('message')}}</h4>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Atualizar Produtos
                    <a href="{{url('admin/produto')}}" class="btn btn-danger btn-sm text-white float-end">Voltar</a>
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
                <form action="{{ url('admin/produto/'.$produto->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" aria-controls="home-tab-pane" aria-selected="true">
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Detalhes-tab" data-bs-toggle="tab" data-bs-target="#Detalhes-tab-pane" type="button" aria-controls="Detalhes-tab-pane" aria-selected="true">
                                Detalhes
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Imagens-tab" data-bs-toggle="tab" data-bs-target="#Imagens-tab-pane" type="button" aria-controls="Imagens-tab-pane" aria-selected="true">
                                Imagens
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Categoria</label>
                                        <select name="categoria_id" class="form-control">
                                            @foreach ($categoria as $categoria)
                                            <option value="{{$categoria->id}}" {{$categoria->id == $produto->categoria_id ? 'selected':''}}>
                                                {{$categoria->nome}}
                                            </option> 
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <input type="text" name="nome" value="{{$produto->nome}}" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Pequena Descrição</label>
                                    <textarea name="pequena_discricao" class="form-control"  rows="4">{{$produto->pequena_discricao}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="Detalhes-tab-pane" role="tabpanel" aria-labelledby="Detalhes-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>localizacao</label>
                                        <input type="text" name="localizacao" value="{{$produto->localizacao}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>preco</label>
                                        <input type="text" name="preco" value="{{$produto->Preco}}"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Estado</label><br>
                                        <input type="checkbox" name="estado" {{$produto->estado == '1' ? 'checked':''}} style="width: 40px; height:40px;">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Destaque</label><br>
                                        <input type="checkbox" name="destaque" style="width: 40px; height:40px;">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Descrição</label>
                                    <textarea name="discricao" class="form-control" rows="4">{{$produto->discricao}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3 " id="Imagens-tab-pane" role="tabpanel" aria-labelledby="Imagens-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Imagens</label>
                                <input type="file" name="imagem[]" multiple class="form-control" />
                            </div>
                            <div>
                                @if ($produto->produtoImages)
                                <div class="row">
                                    @foreach ($produto->produtoImages as $imagem )
                                    <div class="col-md-2">
                                        
                                        <img src="{{asset($imagem->imagem)}}" style="width: 80px; height:80px;" class="me-4" alt="Img" /> 
                                        <a href="{{ url('admin/produto-imagem/'.$imagem->id.'/delete')}}" class="d-block">Remover</a>
                                    </div>
                                    @endforeach
                                </div>
                                    @else
                                    <h5>Não à imagens</h5>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection