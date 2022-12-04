@extends('layouts.app')

@section('title','Todas Categorias')

@section('content')

<section class="featured-properties-area section-padding-100-50" >
    <div class="container">
        <div class="row" style="margin-top:4rem;">
            @forelse ($categoria as $categoriaItem)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                    <!-- Property Thumbnail -->
                    <a href="{{url('/colecao/'.$categoriaItem->nome)}}" style="text-decoration: none;">
                        <div class="property-thumb">
                            <img src="{{ asset("$categoriaItem->imagem")}}" alt="">
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5 style="font-weight: bold;">{{$categoriaItem->nome}}</h5>
                            <p>{{$categoriaItem->discricao}}</p>
                        </div>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <h5>Nao ha categoria </h5>
            </div>
                
            @endforelse
        </div>
    </div>
</section>



@endsection