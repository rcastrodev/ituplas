@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="py-1 font-size-14" style="background-color: #FAFAFA !important;">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('ituhielo') }}" class="text-decoration-none font-size-13">Ituhielo</a></li>
			<li class="breadcrumb-item active font-size-13" aria-current="page">{{ $subCategory->name }}</li>
		</ol>
	</div>
</div>
@isset($subcategories)
    @if (count($subcategories))
        <section class="py-sm-2 py-md-5">
            <div class="container row mx-auto px-0">
                <aside class="col-sm-12 col-md-3 order-sm-2 order-md-1">
                    <ul class="p-0" style="list-style: none;">
                        @foreach ($subcategories as $c)
                            <li class="py-2 @if($c->id == $subCategory->id) active @endif" > 
                                <a href="#" class="toggle d-block p-2 text-decoration-none  text-decoration-none text-blue-dark font-size-14 d-inline-block @if($c->id == $subCategory->id) text-blue @endif">{{$c->name}}</a>
                                <ul class="p-0 {{ ($c->id == $subCategory->id) ? '' : 'rd-none' }}" style="list-style: none">
                                    @foreach ($c->products as $cp)
                                        <li class="py-2">
                                            <a href="{{ route('subcategoria-ituhielo-producto', ['product' => $cp->id]) }}" class="text-blue-dark text-decoration-none ps-4 font-size-14 d-inline-block fw-bold">{{$cp->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>                        
                        @endforeach
                    </ul>
                </aside>
                <section class="col-sm-12 col-md-9 font-size-14 order-sm-1 order-md-2">
                    <div class="row">
                        @isset($products)
                            @if (count($products))
                                @foreach ($products as $p)
                                    <div class="col-sm-12 col-md-4 mb-3">
                                        @include('paginas.partials.producto-ituhielo', ['p' => $p])
                                    </div>
                                @endforeach    
                            @else
                                <h4 class="text-center">No hay productos cargados en esta categoría</h4>
                            @endif
                    
                        @endisset
                    </div>
                </section>
            </div>
        </section>
    @endif
@endisset

@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush


