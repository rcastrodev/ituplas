<div class="card producto">
    <div class="position-relative">  
        <a href="{{ route('subcategoria-ituhielo', ['id'=> $c->id ]) }}" class="mas position-absolute text-decoration-none text-white" style="background-color: #6582A3; opacity: 0.7;">+</a>
        @if (Storage::disk('custom')->exists($c->image))
            <img src="{{ asset($c->image) }}" class="img-fluid img-product" style="object-fit: cover !important">
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product" style="object-fit: cover !important">
        @endif
    </div>
    <div class="card-body align-items-center d-flex justify-content-center">
        <p class="card-text mb-0 fw-bold ps-2">
            <a href="{{ route('subcategoria-ituhielo', ['id'=> $c->id ]) }}" class="font-size-21 text-center text-decoration-none d-block text-blue" style="font-weight: 500;">{{ $c->name }}</a>
        </p>
    </div>
</div>