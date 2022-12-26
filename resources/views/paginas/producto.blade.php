@extends('paginas.partials.app')
@section('content')
<div class="espacio-nav"></div>
<div class="py-5 bg-light">
    <div class="row container mx-auto mb-5">
        <div aria-label="breadcrumb" class="py-2 font-size-15 col-sm-12 mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('index') }}" class="text-decoration-none text-black">Inicio</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('productos') }}" class="text-decoration-none text-black">Productos</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('categoria', ['id' => $producto->category->id]) }}" class="text-decoration-none text-black">{{ $producto->category->name }}</a>
                    </li>
                    <li class="breadcrumb-item active fw-bold text-black" aria-current="page">{{ $producto->name }}</li>
                </ol>
            </div>
        </div>
        <div class="col-sm-12 col-md-8">
            <div class="mb-2 bg-white">
                @if (count($producto->images))
                    <img src="{{ asset($producto->images()->first()->image) }}" id="imagen-actual" class="img-fluid w-100 img-product" style="">
                @else
                    <img src="{{ asset('images/default.jpg') }}" id="imagen-actual" class="img-fluid w-100 img-product">
                @endif  
            </div>
            @if (count($producto->images()->where('name', 'image')->get()))
                <ul class="d-flex flex-wrap p-0" style="list-style: none;">
                    @foreach ($producto->images()->where('name', 'image')->orderBy('order', 'ASC')->get() as $i)
                        <li class="me-2">
                            <img src="{{ asset($i->image) }}" class="img-fluid imagenes" style="height: 79px; width:79px; object-fit: cover; cursor:pointer;">
                        </li>                
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="col-sm-12 col-md-4">
            <span>{{ $producto->category->name }}</span>
            <h1 class="font-size-30 mt-2 mb-4">{{ $producto->name }}</h1>
            <div class="ul-style mb-4">{!! $producto->description !!}</div>
            <a href="{{ route('contacto') }}" class="d-block w-100 bg-red text-white py-2 btn text-uppercase position-relative" style="border-radius: 0">
                consultar
                <i class="fal fa-long-arrow-right position-absolute text-white" style="right: 20px; top: 11px;"></i>
            </a>
        </div>
    </div>
    <div class="row container mx-auto mb-5">
        <div class="col-sm-12 mb-4">
            <h4 class="font-size-24" style="font-weight:500">Aplicaciones</h4>
        </div>
        @if (count($producto->images))
            @foreach ($producto->images()->where('name', 'application')->orderBy('order', 'ASC')->get() as $applicaction)
                <div class="col-sm-12 col-md-6 mb-4">
                    @if (Storage::disk('public')->exists($applicaction->image))
                        <img src="{{ asset($applicaction->image) }}" class="img-fluid w-100" style="height: 360px;">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" class="img-fluid w-100" style="height: 360px;">
                    @endif
                </div>                 
            @endforeach
        @endif
    </div>
    <div class="row container mx-auto mb-5">
        <div class="col-sm-12 mb-4">
            <h4 class="font-size-24" style="font-weight:500">Productos Relacionados</h4>
        </div>
        @foreach ($producto->category->products->where('id', '<>', $producto->id) as $k => $pr)
            @if ($k == 5) @break @endif
            <div class="col-sm-12 col-md-4 col-lg-3 mb-4">
                @includeIf('paginas.partials.producto', ['p' => $pr])
            </div>
        @endforeach
    </div>
</div>
@endsection
@push('head')
    <style>
        .ul-style ul{
            list-style: none;
            padding: 0
        }
    </style>
@endpush
@push('scripts')
<script>
    $('.imagenes').click(function (e){
        e.preventDefault()
        $('#imagen-actual').attr('src', e.target.src)
    })
</script>
@endpush


       
