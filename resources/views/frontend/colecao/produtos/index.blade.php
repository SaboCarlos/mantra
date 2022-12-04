@extends('layouts.app')

@section('title')
{{$categoria->nome}}
@endsection

@section('content')

<section class="listings-content-wrapper section-padding-100">
    <div class="container">
        <div class="row" style="margin-top:4rem;">

           <livewire:frontend.produto.index :produto="$produto" :categoria="$categoria" />
        </div>
    </div>
</section>

@endsection