@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="py-1 font-size-14" style="background-color: #FAFAFA !important;">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
			<li class="breadcrumb-item active font-size-14" aria-current="page">Contacto</li>
		</ol>
	</div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.012591978424!2d-58.70144888497569!3d-34.629122080452824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcbfacd53a7717%3A0x9e491b3802cc271!2sItuplas!5e0!3m2!1ses!2sve!4v1648344119854!5m2!1ses!2sve" height="428" style="border:0; width:100%;" allowfullscreen="" loading="lazy" class="rMenu"></iframe>
<div class="my-5">
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
        @endif
        @if (Session::has('mensaje'))
        <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('mensaje') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>                    
        @endif
        <form action="{{ route('send-contact') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-4 font-size-14">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-map-marker-alt text-danger d-block me-3"></i><span class="d-block"> {{ $data->address }}</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-envelope text-danger d-block me-3"></i><span class="d-block"></span>  
                        <div class="">
                            <a href="mailto:{{ $data->email }}" class="underline text-dark">{{ $data->email }}</a><br> 
                            <a href="mailto:{{ $data->email2}}" class="underline text-dark">{{ $data->email2 }}</a>  
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-phone-alt text-danger d-block me-3"></i>
                        @php $phone = Str::of($data->phone1)->explode('|') @endphp
                        @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                        @if (count($phone) == 2)
                            <a href="tel:{{ $phone[0] }}" class="underline text-dark">{{ $phone[1] }}</a>
                        @else 
                            <a href="tel:{{ $data->phone1 }}" class="underline text-dark">{{ $data->phone1 }}</a>
                        @endif       
                        @if (count($phone) == 2)
                            <span class="text-dark mx-2">/</span>
                            <a href="tel:{{ $phone2[0] }}" class="underline text-dark">{{ $phone2[1] }}</a>
                        @else 
                            <span class="text-dark mx-2">/</span>
                            <a href="tel:{{ $data->phone2 }}" class="underline text-dark">{{ $data->phone2 }}</a>
                        @endif   
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="nombre" placeholder="Nombre *" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="apellido" placeholder="apellido" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email *" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="compania" placeholder="Empresa *" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <textarea name="mensaje" class="form-control font-size-14" cols="30" rows="5" placeholder="Escriba un mensaje"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="termino" id="termino">
                                <label class="form-check-label font-size-13" for="termino">Acepto los términos y condiciones de privacidad *</label>
                            </div>
                            <div class="form-group">
                                {!! app('captcha')->display() !!}
                            </div>
                        </div>
                        <div class="col-sm-12 mb-sm-3 mb-sm-3">
                            <button type="submit" class="text-uppercase btn bg-danger font-size-14 py-2 rounded-pill font-weight-600 mb-sm-3 mb-md-0 ancho-boton text-white px-5" style="box-shadow: 0px 3px 6px #00000029;">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
