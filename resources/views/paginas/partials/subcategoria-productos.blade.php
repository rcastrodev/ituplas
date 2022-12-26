<div class="card producto">
    <div class="position-relative">  
        <a href="{{ route('subcategoria-productos', ['id'=> $c->id ]) }}" class="mas position-absolute text-decoration-none text-white" style="background-color: #fd0d1b8a;">+</a>
        @if (Storage::disk('custom')->exists($c->image))
            <img src="{{ asset($c->image) }}" class="img-fluid img-product">
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product">
        @endif
    </div>
    <div class="card-body align-items-center d-flex justify-content-center">
        <p class="card-text mb-0 fw-bold ps-2">
            <a href="{{ route('subcategoria-productos', ['id'=> $c->id ]) }}" class="font-size-21 text-center text-decoration-none d-block text-danger" style="font-weight: 500;">{{ $c->name }}</a>
        </p>
    </div>
</div>