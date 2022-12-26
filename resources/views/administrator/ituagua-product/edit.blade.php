@extends('adminlte::page')
@section('title', 'Editar')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Editar</h1>
        <a href="{{ route('ituagua-product.content') }}" class="btn btn-sm btn-primary">ver</a>
    </div>
@stop
@section('content')
@includeIf('administrator.partials.mensaje-exitoso')
@includeIf('administrator.partials.mensaje-error')
<form action="{{ route('ituagua-product.content.update') }}" method="post" enctype="multipart/form-data" class="card card-primary">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <div class="card-header">Producto</div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body row">
        <div class="form-group col-sm-12 col-md-6">
            <label for="">Nombre</label>
            <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Nombre del producto">
        </div>
        <input type="hidden" name="sub_category_id" value="{{ $subCategory->id }}">
        <div class="form-group col-sm-12 col-md-2">
            <label for="">Orden</label>
            <input type="text" name="order" value="{{$product->order}}" class="form-control" placeholder="AA">
        </div>
        <div class="form-group col-sm-12 col-md-2 align-items-center d-flex flex-column">
            <label>Destacada ?</label>
            <input type="checkbox" name="outstanding" @if ($product->outstanding == 1) checked @endif>
        </div>
        <div class="form-group col-sm-12 col-md-2 align-items-center d-flex flex-column">
            <label>En oferta</label>
            <input type="checkbox" name="offers" @if ($product->offers == 1) checked @endif>
        </div>
        <div class="form-group col-sm-12">
            <label>Descripción</label>
            <textarea name="description" class="ckeditor" id="" cols="30" rows="10">{{$product->description}}</textarea>
        </div>
        @if ($product->extra)
            <div class="form-group col-sm-12">
                <a href="{{ route('ficha-tecnica', ['id'=> $product->id]) }}" class="btn btn-sm btn-primary rounded-pill" target="_blank">Ficha técnica</a>
                <button class="btn btn-sm rounded-circle btn-danger far fa-trash-alt" id="borrarFicha" data-url="{{ route('borrar-ficha-tecnica', ['id'=> $product->id]) }}">
                </button>
            </div>          
        @endif
        <div class="form-group col-sm-12 col-md-4">
            <label>Ficha técnica</label>
            <input type="file" name="extra" class="form-control-file">
        </div>    
        <div class="w-100 mb-5"></div>
        <div class="form-group col-sm-12 col-md-4">
            <label for="">Material</label>
            <input type="text" name="material" value="{{$product->material}}" class="form-control">
        </div>
        <div class="form-group col-sm-12 col-md-4">
            <label for="">Capacidad</label>
            <input type="text" name="capacity" value="{{$product->capacity}}" class="form-control">
        </div>
        <div class="form-group col-sm-12 col-md-4">
            <label for="">Cantidad</label>
            <input type="text" name="amount" value="{{$product->amount}}" class="form-control">
        </div>
        <div class="form-group col-sm-12 col-md-4">
            <label for="">Tapa</label>
            <input type="text" name="cover" value="{{$product->cover}}" class="form-control">
        </div>
        <div class="form-group col-sm-12 col-md-4">
            <label for="">Color</label>
            <input type="text" name="color" value="{{$product->color}}" class="form-control">
        </div>
        <div class="form-group col-sm-12 col-md-4">
            <label for="">Peso</label>
            <input type="text" name="weight" value="{{$product->weight}}" class="form-control">
        </div>
        <div class="form-group col-sm-12">
            <label for="">Info</label>
            <input type="text" name="info" value="{{$product->info}}" class="form-control">
        </div>
        <div class="w-100 mb-5"></div>
        @foreach ($product->images as $pi)
            <div class="form-group col-sm-12 col-md-4 ">
                <div class="position-relative">
                    <button class="position-absolute btn btn-sm btn-danger rounded-pill far fa-trash-alt destroyImgProduct" data-url="{{ route('product-picture.content.destroy', ['id'=> $pi->id]) }}"></button>
                    <img src="{{ asset($pi->image) }}" style="max-width: 350px; min-width:350px; max-height:200px; min-height:200px; object-fit: contain;">
                </div>
                <label>imagen <small>imagen 288x250px</small></label>
                <input type="file" name="images[]" class="form-control-file">
            </div>                    
        @endforeach
        @if ($numberOfImagesAllowed)
            @for ($i = 1; $i <= $numberOfImagesAllowed; $i++)
                <div class="form-group col-sm-12 col-md-4">
                    <label for="image">imagen <small>imagen 288x250px</small></label>
                    <input type="file" name="images[]" class="form-control-file" id="">
                </div>           
            @endfor
        @endif   
    </div>
      <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('ituagua-product.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop
@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/admin/ituagua-product/product.js') }}"></script>
@stop

