@extends('paginas.partials.app')
@section('content')
@isset($product)
<div aria-label="breadcrumb" class="py-1 font-size-14" style="background-color: #FAFAFA !important;">
    <ol class="breadcrumb container">
        <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none"><i class="fas fa-home"></i> </a></li>
        <li class="breadcrumb-item"><a href="{{ route('categoria-productos') }}" class="text-decoration-none">Productos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('subcategoria-productos', ['id'=> $product->subCategory->id]) }}" class="text-decoration-none">{{$product->subCategory->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
    </ol>
</div> 
@endisset
<div class="py-sm-2 py-md-5">
    <div class="container">
        <div class="row">
            <aside class="col-sm-12 col-md-3 order-sm-2 order-md-1">
                <ul class="p-0" style="list-style: none;">
                    @isset($subcategories)
                        @if (count($subcategories))
                            @foreach ($subcategories as $sc)
                                <li class="py-2 @if($sc->id == $product->subCategory->id) active @endif"> 
                                    <a href="#" class="toggle d-block p-2 text-decoration-none  text-decoration-none text-blue-dark font-size-14 @if($sc->id == $product->subCategory->id) text-danger @endif">{{$sc->name}}</a>
                                    <ul class="ps-0 {{ ($sc->id == $product->subCategory->id) ? '' : 'rd-none' }}" style="list-style: none">
                                        @foreach ($sc->products as $cp)
                                            <li class="ps-4 py-2">
                                                <a href="{{ route('producto', ['product' => $cp->id]) }}" class="text-blue-dark text-decoration-none font-size-14 d-inline-block fw-bold @if($cp->id == $product->id) text-danger @endif" style="@if($cp->id == $product->id) font-weight: bold; @endif">{{$cp->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>                        
                            @endforeach
                        @endif
                    @endisset

                </ul>             
            </aside>
            <section class="producto col-sm-12 col-md-9 font-size-14 order-sm-1 order-md-2">
                <div class="row mb-5">
                    <div class="col-sm-12 col-md-6">
                        <div class="d-flex flex-column-reverse">
                            <div class="d-sm-none d-md-block">
                                <ul class="d-flex p-0 multiple-items" style="list-style: none; overflow: hidden;">
                                    @foreach ($product->images as $pi)
                                        <li class="me-2 w-auto" style="border: 1px solid #FD0D1B; display: inline-block;">
                                            <img src="{{ asset($pi->image) }}" width="85" height="65" class="imagenes"  style="object-fit: cover; cursor:pointer;">
                                        </li>                 
                                    @endforeach
                                </ul>
                            </div> 
                            @if (count($product->images))
                                <div class="">
                                    <img src="{{ asset($product->images()->first()->image) }}" class="mx-auto img-fluid d-block w-100 mb-3" alt="{{$product->name}}" width="375" height="375" style="object-fit: contain; max-height:460px;" id="imagen-actual">
                                </div>
                            @else 
                                <div class="">
                                    <img src="{{ asset('images/default.jpg') }}" class="mx-auto img-fluid d-block w-100" style="object-fit: contain;"> 
                                </div>                                   
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <strong class="text-danger font-size-14 d-inline-block mb-2">{{ $product->subCategory->name }}</strong>
                        <h1 class="font-size-24 text-uppercase mb-4 pb-2">{{ $product->name }}</h1>   
                        <div class="mb-sm-2 mb-md-5 font-size-15 ul-product mb-5">{!! $product->description !!}</div>
                        <div class=table-responsive"">
                            <table class="table table-striped font-size-15">
                                <tbody>
                                    @if ($product->material)
                                        <tr>
                                            <td>Material</td>
                                            <th class="text-end">{{ $product->material }}</th>
                                        </tr>      
                                    @endif
                                    @if ($product->capacity)
                                        <tr>
                                            <td>Capacidad</td>
                                            <th class="text-end">{{ $product->capacity }}</th>
                                        </tr>      
                                    @endif
                                    @if ($product->amount)
                                        <tr>
                                            <td>Cantidad</td>
                                            <th class="text-end">{{ $product->amount }}</th>
                                        </tr>      
                                    @endif
                                    @if ($product->cover)
                                        <tr>
                                            <td>Tapa</td>
                                            <th class="text-end">{{ $product->cover }}</th>
                                        </tr>      
                                    @endif
                                    @if ($product->color)
                                        <tr>
                                            <td>Color</td>
                                            <th class="text-end">{{ $product->color }}</th>
                                        </tr>      
                                    @endif
                                    @if ($product->weight)
                                        <tr>
                                            <td>Peso</td>
                                            <th class="text-end">{{ $product->weight }}</th>
                                        </tr>      
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        @if ($product->info)
                            <div class="mb-3">
                                <span>{{ $product->info }}</span>
                            </div>                         
                        @endif

                        <div class="d-flex justify-content-sm-center justify-content-md-start flex-wrap">
                            <a href="{{ route('contacto') }}" class="me-sm-0 me-md-3 mb-sm-3 mb-md-0 px-sm-3 px-md-4 btn ficha-tecnica rounded-pill font-size-13 text-uppercase bg-danger text-white">consultar</a>
                            @if ($product->extra)
                                <a href="{{ route('ficha-tecnica', ['id'=> $product->id]) }}" class="me-sm-0 me-md-3 mb-sm-3 mb-md-0 px-sm-3 px-md-4 d-flex justify-content-between btn ficha-tecnica rounded-pill font-size-13 align-items-center" style="border: 2px solid #FD0D1B; color: #FD0D1B;">Ficha Técnica <i class="fas fa-download ms-3"></i></a>  
                            @endif
                        </div>   
                    </div>
                    @if (count($product->subCategory->products) > 1)
                        <div class="col-sm-12 mt-md-5 mt-sm-2">
                            <h2 class="mb-4 text-uppercase font-size-20 col-sm-12 pb-2">PRODUCTOS RELACIONADOS</h2>
                            <div class="productos-relacionados row">
                                @foreach ($product->subCategory->products()->where('id', '<>', $product->id)->take(3)->get() as $rp)
                                    <div class="col-sm-12 col-md-4">
                                        @includeIf('paginas.partials.producto', ['p' => $rp])
                                    </div>
                                @endforeach
                            </div>
                        </div>  
                    @endif

                </div>         
            </section>
        </div>
    </div>
</div>
@endsection
@push('head')
    <link rel="stylesheet" href="{{ asset('vendor/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}">
    <style>
        .slick-list.draggable{
            min-width: 100%;
        }
        .slick-track{
            margin-left: 0;
        }
        .slick-slide img{
            width: 100%;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
    <script src="{{ asset('vendor/slick/slick.js') }}"></script>
    <script>
        $('.imagenes').click(function (e){
            e.preventDefault()
            $('#imagen-actual').attr('src', e.target.src)
        })
        $('.multiple-items').slick({
            infinite: false,
            slidesToShow: 6,
            slidesToScroll: 3
        });
    </script>
@endpush


