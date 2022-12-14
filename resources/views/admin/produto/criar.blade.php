@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Adicionar Produtos
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
                <form action="{{ url('admin/produto')}}" method="POST" enctype="multipart/form-data">
                    @csrf

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
                                            <option value="{{$categoria->id}}">{{$categoria->nome}}</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <input type="text" name="nome" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Pequena Descri????o</label>
                                    <textarea name="pequena_discricao" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="Detalhes-tab-pane" role="tabpanel" aria-labelledby="Detalhes-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>localizacao</label>
                                        <input type="text" name="localizacao" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>preco</label>
                                        <input type="text" name="preco" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Quartos</label>
                                        <input type="number" name="quartos" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Casa Banho</label>
                                        <input type="number" name="casaBanho" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Contacto</label>
                                        <input type="number" name="numero" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Estado</label><br>
                                        <input type="checkbox" name="estado" style="width: 40px; height:40px;">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Destaque</label><br>
                                        <input type="checkbox" name="destaque" style="width: 40px; height:40px;">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Descri????o</label>
                                    <textarea name="discricao" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3 " id="Imagens-tab-pane" role="tabpanel" aria-labelledby="Imagens-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Imagens</label>
                                <input type="file" name="imagem[]" multiple class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection