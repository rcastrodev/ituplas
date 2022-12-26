@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="py-1 font-size-14" style="background-color: #FAFAFA !important;">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
			<li class="breadcrumb-item active font-size-13" aria-current="page">Ofertas</li>
		</ol>
	</div>
</div>
@isset($products)
	@if (count($products))
        <section class="py-md-5 py-sm-2 container">
            <div class="row mx-auto">
                @foreach ($products as $p)
                    <div class="col-sm-12 col-md-3 mb-5">
                        @if ($p->subCategory->category->id == 1)
                            @includeIf('paginas.partials.producto', ['p' => $p])
                        @elseif($p->subCategory->category->id == 2)
                            @includeIf('paginas.partials.producto-ituhielo', ['p' => $p])
                        @elseif($p->subCategory->category->id == 3)
                            @includeIf('paginas.partials.producto-ituagua', ['p' => $p])
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
	@endif
@endisset
@endsection