@extends('layout')

@section('content')
    <h1>Introducir nuevo autor</h1>
    <form method="post" action="{{ route('author.store') }}">
        @csrf
        @method('post')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="name" placeholder="Nombre" id="name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <input type="text" class="form-control" name="description" placeholder="Descripción" id="description">
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
    </form>
@endsection
