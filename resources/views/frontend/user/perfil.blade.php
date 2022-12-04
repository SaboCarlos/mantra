@extends('layouts.app')

@section('title','perfil')

@section('content')

<section class="featured-properties-area section-padding-100-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4>Perfil Do Usuario</h4>
            </div>

            <div class="col-md-10">

                @if (session('message'))
                    <p class="alert alert-success">{{session('message')}}</p>
                @endif
                @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error )
                        <li class="text-danger">{{$error}}</li>
                    @endforeach
                </ul>
                    
                @endif

                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">Detalhes Do Usuario</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('perfil') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label >Nome Do Usuario</label>
                                        <input type="text" name="username" value="{{ Auth::user()->name}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label >Email</label>
                                        <input type="text" readonly value="{{ Auth::user()->email}}" value="" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label >Numero</label>
                                        <input type="text" name="phone" value="{{ Auth::user()->userDetail->phone ?? ''}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label >Zip</label>
                                        <input type="text" name="pin_code" value="{{ Auth::user()->userDetail->pin_code ?? ''}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label >Endereco</label>
                                        <input type="text" name="adress" value="{{ Auth::user()->userDetail->adress ?? ''}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection