@extends('paginas.partials.app')
@section('content')
@isset($section1s)
	@if (count($section1s))
		<div id="sliderHero" class="carousel slide position-relative" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($section1s as $k => $v)
					<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>
				@endforeach
			</div>
			<div class="carousel-inner">
				@foreach ($section1s as $k => $v)
					<div class="carousel-item @if(!$k) active @endif" style="background-image: url({{ asset($v->image) }});background-size: 100% 100%; background-repeat: no-repeat;">
						<div class="carousel-caption text-start container mx-auto position-static mt-sm-0 mt-md-5">
							<div class="mt-sm-0 mt-md-5">
								<h2 class="font-size-40 text-blue">{{ $v->content_1 }}</h2>
								<div class="font-size-18 text-blue d-sm-none d-md-block" style="font-weight: 300;">{!! $v->content_2 !!}</div>
							</div>

						</div>
					</div>
				@endforeach
			</div>
		</div>		
	@endif
@endisset
@isset($products)
	@if (count($products))
	<section class="py-md-5 py-sm-3">
		<div class="container mx-auto py-md-5 py-sm-2 font-size-28 text-center">PRODUCTOS DESTACADOS</div>
		<div class="container mx-auto carrusel">
			@foreach ($products as $p)
				@if ($p->subCategory->category->id == 1)
					@includeIf('paginas.partials.producto', ['p' => $p])
				@elseif($p->subCategory->category->id == 2)
					@includeIf('paginas.partials.producto-ituhielo', ['p' => $p])
				@elseif($p->subCategory->category->id == 3)
					@includeIf('paginas.partials.producto-ituagua', ['p' => $p])
				@endif
			@endforeach
		</div>
	</section>
	@endif
@endisset
@isset($section2)
	<section class="mb-sm-2 mb-md-5 row align-items-center">
		<div class="col-sm-12 col-md-6 mb-sm-3 mb-md-0">
			@if (Storage::disk('custom')->exists($section2->image))
				<img src="{{ asset($section2->image) }}" class="img-fluid d-block mx-auto">
			@endif
		</div>
		<div class="col-sm-12 col-md-6">
			<div class="px-sm-4 py-sm-2 px-md-5 py-md-5 bg-white position-relative card-home" style="right: 100px; border-radius: 20px;">
				<h3 class="font-size-28 mb-4">{{ $section2->content_1 }}</h3>
				<div class="font-size-24 mb-4" style="font-weight: 100;">{!! $section2->content_2 !!}</div>
				<a href="{{ route('contacto') }}" class="btn-danger btn tex-white rounded-pill py-1 px-3">Más información</a>
			</div>
		</div>
	</section>
@endisset
@endsection
@push('head')
	<link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/slick/slick-theme.css') }}">
	<style>
		.slick-slide{
			margin-right: 2px;
		}
	</style>
@endpush
@push('scripts')
<script src="{{ asset('vendor/slick/slick.js') }}"></script>
<script>
	$('.carrusel').slick({
		dots: true,
		infinite: false,
		speed: 1500,
		autoplay: true,
		slidesToShow: 4,
		slidesToScroll: 2,
		arrows:false,
		infinite:true,
		responsive: [
				{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					infinite: true,
					dots: true
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});
</script>
@endpush