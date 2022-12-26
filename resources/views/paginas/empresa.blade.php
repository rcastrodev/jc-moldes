@extends('paginas.partials.app')
@section('content')
<div class="espacio-nav"></div>
@isset($section1)
	<section id="section1" class="bg-black py-4">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-sm-12 col-md-5 text-white">
					<h3 class="font-size-36 mb-sm-3 mb-md-5">{{$section1->content_1}}</h3>
					<div class="fw-light font-size-18">{!! $section1->content_2 !!}</div>
				</div>
				<div class="col-sm-12 col-md-6 mb-sm-4 mb-md-0">
					@if (Storage::disk('public')->exists($section1->image))
						<img src="{{ asset($section1->image) }}" class="img-fluid">
					@endif
				</div>
			</div>
		</div>
	</section>	
@endisset
@isset($sections2)
	@if (count($sections2))
		<div class="bg-light py-5">
			<div class="row container mx-auto mb-5">
				<div class="col-sm-12">
					<h3 class="mb-5" style="font-weight:500">NUESTROS VALORES</h3>
				</div>
				@foreach ($sections2 as $s2)
					<div class="col-sm-12 col-md-4 mb-sm-4 mb-md-0">
						<div class="card-valores bg-white py-5 px-3 text-center">
							@if (Storage::disk('public')->exists($s2->image))
								<img src="{{ asset($s2->image) }}" class="img-fluid d-block mx-auto mb-4" style="min-height: 54px; max-height: 54px;">
							@else
								<div class="mb-4" style="min-height: 54px; max-height: 54px;"></div>
							@endif
							<h4 class="mb-3 font-size-20 text-uppercase">{{ $s2->content_1 }}</h4>
							<div class="font-size-16">{!! $s2->content_2 !!}</div>
						</div>
					</div>			
				@endforeach
			</div>
		</div>
	@endif
@endisset
@endsection
