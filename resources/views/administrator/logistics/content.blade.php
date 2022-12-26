@extends('adminlte::page')
@section('title', 'Contenido logísitica')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido de logísitica</h1>
    </div>
@stop
@section('content')

@includeIf('administrator.partials.mensaje-exitoso')
@includeIf('administrator.partials.mensaje-error')
@isset($section1)
    <form action="{{ route('logistics.content.updateInfo') }}" class="mb-5" method="post" data-asyn="no" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$section1->id}}">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="">
                    @if (Storage::disk('custom')->exists($section1->image))
                        <img src="{{ asset($section1->image) }}" class="img-fluid d-block mx-auto img-fluid">  
                    @endif
                    <div class="my-2">
                        <small>Tamaño de imagen recomendado 668x466px</small>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    
                </div> 
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <input name="content_1" value="{{$section1->content_1}}" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="content_2" class="ckeditor" cols="30" rows="10">{{$section1->content_2}}</textarea>
                </div>
            </div>
        </div>
        <button class="btn btn-primary w-100">Actualizar</button>
    </form>  
@endisset
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('logistics.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
@stop

