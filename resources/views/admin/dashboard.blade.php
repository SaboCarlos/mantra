@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
      @if (session('message'))
        <h2>{{session('message')}}</h2>
      @endif

      <div class="me-md-3 me-xl-5">
        <h2>Dashboard</h2>
        <p class="mb-md-0">Analises</p>
        <hr>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="card card-body bg-primary text-white mb-3">
            <label>Total Imobialio</label>
            <h4>{{$totalProduto}}</h4>
            <a href="{{ url('admin/produto')}}" class="text-white">ver</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-body bg-success text-white mb-3">
            <label>Total Categoria</label>
            <h4>{{$totalCategoria}}</h4>
            <a href="{{ url('admin/categoria')}}" class="text-white">ver</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-body bg-warning text-white mb-3">
            <label>Total Usuarios</label>
            <h4>{{$totalAllUsers}}</h4>
            <a href="{{ url('admin/users')}}" class="text-white">ver</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-body bg-danger text-white mb-3">
            <label>Total Admin</label>
            <h4>{{$totalAdmin}}</h4>
            <a href="{{ url('admin/users')}}" class="text-white">ver</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card card-body bg-primary text-white mb-3">
            <label>Total User</label>
            <h4>{{$totalUser}}</h4>
            <a href="{{ url('admin/users')}}" class="text-white">ver</a>
          </div>
        </div>
      </div>

    </div>
  </div>

@endsection