@extends('layouts.admin')

@section('title','Admin Configurações')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success mb-3">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{url('/admin/configuracao')}}" method="POST">
                    @csrf

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" aria-controls="home-tab-pane" aria-selected="true">
                                Website
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Detalhes-tab" data-bs-toggle="tab" data-bs-target="#Detalhes-tab-pane" type="button" aria-controls="Detalhes-tab-pane" aria-selected="true">
                                Website - Informações
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Imagens-tab" data-bs-toggle="tab" data-bs-target="#Imagens-tab-pane" type="button" aria-controls="Imagens-tab-pane" aria-selected="true">
                                Website - Social Media
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>website name</label>
                                    <input type="text" name="website_name" value="{{ $configuracao->website_name ?? ''}}" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>website URL</label>
                                    <input type="text" name="website_url" value="{{ $configuracao->website_url ?? ''}}" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Page Title</label>
                                    <input type="text" name="page_title" value="{{ $configuracao->page_title ?? ''}}" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Meta Keywords</label>
                                    <textarea type="text" name="meta_keyword" class="form-control" rows="3">{{ $configuracao->meta_keyword ?? ''}}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Meta Description</label>
                                    <textarea type="text" name="meta_description" class="form-control" rows="3">{{ $configuracao->meta_description ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="Detalhes-tab-pane" role="tabpanel" aria-labelledby="Detalhes-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Endereço</label>
                                    <input type="text" name="address" value="{{ $configuracao->address ?? ''}}" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Contacto 1</label>
                                    <input type="text" name="phone1" value="{{ $configuracao->phone1 ?? ''}}" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Contacto 2</label>
                                    <input type="text" name="phone2" value="{{ $configuracao->phone2 ?? ''}}" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email 1</label>
                                    <input type="email" name="email1" value="{{ $configuracao->email1 ?? ''}}" class="form-control" >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email 2</label>
                                    <input type="email" name="email2" value="{{ $configuracao->email2 ?? ''}}" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3 " id="Imagens-tab-pane" role="tabpanel" aria-labelledby="Imagens-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>facebook (Opcional)</label>
                                    <input type="text" name="facebook" value="{{ $configuracao->facebook ?? ''}}" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Twitter (Opcional)</label>
                                    <input type="text" name="twitter" value="{{ $configuracao->twitter ?? ''}}" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Instagram (Opcional)</label>
                                    <input type="text" name="instagram" value="{{ $configuracao->instagram ?? ''}}" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Youtube (Opcional)</label>
                                    <input type="text" name="youtube" value="{{ $configuracao->youtube ?? ''}}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary text-white"> Guardar Configurações</button>
                    </div>



                </form> 
            </div>
        </div>
    </div>
</div>

@endsection