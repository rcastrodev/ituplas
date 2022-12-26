@extends('adminlte::page')
@section('title', 'Contenido home')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido del home</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear Slider</button>
    </div>
@stop
@section('content')

    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')

    <div class="row mb-5">
        <div class="col-sm-12">
            <h3>Sliders</h3>
            <table id="page_table_slider" class="table">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Imagen</th>
                        <th>Contenido</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @isset($section2)
        <form action="{{ route('home.update-info') }}" class="mb-5" method="post" data-asyn="no" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$section2->id}}">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="">
                        @if (Storage::disk('custom')->exists($section2->image))
                            <img src="{{ asset($section2->image) }}" class="img-fluid d-block mx-auto img-fluid">  
                        @endif
                    </div> 
                    <div class="my-2">
                        <small>la imagen debe ser al menos 668x466</small>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group mb-2">
                        <input name="content_1" value="{{$section2->content_1}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea name="content_2" class="ckeditor" cols="30" rows="10" >{{$section2->content_2}}</textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 d-block my-3">Actualizar</button>
        </form>
    @endisset
@includeIf('administrator.home.modals.create')
@includeIf('administrator.home.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('home.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/home/index.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $('.eliminar').click(function(e){
            e.preventDefault();
            axios.post(e.target.dataset.url).then(r => {
                e.target.textContent = 'Eliminado'
                setTimeout(() => {
                    location.reload()
                }, 1500);
        }).catch(error => console.error(error))
            
        })
    </script>
@stop

