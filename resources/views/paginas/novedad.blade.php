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
@isset($post)
	<section class="py-md-5 py-sm-3">
		<div class="container row mx-auto">
            <div class="col-sm-12 col-md-8">
                <small class="text-uppercase fw-bold" style="display: block; border-bottom: 1px solid #005BA8; margin-bottom: 15px;">{{ $post->content_3 }}</small>
                <div class="card" style="border: none; border-radius:0; min-height: 500px;">
                    <img src="{{ asset($post->image) }}" class="card-img-top">
                    <div class="card-body position-relative">
                        <div class="">
                            <h5 class="card-title font-size-24 text-blue mb-3">{{ $post->content_1 }}</h5>
                            <small class="font-size-10 d-block mb-3">{{ date('d/m/Y', strtotime($post->created_at)) }}</small>
                        </div>
                        <div class="card-text font-size-16" style="font-weight: 500">{!! $post->content_2 !!}</div>
                        @if (Storage::disk('custom')->exists($post->content_4))
                            <div class="">
                                <a href="{{ route('novedad.pdf', ['id'=>$post->id]) }}" style="border: 1px solid #005BA8; border-radius: 4px;" class="text-uppercase text-decoration-none text-blue fw-bold font-size-11 py-2 px-4">descargar pdf</a>
                            </div>         
                        @endif
                    </div>
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
