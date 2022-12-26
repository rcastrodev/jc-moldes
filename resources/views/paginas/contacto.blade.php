@extends('paginas.partials.app')
@section('content')
<div class="espacio-nav"></div>
<div class="py-5 bg-light">
    <div class="container mx-auto">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
        @endif
        @if (Session::has('mensaje'))
            <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('mensaje') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>                    
        @endif
        <form action="{{ route('send-contact') }}" method="post" class="mb-5">
            @csrf
            <div class="row justify-content-between">
                <div class="col-sm-12 col-md-3 font-size-14">
                    <h1 class="text-uppercase font-size-36 mb-4">Contacto</h1>
                    <div class="font-size-16 fw-light mb-4">Para mayor información, no dude en contactarse mediante el siguiente formulario, o a través de nuestras vías de comunicación.</div> 
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-map-marker-alt text-red d-block me-3"></i><span class="d-block"> {{ $data->address }}</span>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-phone-alt text-red d-block me-3"></i>
                        @php $phone = Str::of($data->phone1)->explode('|') @endphp
                        @if (count($phone) == 2)
                            <a href="tel:{{ $phone[0] }}" class="underline text-dark text-decoration-none">{{ $phone[1] }}</a>
                        @else 
                            <a href="tel:{{ $data->phone1 }}" class="underline text-dark text-decoration-none">{{ $data->phone1 }}</a>
                        @endif        
                    </div> 
                    @if ($data->phone3)
                        @php $phone3 = Str::of($data->phone3)->explode('|') @endphp
                        <div class="d-flex align-items-center mb-4">
                            <i class="fab fa-whatsapp text-red d-block me-3"></i>
                            @if(count($phone3) == 2)
                                <a href="https://wa.me/{{$phone3[0]}}" class="underline text-dark text-decoration-none">{{ $phone3[1] }}</a>
                            @else
                                <a href="https://wa.me/{{$data->phone3}}" class="underline text-dark text-decoration-none">{{ $data->phone3 }}</a>
                            @endif
                        </div>
                    @endif
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-envelope text-red d-block me-3"></i><span class="d-block"></span>  
                        <div class="">
                            <a href="mailto:{{ $data->email }}" class="underline text-dark text-decoration-none">{{ $data->email }}</a><br> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="d-block mb-2" style="font-weight: 400;">Nombre *</label>
                                <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control font-size-14 input-fondo">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <label class="d-block mb-2" style="font-weight: 400;">Apellido</label>
                                <input type="text" name="apellido" value="{{ old('apellido') }}" class="form-control font-size-14 input-fondo">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="d-block mb-2" style="font-weight: 400;">Email *</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control font-size-14 input-fondo">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="d-block mb-2" style="font-weight: 400;">Teléfono *</label>
                                <input type="tel" name="telefono" value="{{ old('telefono') }}" class="form-control font-size-14 input-fondo">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <label class="d-block mb-2" style="font-weight: 400;">Mensaje</label>
                                <textarea name="mensaje" class="form-control font-size-14 input-fondo" cols="30" rows="5">
                                    {{ old('mensaje') }}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-group pt-4">{!! app('captcha')->display() !!}</div>
                        </div>
                        <div class="col-sm-12 mb-sm-3 mb-sm-3 text-sm-center text-md-end">
                            <span class="me-3" style="color: #454545;">*Campos Obligatorios</span>
                            <button type="submit" class="btn bg-red font-size-14 py-2 mb-sm-3 mb-md-0 text-white px-5">ENVIAR MENSAJE</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3285.640066992083!2d-58.51886418497779!3d-34.562667580470176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb7209caaa60b%3A0xd76d0acbe0d8c359!2sEcheverr%C3%ADa%201195%20b1650%2C%20Villa%20Maip%C3%BA%2C%20Provincia%20de%20Buenos%20Aires%2C%20Argentina!5e0!3m2!1ses!2sve!4v1659102414477!5m2!1ses!2sve" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-100" style="height:450px;"></iframe>
    </div>
</div>
@endsection
@push('head')
@endpush
@push('scripts')	
@endpush
       

