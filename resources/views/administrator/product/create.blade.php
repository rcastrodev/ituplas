@extends('adminlte::page')
@section('title', 'Crear producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Crear producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<div class="card card-primary">
    <div class="card-header"></div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('product.content.store') }}" method="post" enctype="multipart/form-data">
        <div class="card-body row">
            @csrf
            <div class="form-group col-sm-12 col-md-3">
                <label for="">Nombre del producto</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Nombre del producto">
            </div>
            <div class="form-group col-sm-12 col-md-3">
                <label>Sub categoría</label>
                <select name="sub_category_id" class="form-control select2">
                    <option value="0" selected disabled>Escoger subcategoría</option>
                    @foreach ($subCategories as $subCategory)
                        <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                    @endforeach
                </select>
            </div> 
            <div class="form-group col-sm-12 col-md-2">
                <label for="">Orden</label>
                <input type="text" name="order" value="{{old('order')}}" class="form-control" placeholder="AA">
            </div>
            <div class="form-group col-sm-12 col-md-2 align-items-center d-flex flex-column">
                <label>Destacada ?</label>
                <input type="checkbox" name="outstanding" @if (old('outstanding')) checked @endif>
            </div> 
            <div class="form-group col-sm-12 col-md-2 align-items-center d-flex flex-column">
                <label>En oferta</label>
                <input type="checkbox" name="offers" @if (old('offers')) checked @endif>
            </div> 
            <div class="form-group col-sm-12">
                <label for="">Descripción</label>
                <textarea name="description" class="ckeditor" id="" cols="30" rows="10">{{old('description')}}</textarea>
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label>Ficha técnica</label>
                <input type="file" name="extra" class="form-control-file">
            </div> 
            <div class="w-100 mb-5"></div>
            <div class="form-group col-sm-12 col-md-4">
                <label for="">Material</label>
                <input type="text" name="material" value="{{old('material')}}" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label for="">Capacidad</label>
                <input type="text" name="capacity" value="{{old('capacity')}}" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label for="">Cantidad</label>
                <input type="text" name="amount" value="{{old('amount')}}" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label for="">Tapa</label>
                <input type="text" name="cover" value="{{old('cover')}}" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label for="">Color</label>
                <input type="text" name="color" value="{{old('color')}}" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label for="">Peso</label>
                <input type="text" name="weight" value="{{old('weight')}}" class="form-control">
            </div>
            <div class="form-group col-sm-12">
                <label for="">Info</label>
                <input type="text" name="info" value="{{old('info')}}" class="form-control">
            </div>
            <div class="w-100 mb-5"></div>
            @for ($i = 1; $i <= 3; $i++)
            <div class="form-group col-sm-12 col-md-4">
                <label for="image{{$i}}">imagen {{$i}} <small>imagen 288x250 px</small></label>
                <input type="file" name="images[]" class="form-control-file" id="image{{$i}}">
            </div>           
            @endfor
        </div>
      <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <meta name="root" content="{{ env('APP_URL') }}">
@stop
@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@stop

    