@extends('paginas.partials.app')
@section('content')
<div class="hero d-flex align-items-center position-relative" style="background-image: url({{ asset($section1->image) }}); background-repeat: no-repeat; background-size: 100% 100%; background-position: center; min-height:376px;">
    <div aria-label="breadcrumb" class="py-1 font-size-14 position-absolute w-100" style="background-color: #FAFAFA !important; top:0;">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
                <li class="breadcrumb-item active font-size-13" aria-current="page">Ituagua</li>
            </ol>
        </div>
    </div>
    <h1 class="text-white container">{{ $section1->content_1 }}</h1>
</div>
@isset($products)
	@if (count($products))
        <section class="py-md-5 py-sm-2 container">
            <div class="row mx-auto">
                @foreach ($products as $p)
                    <div class="col-sm-12 col-md-4 mb-5">
                        @includeIf('paginas.partials.producto-ituagua', ['p' => $p])
                    </div>
                @endforeach
            </div>
        </section>
	@endif
@endisset
@endsection