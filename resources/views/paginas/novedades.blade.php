@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item active text-dark font-size-13 fst-italic" aria-current="page">Novedades</li>
            </ol>
        </nav>  
    </div>
</div>
@isset($posts)
	<section class="py-md-5 py-sm-3">
		<div class="container row mx-auto">
            <div class="col-sm-12 col-md-8">
                <div class="row">
                    @if (count($posts))
                        @foreach ($posts as $p)
                            <div class="col-sm-12 col-md-6 mb-4">
                                <div class="card" style="border-top: 15px solid #005BA8; border-radius:0; min-height: 500px;">
                                    <img src="{{ asset($p->image) }}" class="card-img-top">
                                    <div class="card-body position-relative">
                                        <small style="display: block; border-bottom: 1px solid #CBCBCB; margin-bottom: 15px;">{{ $p->content_3 }}</small>
                                        <h5 class="card-title font-size-14">{{ $p->content_1 }}</h5>
                                        <small class="font-size-10">{{ date('d/m/Y', strtotime($p->created_at)) }}</small>
                                        <p class="card-text font-size-16">{!! Str::limit($p->content_2, 200) !!}</p>
                                        <a href="{{ route('obtenerNovedad', ['id'=> $p->id]) }}" class="btn text-blue font-size-14 position-absolute fw-bold" style="bottom: 20px; right: 20px;">
                                            <img src="{{ asset('images/baseline-last_page-24px.svg') }}" alt="">
                                            Ver más</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h3 class="text-center">no hay post cargados</h3>
                    @endif
                </div>
            </div>
            <aside class="col-sm-12 col-md-4">
                @includeIf('paginas.partials.nav-novedad')
            </aside>
		</div>
	</section>
@endisset

@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
