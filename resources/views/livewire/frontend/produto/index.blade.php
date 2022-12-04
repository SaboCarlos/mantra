
<div class="row">
    @forelse ($produto as $produtoItem)      
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
                <h4>Nao tem nada na {{$categoria->nome}}</h4>
            </div>
        </div>
    @endforelse
</div>

