<div id="pre-header" class="d-sm-none d-md-block bg-blue font-size-12 position-relative py-1" style="overflow: hidden;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="" style="z-index: 100;">
                <div class="me-3 d-inline-block">
                    <i class="fas fa-phone-alt text-white me-1"></i> 
                    @php $phone1 = Str::of($data->phone1)->explode('|') @endphp
                    @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                    @if (count($phone1) == 2)
                        <a href="tel:{{$phone1[0]}}" class="text-white underline underline">{{ $phone1[1] }}</a>
                    @else 
                        <a href="tel:{{$data->phone1}}" class="text-white underline underline">{{ $data->phone1 }}</a>
                    @endif
                    @if (count($phone2) == 2)
                        <span class="text-white">/</span>
                        <a href="tel:{{$phone2[0]}}" class="text-white underline underline">{{ $phone2[1] }}</a>
                    @else 
                        <span class="text-white">/</span>
                        <a href="tel:{{$data->phone2}}" class="text-white underline underline">{{ $data->phone2 }}</a>
                    @endif
                </div>
                <div class="d-inline-block email me-3">
                    <a href="mailto:{{ $data->email }}" class="mb-xs-2 mb-md-0 text-white underline underline" style="z-index: 100;">
                        <i class="fas fa-envelope text-white me-1"></i> {{ $data->email }}
                    </a>
                </div>
            </div>
            <div class="d-flex align-items-center" style="z-index: 100;">
                <div id="redes-sociales">    
                    <a href="{{$data->instagram}}" class="text-white text-decoration-none p-2 py-3">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="{{$data->facebook}}" class="text-white text-decoration-none p-2 py-3">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
                <form action="{{ route('productos') }}"  class="form-pre-header">
                    <div class="input-group">
                        <input type="text" name="b" class="form-control bg-transparent border-end-0 input-search p-0 px-2" placeholder="Buscar ...">
                        <button type="submit" class="input-group-text bg-transparent border-start-0"><i class="fas fa-search text-white"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset($data->logo_header) }}" class="img-fluid logo-header">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center text-uppercase position-relative py-md-4 py-sm-2" id="navbarNav">
            <ul class="navbar-nav justify-content-end align-items-center w-100">
                <li class="nav-item @if(Request::is('/')) position-relative @endif">
                    <a class="nav-link text-blue-dark @if(Request::is('/')) active @endif" href="{{ route('index') }}">Inicio</a>
                </li>
                <li class="nav-item @if(Request::is('empresa')) position-relative @endif">
                    <a class="nav-link text-blue-dark @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">Empresa</a>
                </li>
                <li class="nav-item @if(Request::is('categoria-productos') || Request::is('sub-categoria/productos/*') || Request::is('producto/*')) position-relative @endif">
                    <a class="nav-link text-blue-dark @if(Request::is('categoria-productos') || Request::is('sub-categoria/productos/*') || Request::is('producto/*')) active @endif" href="{{ route('categoria-productos') }}">Productos</a>
                </li>
                <li class="nav-item @if(Request::is('ituhielo') || Request::is('sub-categoria/ituhielo/*')) position-relative @endif">
                    <a class="nav-link text-blue-dark @if(Request::is('ituhielo') || Request::is('sub-categoria/ituhielo/*')) active @endif" href="{{ route('ituhielo') }}">Ituhielo</a>
                </li>
                <li class="nav-item @if(Request::is('ituagua') || Request::is('sub-categoria/ituagua/*')) position-relative @endif">
                    <a class="nav-link text-blue-dark @if(Request::is('ituagua') || Request::is('sub-categoria/ituagua/*')) active @endif" href="{{ route('ituagua') }}">Ituagua</a>
                </li>
                <li class="nav-item @if(Request::is('ofertas')) position-relative @endif">
                    <a class="nav-link text-blue-dark @if(Request::is('ofertas')) active @endif" href="{{ route('ofertas') }}">Ofertas</a>
                </li>
                <li class="nav-item @if(Request::is('logistica')) position-relative @endif">
                    <a class="nav-link text-blue-dark @if(Request::is('logistica')) active @endif" href="{{ route('logistica') }}">Logística</a>
                </li>
                <li class="nav-item @if(Request::is('contacto')) position-relative @endif">
                    <a class="nav-link text-blue-dark @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>  
