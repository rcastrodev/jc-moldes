@extends('adminlte::page')
@section('title', 'Editar categoría')
@section('content')
@include('administrator.partials.mensaje-error')
<form action="{{ route('category.content.update', ['id' => $category->id]) }}" method="POST" enctype="multipart/form-data" class="row mb-5" data-sync="no">
    @csrf
    <input type="hidden" name="id" value="{{$category->id}}">
    <div class="col-sm-12 col-md-10">
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="name" placeholder="Nombre" value="{{ $category->name }}" class="form-control">
        </div>
    </div>
    <div class="col-sm-12 col-md-2">
        <div class="form-group">
            <label for="">Orden</label>
            <input type="text" name="order" placeholder="Orden" value="{{ $category->order }}" class="form-control">
        </div>
    </div>
    <div class="col-sm-12 mt-4">
        <button class="btn btn-primary w-100">Guardar</button>
    </div>
</form>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <meta name="root" content="{{route('category.content')}}">
@stop
@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
@stop