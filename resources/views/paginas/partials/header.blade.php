<div class="fixed-top">
    <header class="header bg-red d-sm-none d-lg-block">
        <div class="container d-flex justify-content-between align-items-center py-2">
            <div class="d-flex font-size-14">
                <div class="d-flex align-items-center ms-3">
                    <i class="fas fa-envelope text-white d-block me-2" style="font-size: 20px;"></i><span class="d-block"></span>
                    <div class="text-start">
                        <a href="mailto:{{ $data->email }}" class="text-white text-decoration-none underline font-size-14 fw-light">{{ $data->email }}</a>        
                    </div>     
                </div>
            </div>
            <div class="">
                @if ($data->facebook)
                    <a href="{{$data->facebook}}" class="me-3"><i class="fab fa-facebook-f text-white"></i></a>
                @endif
                @if ($data->instagram)
                    <a href="{{$data->facebook}}" class="me-3"><i class="fab fa-instagram text-white"></i></a>
                @endif
                @if ($data->pinterest)
                    <a href="{{$data->facebook}}" class=""><i class="fab fa-pinterest text-white"></i></a>
                @endif
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light w-100 py-md-4 py-sm-1 text-uppercase bg-white">
        <div class="container">
            <a class="navbar-brand d-flex" href="{{ route('index') }}">
                <img src="{{ asset($data->logo_header) }}" class="img-fluid logo-header d-block me-2">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end bg-white" id="navbarNav">
                <ul class="navbar-nav position-relative align-items-center justify-content-between">
                    
                    <li class="nav-item me-sm-0 me-md-4 @if(Request::is('empresa')) position-relative @endif">
                        <a class="nav-link font-size-16 text-black @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">Empresa</a>
                    </li>
                    <li class="nav-item me-sm-0 me-md-4 @if(Request::is('productos') || Request::is('producto/*')) position-relative @endif">
                        <a class="nav-link font-size-16 text-black @if(Request::is('productos') || Request::is('producto/*')) active @endif" href="{{ route('productos') }}">Productos</a>
                    </li>
                    @if ($data->news)
                        <li class="nav-item me-sm-0 me-md-4 @if(Request::is('novedades') || Request::is('novedad/*')) position-relative @endif">
                            <a class="nav-link font-size-16 text-black @if(Request::is('novedades') || Request::is('novedad/*')) active @endif" href="{{ route('novedades') }}" >Novedades</a>
                        </li>         
                    @endif
                    <li class="nav-item me-sm-0 me-md-4 @if(Request::is('descargas')) position-relative @endif">
                        <a class="nav-link font-size-16 text-black @if(Request::is('descargas')) active @endif" href="{{ route('descargas') }}" >Descargas</a>
                    </li> 
                    <li class="nav-item me-sm-0 me-md-4 @if(Request::is('contacto')) position-relative @endif">
                        <a class="nav-link font-size-16 text-black @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >Contacto</a>
                    </li>
                    <li class="nav-item me-sm-0 me-md-4 d-sm-none d-md-block">
                        <a href="{{ route('productos') }}"><i class="fal fa-search text-black font-size-16"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>  
</div>


