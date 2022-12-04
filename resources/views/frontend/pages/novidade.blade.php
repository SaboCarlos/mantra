@extends('layouts.app')

@section('title','Novidades')

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

<div class="south-search-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="advanced-search-form">
                    <!-- Search Title -->
                    <div class="search-title">
                        <p>Search for your home</p>
                    </div>
                    <!-- Search Form -->
                    <form  action="{{ url('search')}}" method="Get" id="advanceSearch">
                        <div class="row">
                            
                            <div class="col-12 col-md-4 col-lg-3">
                               
                                <div class="form-group">
                                        <select class="form-control" name="search" id="cities">
                                            <option>Localizações</option>
                                            @foreach ($novaImobiliario as $produtoItem)
                                                <option  wire:model="localOption">
                                                    {{$produtoItem->localizacao}}
                                                </option>
                                            @endforeach
                                            
                                        </select>
                                </div>
                                
                            </div>

                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <select class="form-control"  id="catagories">
                                        <option>Categorias</option>
                                        @foreach ($categoria as $categoriaItem)
                                            <option>{{$categoriaItem->nome}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-xl-3">
                                <div class="form-group">
                                    <select class="form-control"  id="listings">
                                        <option>Preços</option>
                                        @foreach ($novaImobiliario as $produtoItem)
                                            <option >{{$produtoItem->Preco}}</option>
                                        @endforeach
                                            
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-xl-2">
                                <div class="form-group">
                                    <select class="form-control"  id="bedrooms">
                                        <option>Casa De Banhos</option>
                                        @foreach ($novaImobiliario as $produtoItem)
                                            <option >{{$produtoItem->casaBanho}}</option>
                                        @endforeach
                                            
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-xl-2">
                                <div class="form-group">
                                    <select class="form-control"  id="bathrooms">
                                        <option>Quartos</option>
                                        @foreach ($novaImobiliario as $produtoItem)
                                            <option >{{$produtoItem->quartos}}</option>
                                        @endforeach
                                            
                                    </select>
                                </div>
                            </div>



                            <div class="col-12 d-flex justify-content-between align-items-end">

                                <!-- Submit -->
                                <div class="form-group mb-0">
                                    <button type="submit" class="south-btn">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="featured-properties-area section-padding-100-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading wow fadeInUp">
                    <h2>Novidades</h2>
                    <p>Suspendisse dictum enim sit amet libero malesuada feugiat.</p>
                </div>
            </div>
        </div>

        <div class="row">
           @forelse ( $novaImobiliario as $produtoItem)
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
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>Nao tem nada </h4>
                    </div>
                </div>
           @endforelse
            <div class="south-pagination d-flex justify-content-end">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                         {{ $novaImobiliario->appends(request()->input())->links() }}
                    </ul>
                </nav>
            </div>
                
        </div>
    </div>
</section>
@endsection