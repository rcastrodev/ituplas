<a href="{{ route('subcategoria-ituagua-producto', ['product'=> $p->id ]) }}" class="card producto d-block text-decoration-none">
    <div class="position-relative">  
        @if ($p->offers)
            <span class="text-uppercase bg-danger text-white d-inline-block py-1 ps-2 pe-3 font-size-15 position-absolute" style="top: 20px;
            border-radius: 0 20px 20px 0;">Oferta</span>
        @elseif($p->isNew() && !$p->outstanding)
            <span class="text-uppercase bg-blue text-white d-inline-block py-1 ps-2 pe-3 font-size-15 position-absolute" style="top: 20px;
            border-radius: 0 20px 20px 0;">nuevo</span>
        @endif
        <div class="mas position-absolute text-decoration-none text-white" style="font-size: 70px; font-weight: 600; background-color: #005ba875;">+</div>
        @if (count($p->images))
            <img src="{{ asset($p->images()->first()->image) }}" class="img-fluid img-product" >
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product">
        @endif
    </div>
    <div class="card-body">
        <h6 class="font-size-21 text-dark fw-light">{{ $p->name }}</h6>
    </div>
</a>