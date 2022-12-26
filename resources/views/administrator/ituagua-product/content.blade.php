@extends('adminlte::page')
@section('title', 'Ituagua')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Ituagua</h1>
        <a href="{{ route('ituagua-product.content.create') }}" class="btn btn-sm btn-primary">crear</a>
    </div>
@stop
@section('content')
@includeIf('administrator.partials.mensaje-exitoso')
@includeIf('administrator.partials.mensaje-error')
@isset($section1)
    <form action="{{ route('ituagua-product.update-info') }}" class="mb-5" method="post" data-asyn="no" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$section1->id}}">
        <div class="row">
            <div class="col-sm-12">
                <div class="">
                    @if (Storage::disk('custom')->exists($section1->image))
                        <img src="{{ asset($section1->image) }}" class="w-100" style="max-height: 200px; object-fit: cover;">  
                    @endif
                </div> 
                <div class="my-2">
                    <small>Tama&ntilde;o recomendado 1366x376px</small>
                    <input type="file" name="image" class="form-control-file">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group mb-2">
                    <input name="content_1" value="{{$section1->content_1}}" class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100 d-block my-3">Actualizar</button>
    </form>
@endisset
<div class="row mb-5">
    <div class="col-sm-12">
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Nombre</th>
                    <th>Descripci&oacute;n</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('ituagua-product.content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/ituagua-product/index.js?version=1') }}"></script>
@stop

