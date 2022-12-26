@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="py-1 font-size-14" style="background-color: #FAFAFA !important;">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
			<li class="breadcrumb-item active font-size-13" aria-current="page">Logística</li>
		</ol>
	</div>
</div>
@isset($section1)
	<section class="mb-sm-2 mb-md-5 row align-items-center">
		<div class="col-sm-12 col-md-6">
			@if (Storage::disk('custom')->exists($section1->image))
				<img src="{{ asset($section1->image) }}" class="img-fluid">
			@endif
		</div>
		<div class="col-sm-12 col-md-6">
			<div class="px-sm-2 py-sm-2 px-md-5 py-md-5 bg-white">
				<h3 class="font-size-28 mb-4">{{ $section1->content_1 }}</h3>
				<div class="font-size-24 mb-4" style="font-weight: 100;">{!! $section1->content_2 !!}</div>
				<a href="{{ route('contacto') }}" class="btn-danger btn tex-white rounded-pill py-1 px-3">Más información</a>
			</div>
		</div>
	</section>
@endisset
@endsection