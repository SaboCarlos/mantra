@extends('layouts.app')

@section('title','Home Page')

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
                    <h2>Featured Properties</h2>
                    <p>Suspendisse dictum enim sit amet libero malesuada feugiat.</p>
                </div>
            </div>
        </div>

        <div class="row">
            @if ($destaqueProduto)
                
                @foreach ($destaqueProduto as $produtoItem)      
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
                               <div class="property-meta-data d-flex align-items-end justify-content-between">
                                    <div class="new-tag">
                                        <img src="../assets/icons/new.png" alt="">
                                    </div>
                                    <div class="bathroom">
                                        <i class="fa fa-house-user" aria-hidden="true"></i>
                                            <span>{{$produtoItem->quartos}}</span>
                                    </div>
                                    <div class="garage">
                                        <i class="fa fa-restroom" aria-hidden="true"></i>
                                            <span>{{$produtoItem->casaBanho}}</span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>Nao tem nada </h4>
                    </div>
                </div>
                
            @endif

        </div>
    </div>
</section>

<section class="south-editor-area d-flex align-items-center">
    <!-- Editor Content -->
    <div class="editor-content-area">
        <!-- Section Heading -->
        <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
            <img src="../assets/icons/prize.png" alt="">
            <h2>jeremy Scott</h2>
            <p>Realtor</p>
        </div>
        <p class="wow fadeInUp" data-wow-delay="500ms">Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odiomattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna. Curabitur rhoncus auctor eleifend. Fusce venenatis diam urna, eu pharetra arcu varius ac. Etiam cursus turpis lectus, id iaculis risus tempor id. Phasellus fringilla nisl sed sem scelerisque, eget aliquam magna vehicula.</p>
        <div class="address wow fadeInUp" data-wow-delay="750ms">
            <h6><img src="../assets/icons/phone-call.png" alt=""> +45 677 8993000 223</h6>
            <h6><img src="../assets/icons/envelope.png" alt=""> office@template.com</h6>
        </div>
        <div class="signature mt-50 wow fadeInUp" data-wow-delay="1000ms">
            <img src="../assets/icons/signature.png" alt="">
        </div>
    </div>

    <!-- Editor Thumbnail -->
    <div class="editor-thumbnail">
        <img src="../assets/icons/editor.jpg" alt="">
    </div>
</section>


@endsection