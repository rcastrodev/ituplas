@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="py-1 font-size-14" style="background-color: #FAFAFA !important;">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
			<li class="breadcrumb-item active font-size-13" aria-current="page">Productos</li>
		</ol>
	</div>
</div>
@isset($subCategories)
	@if (count($subCategories))
        <section class="py-md-5 py-sm-2 container">
            <div class="row mx-auto">
                @foreach ($subCategories as $c)
                    <div class="col-sm-12 col-md-4 mb-5">
                        @includeIf('paginas.partials.subcategoria-productos', ['c' => $c])
                    </div>
                @endforeach
            </div>
        </section>
	@endif
@endisset
@endsection