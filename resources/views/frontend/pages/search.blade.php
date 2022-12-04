@extends('layouts.app')

@section('title','Pesquisas')

@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-inner">

        @foreach ($sliders as $key => $sliderItem )
            
            <div class="carousel-item {{ $key ==0 ? 'active':'' }}">
                @if ($sliderItem->imagem)
                    <img src="{{ asset("$sliderItem->imagem")}}" class="d-block w-100" alt="">
                @endif
                <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>
                            <span>{!! $sliderItem->titulo !!}</span>
                             
                        </h1>
                        <p>
                            {!! $sliderItem->discricao !!}
                        </p>
                        
                    </div>
                </div>
            </div>

        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

</div>

<section class="featured-properties-area section-padding-100-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading wow fadeInUp">
                    <h2>Resutado de pesquisa</h2>
                </div>
            </div>
        </div>

        <div class="row">
           @forelse ( $searchProduto  as $produtoItem)
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            @if ($produtoItem->produtoImages->count() > 0)
                            <a  href="{{url('/colecao/'.$produtoItem->categoria->nome.'/'.$produtoItem->nome)}}">
                                <img src="{{ asset($produtoItem->produtoImages[0]->imagem)}}" alt="{{$produtoItem->nome}}">
                            </a>
                            @endif
                            

                            <div class="tag">
                                <span>{{$produtoItem->estado == '1' ? 'Vendido': 'A Venda'}}</span>
                            </div>
                            <div class="list-price">
                                <p>{{$produtoItem->Preco}} Mts</p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <a  href="{{url('/colecao/'.$produtoItem->categoria->nome.'/'.$produtoItem->nome)}}">{{$produtoItem->nome}}
                            </a>
                            <p class="location"><img src="../assets/icons/location.png" alt="">{{$produtoItem->localizacao}}</p>
                            <p>{{$produtoItem->pequena_discricao}}</p>
                            <!--<div class="property-meta-data d-flex align-items-end justify-content-between">
                                <div class="new-tag">
                                    <img src="img/icons/new.png" alt="">
                                </div>
                                <div class="bathroom">
                                    <img src="img/icons/bathtub.png" alt="">
                                    <span>2</span>
                                </div>
                                <div class="garage">
                                    <img src="img/icons/garage.png" alt="">
                                    <span>2</span>
                                </div>
                                <div class="space">
                                    <img src="img/icons/space.png" alt="">
                                    <span>120 sq ft</span>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
           @empty
                {{--<div class="col-md-12">
                    <div class="p-2">
                        <h4>Nao tem nada </h4>
                    </div>
                </div>--}}
           @endforelse

            @forelse ( $searchproduto as $produtoItem)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="single-featured-property mb-50">
                    <!-- Property Thumbnail -->
                    <div class="property-thumb">
                        @if ($produtoItem->produtoImages->count() > 0)
                        <a  href="{{url('/colecao/'.$produtoItem->categoria->nome.'/'.$produtoItem->nome)}}">
                            <img src="{{ asset($produtoItem->produtoImages[0]->imagem)}}" alt="{{$produtoItem->nome}}">
                        </a>
                        @endif
                        

                        <div class="tag">
                            <span>{{$produtoItem->estado == '1' ? 'Vendido': 'A Venda'}}</span>
                        </div>
                        <div class="list-price">
                            <p>{{$produtoItem->Preco}} Mts</p>
                        </div>
                    </div>
                    <!-- Property Content -->
                    <div class="property-content">
                        <a  href="{{url('/colecao/'.$produtoItem->categoria->nome.'/'.$produtoItem->nome)}}">{{$produtoItem->nome}}
                        </a>
                        <p class="location"><img src="../assets/icons/location.png" alt="">{{$produtoItem->localizacao}}</p>
                        <p>{{$produtoItem->pequena_discricao}}</p>
                        <!--<div class="property-meta-data d-flex align-items-end justify-content-between">
                            <div class="new-tag">
                                <img src="img/icons/new.png" alt="">
                            </div>
                            <div class="bathroom">
                                <img src="img/icons/bathtub.png" alt="">
                                <span>2</span>
                            </div>
                            <div class="garage">
                                <img src="img/icons/garage.png" alt="">
                                <span>2</span>
                            </div>
                            <div class="space">
                                <img src="img/icons/space.png" alt="">
                                <span>120 sq ft</span>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
            @empty
                {{--<div class="col-md-12">
                    <div class="p-2">
                        <h4>Nao tem nada </h4>
                    </div>
                </div>--}}
            @endforelse
                
            <div class="listings-btn-groups">
                {{ $searchProduto->appends(request()->input())->links() }}
            </div>
                
        </div>
    </div>
</section>
@endsection