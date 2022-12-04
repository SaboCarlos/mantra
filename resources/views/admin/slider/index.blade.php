@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message')}}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4> Lista de Sliders
                    <a href="{{url('admin/sliders/criar')}}" class="btn btn-primary btn-sm text-white float-end">Adicionar Slider</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Descrição</th>
                            <th>Imagem</th>
                            <th>Estado</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider )
                           <tr>
                            <td>{{$slider->id}}</td>
                            <td>{{$slider->titulo}}</td>
                            <td>{{$slider->discricao}}</td>
                            <td>
                                <img src="{{asset("$slider->imagem")}}" style="width:70px;height:70px;" alt="imagem">
                            </td>
                            <td>{{$slider->estado == '0' ? 'Visivel':'Ocultado'}}</td>
                            <td>
                                <a href="{{ url('admin/sliders/'.$slider->id.'/edit')}}" class="btn btn-sm btn-success">Editar</a>
                                <a href="{{ url('admin/sliders/'.$slider->id.'/delete')}}" 
                                    class="btn btn-sm btn-danger" onclick="return confirm('Voçê tem a certeza que quer deletar esse Slider?')">
                                    Eliminar</a>
                            </td>
                            </tr> 
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection