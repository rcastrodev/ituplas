@extends('paginas.partials.app')
@section('content')
@isset($sliders)
	@if(count($sliders))
		<div id="sliderEmpresa" class="carousel slide position-relative" data-bs-ride="carousel">
			<div aria-label="breadcrumb" class="py-1 font-size-14 rMenu position-absolute w-100 breadcrumb-content" style="background-color: #fafafaa6;">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">INICIO</a></li>
						<li class="breadcrumb-item active font-size-13" aria-current="page">EMPRESA</li>
					</ol>
				</div>
			</div>
			<div class="carousel-indicators d-sm-none d-md-block">
				@foreach ($sliders as $k => $slide)
					<button type="button" data-bs-target="#sliderEmpresa" data-bs-slide-to="{{$k}}" class="@if (!$k) active @endif" aria-current="true" aria-label="Slide {{$k}}"></button>			
				@endforeach
			</div>
			<div class="carousel-inner h-100">
				@foreach ($sliders as $k => $slide)
					<div class="carousel-item h-100 @if (!$k) active @endif" style="background-image: url({{ asset($slide->image) }}); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">
						<div class="carousel-caption w-75">
							<h2 class="font-size-50 fw-bold text-white">{{ $slide->content_1 }}</h2>
						</div>
					</div>		
				@endforeach
			</div>
			<div class="position-absolute text-center text-white ribbon w-100 py-sm-2 py-md-4 d-sm-none d-lg-block" style="bottom: 0;">
				<div class="container">{!! $section2->content_1 !!}</div>
			</div>
		</div>
	@endif	
@endisset
@isset ($section3)
	<div class="py-md-5 py-sm-3 font-size-15" style="background-color: #f6f6f6;">
		<div class="container row mx-auto py-md-5 py-sm-0">
			<div class="col-sm-12 col-md-6">{!! $section3->content_1 !!}</div>
			<div class="col-sm-12 col-md-6">{!! $section3->content_2 !!}</div>
		</div>
	</div>	
@endisset
@isset($section4s)
	@if(count($section4s))
		<div class="container mx-auto py-5">
			<div class="containerr">
				@foreach ($section4s as $s4)
					<figure>
						<img src="{{ asset($s4->image) }}"/>
					</figure>			
				@endforeach
			</div>

		</div>
	@endif
@endisset
@endsection
@push('head')
	<style>
		.carousel-caption{
			text-align: left !important;
		}
		.ribbon{
			background-color: #0000006b;
		}
		.carousel-indicators{
			bottom: 120px !important;
		}
		
		.breadcrumb-content{
			z-index: 10 !important;
		}
		img {
			max-width: 100%;
			display: block;
		}

		figure {
			margin: 0;
			display: grid;
			grid-template-rows: 1fr auto;
			margin-bottom: 10px;
			break-inside: avoid;
		}

		figure > img {
			grid-row: 1 / -1;
			grid-column: 1;
		}

		figure a {
			color: black;
			text-decoration: none;
		}

		figcaption {
			grid-row: 2;
			grid-column: 1;
			background-color: rgba(255,255,255,.5);
			padding: .2em .5em;
			justify-self: start;
		}

		.containerr {
			column-count: 3;
			column-gap: 10px;
		}
	</style>
@endpush