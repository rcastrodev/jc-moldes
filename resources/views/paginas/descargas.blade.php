@extends('paginas.partials.app')
@section('content')
<div class="espacio-nav"></div>
<div class="py-5 bg-light">
    <div class="row container mx-auto">
        <div class="col-sm-12">
            <h1 class="font-size-36 mb-5" style="font-weight: 500">DESCARGAS</h1>
        </div>
        @foreach ($descargas as $item)
            <div class="col-sm-12 row mb-3">
                <div class="col-sm-12 col-md-5 px-0">
                    @if (Storage::disk('public')->exists($item->image))
                        <img src="{{ asset($item->image) }}" class="img-fluid w-100" style="height: 318px; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" class="img-fluid w-100" style="height: 318px; object-fit: cover;">
                    @endif
                </div>
                <div class="col-sm-12 col-md-7 bg-white px-0">
                    <div class="mt-5 mx-auto ms-4" style="width:95%;">
                        <h2 class="font-size-24">{{ $item->content_1 }}</h2>
                        <span class="text-red font-size-14">{{ $item->content_2 }}</span>
                        <div class="font-size-16 mt-4">{!! $item->content_3 !!}</div>
                        @if ($item->image2)
                            <a href="{{ route('descargar-archivo', ['id' => $item->id, 'reg' => 'image2']) }}" class="btn bg-red text-white text-uppercase d-block position-relative mb-2" style="border-radius:0; max-width:200px;">
                                DESCARGAR
                                <i class="fal fa-long-arrow-down position-absolute text-white" style="right: 20px; top: 9px;"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
@push('head')

@endpush
@push('scripts')	
@endpush
       
