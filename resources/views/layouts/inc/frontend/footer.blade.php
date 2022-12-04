<footer class="footer-area section-padding-100-0 bg-img gradient-background-overlay" style="background-image: url(../assets/img/cta.jpg);">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget-area ">
                        <!-- Widget Title -->
                        <div class="widget-title">
                            <h6>About Us</h6>
                        </div>

                        <img src="../assets/icons/logo.png" width="120px" alt="">
                        <p>Integer nec bibendum lacus. Suspen disse dictum enim sit amet libero males uada feugiat. Praesent malesuada.</p>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget-area mb-100">
                        <!-- Widget Title -->
                        <div class="widget-title">
                            <h6>Horas</h6>
                        </div>
                        <!-- Office Hours -->
                        <div class="weekly-office-hours">
                            <ul>
                                <li class="d-flex align-items-center justify-content-between"><span>Segunda - Sexta</span> <span>09 AM - 19 PM</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span>Sabado</span> <span>09 AM - 14 PM</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span>Domingo</span> <span>Closed</span></li>
                            </ul>
                        </div>
                        <!-- Address -->
                        <div class="address">
                            <h6><img src="../assets/icons/phone-call.png" alt=""> {{ $appConfiguracao->phone1 ?? 'phone 1'}}</h6>
                            <h6><img src="../assets/icons/envelope.png" alt=""> office@template.com</h6>
                            <h6><img src="../assets/icons/location.png" alt=""> Main Str. no 45-46, b3, 56832, Los Angeles, CA</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget-area mb-100">
                        <!-- Widget Title -->
                        <div class="widget-title">
                            <h6>Useful Links</h6>
                        </div>
                        <!-- Nav -->
                        <ul class="useful-links-nav d-flex align-items-center">
                            <li><a href="{{ url('/novidades') }}">Novidades</a></li>
                            <li><a href="{{ url('/colecao') }}">Categoria</a></li>
                            <li><a href="{{ url('/sobre') }}">Sobre Nos</a></li>    
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget-area mb-100">
                        <!-- Widget Title -->
                        <div class="widget-title">
                            <h6>Featured Properties</h6>
                        </div>
                        <!-- Featured Properties Slides -->
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                            <div class="carousel-inner">
                        
                                @forelse ( $novaImobiliario as $produtoItem)
                                    
                                    <div class="carousel-item active">
                                        @if ($produtoItem->produtoImages->count() > 0)
                                                <a  href="{{url('/colecao/'.$produtoItem->categoria->nome.'/'.$produtoItem->nome)}}">
                                                    <img src="{{ asset($produtoItem->produtoImages[0]->imagem)}}" alt="{{$produtoItem->nome}}">
                                                </a>
                                        @endif
    
                                    </div>
                        
                                @endforeach
                            </div>
                           
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Copywrite Text -->
    <div class="copywrite-text d-flex align-items-center justify-content-center">
        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://skyanimoviehd.site" target="_blank">Sabo Carlos</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    </div>
</footer>