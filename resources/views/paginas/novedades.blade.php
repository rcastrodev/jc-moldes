@extends('paginas.partials.app')
@section('content')
<div class="espacio-nav"></div>
<div class="py-5 bg-light">
    <div class="row container mx-auto">
        <div class="col-sm-12">
            <h1 class="font-size-36 mb-5" style="font-weight: 500">NOVEDADES</h1>
        </div>
        @foreach ($news as $n)
            <div class="col-sm-12 col-lg-4 mb-4">
                @includeIf('paginas.partials.novedad', ['e' => $n])
            </div>			
        @endforeach
    </div>
</div>
@endsection
@push('head')

@endpush
@push('scripts')	
@endpush
       
