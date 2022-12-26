@extends('paginas.partials.app')
@section('content')
@if(count($sliders))
	<div id="sliderHero" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			@foreach ($sliders as $k => $item)
				<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>			
			@endforeach
		</div>
		<div class="carousel-inner" style="box-shadow: -1px -1px 14px #00000014;">
			@foreach ($sliders as $key => $slider)
				<div class="carousel-item @if(!$key) active @endif" style="background-image: url({{$slider->image}}); background-repeat: no-repeat; background-size: cover; background-position: center;">
					<div class="container mx-auto contentHero">
						<div class="mt-sm-2 text-start text-black" style="max-width: 500px !important;">
							<h1 class="font-size-58  hero-content-slider mb-sm-2 mb-md-5 fw-bold" style="max-width: 479px;">{{ $slider->content_1 }}</h1>
							<p class="hero-content-slider font-size-19 d-sm-none d-xl-block mb-5" style="font-weight: 400">{{ $slider->content_2 }}</p>
							<a href="{{ route('productos') }}" class="btn bg-red text-white py-2 px-5 text-uppercase font-size-17" style="border-radius: 0;">Ver más</a>
						</div>
					</div>
				</div>			
			@endforeach
		</div>	
	</div>	
@endif
@isset($products)
@if (count($products))
	<div class="bg-light py-5" style="overflow-x: hidden;">
		<div class="row container mx-auto mt-sm-0 mt-md-5">
			<div class="col-sm 12-col-md-6">
				<h3 class="text-dark text-center fw-bold font-size-32 mb-5">PRODUCTOS DESTACADOS</h3>
			</div>
		</div>
		<div class="container mx-auto px-0 slick">
			@foreach ($products as $p)
				<div class="card-slick">
					@includeIf('paginas.partials.producto', ['p' => $p])
				</div>
			@endforeach		
		</div>
	</div>
@endif
@endisset
@isset($section2)
	<section id="section2" class="bg-black py-3">
		<div class="row container mx-auto">
			<div class="col-sm-12 col-md-6 d-flex align-items-center justify-content-center px-0 py-sm-2 py-md-0">
				<div class="text-white" style="max-width: 95%">
					<h3 class="font-size-30 mt-md-4 mt-sm-0 mb-4" style="font-weight: 500">{{ $section2->content_1 }}</h3>
					<div class="font-size-18 mb-5" style="font-weight: 400">{!! $section2->content_2 !!}</div>
					<a href="{{ route('empresa') }}" class="text-uppercase btn bg-red text-white py-2 px-5" style="border-radius: 0;">ver más</a>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 px-0 d-sm-none d-md-flex align-items-center">
				@if (Storage::disk('public')->exists($section2->image))
					<img src="{{Storage::disk('public')->url($section2->image)}}" class="img-fluid w-100" style="height:436px;">
				@endif
			</div>
		</div>
	</section>
@endisset
@if($data->news)
	@isset($news)
		@if (count($news))
			<div class="py-5 bg-light">
				<div class="row container mx-auto mb-5">
					<div class="col-sm 12-col-md-6">
						<h3 class="text-dark fw-bold font-size-30 text-center text-uppercase" style="font-weight: 500;">Novedades</h3>
					</div>
				</div>
				<div class="row container mx-auto mb-5">
					@foreach ($news as $n)
						<div class="col-sm-12 col-md-6 col-lg-4 mb-sm-4 mb-md-0">
							@includeIf('paginas.partials.novedad', ['e' => $n])
						</div>			
					@endforeach
				</div>
			</div>
		@endif
	@endisset
@endif

@endsection
@push('head')
	<link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/slick/slick-theme.css') }}">
	<style>
		@media(min-width:992px){
			#section2 .row{
				min-height: 540px;
			}
		}
		.slick-list .card.producto{
			margin-right: 10px;
		}
		.slick-dots li{
			margin-right: 10px;
		}
		.slick-dots li button:before{
			content: '';
			width: 30px;
			height: 5px;
			background-color: #F6303E;
		}
		.slick-next:before{
			content: url("{{ asset('images/right.svg') }}")  !important;
		}
		.slick-prev:before{
			content: url("{{ asset('images/left.svg') }}")  !important;
		}
		.slick-dots {
			bottom: -55px;
		}

	</style>
	
@endpush
@push('scripts')
	<script src="{{ asset('vendor/slick/slick.js') }}"></script>
	<script>
		$('.slick').slick({
			dots: true,
			infinite: false,
			speed: 300,
			slidesToShow: 4,
			slidesToScroll: 4,
			responsive: [
				{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					infinite: true,
					dots: true
				}
				},
				{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
				},
				{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
				}
			]
		});
	</script>
@endpush

