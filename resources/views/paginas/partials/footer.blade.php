<footer class="py-sm-2 pt-md-5 p-md-2 font-size-16 bg-blue text-sm-center text-md-start">
    <div class="container">
        <div class="row justify-content-between pb-3">
            <div class="col-sm-12 col-md-3 d-sm-none d-md-block">
                <a href="{{ route('index') }}">
                    <img src="{{ asset($data->logo_footer) }}" alt="" class="d-block img-fluid mb-4">
                </a>
                <div class="text-center" style="position: relative; bottom: 15px;">
                    <a href="{{$data->instagram}}" class="text-white text-decoration-none p-2 py-3">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="{{$data->facebook}}" class="text-white text-decoration-none p-2 py-3">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 d-sm-none d-md-block">
                <h6 class="text-uppercase text-white fw-bold mb-3">MAPA DEL SITIO</h6>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <a href="{{ route('index') }}" class="d-block text-decoration-none text-light font-size-14 mb-1 underline">Home</a>
                        <a href="{{ route('empresa') }}" class="d-block text-decoration-none text-light font-size-14 mb-1 underline">Nosotros</a>
                        <a href="{{ route('categoria-productos') }}" class="d-block text-decoration-none text-light font-size-14 mb-1 underline">Productos</a>
                        <a href="{{ route('ituhielo') }}" class="d-block text-decoration-none text-light font-size-14 mb-1 underline">Ituhielo</a>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <a href="{{ route('ituagua') }}" class="d-block text-decoration-none text-light font-size-14 mb-1 underline">Ituagua</a>
                        <a href="{{ route('ofertas') }}" class="d-block text-decoration-none text-light font-size-14 mb-1 underline">Ofertas</a>
                        <a href="{{ route('logistica') }}" class="d-block text-decoration-none text-light font-size-14 mb-1 underline">Logística</a>
                        <a href="{{ route('contacto') }}" class="d-block text-decoration-none text-light font-size-14 mb-1 underline">Contacto</a>
                    </div>
                    
                </div>                
            </div>
            <div class="col-sm-12 col-md-5 font-size-13 mb-sm-4 mb-md-0">
                <div class="row">
                    <h6 class="text-uppercase text-white fw-bold mb-3">DATOS DE CONTACTO</h6>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-flex text-light mb-2">
                                <i class="fas fa-map-marker-alt d-block me-3 mb-3 text-light font-size-20"></i>
                                <div class="text-start">
                                    <span class="d-block text-light">{{ $data->address }}</span>
                                </div>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="fas fa-phone-alt d-block me-3 mb-3 text-light font-size-20"></i>
                                <div class="d-flex text-start">
                                    @php $phone1 = Str::of($data->phone1)->explode('|') @endphp
                                    @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                                    @if (count($phone1) == 2)
                                        <a href="tel:{{ $phone1[0]}}" class="text-light underline mb-1">{{ $phone1[1] }}</a>  
                                    @else 
                                        <a href="tel:{{ $data->phone1}}" class="text-light underline mb-1">{{ $data->phone1 }}</a>  
                                    @endif
                                    @if (count($phone2) == 2)
                                        <span class="text-light d-block mx-2">/</span>
                                        <a href="tel:{{ $phone2[0]}}" class="text-light underline mb-1">{{ $phone2[1] }}</a>  
                                    @else 
                                        <span class="text-light">/</span>
                                        <a href="tel:{{ $data->phone2}}" class="text-light underline mb-1">{{ $data->phone2 }}</a>  
                                    @endif
                                </div>
                            </div>  
                            <div class="d-flex text-white">
                                <i class="fas fa-envelope d-block me-3 mb-3 text-light font-size-20"></i>
                                <div class="text-start d-flex flex-column">
                                    <a href="mailto:{{ $data->email }}" class="text-light underline">{{ $data->email }}</a>
                                    <a href="mailto:{{ $data->email2 }}" class="text-light underline">{{ $data->email2 }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>-
<div class=" py-sm-2 py-md-5 bg-light d-flex justify-content-center flex-wrap">
    <span class="text-blue">® ITUPLAS - Todos los derechos reservados |</span>
    <a href="https://osole.com.ar/" class="text-decoration-none text-blue">BY OSOLE</a>
</div>
@isset($data->phone3)
    <a href="https://wa.me/{{$data->phone3}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
        <i class="fab fa-whatsapp"></i>
    </a>  
@endisset