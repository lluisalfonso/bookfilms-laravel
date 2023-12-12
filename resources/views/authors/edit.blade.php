@extends('layout')

@section('content')
    <h1>Editar autor</h1>
    <form method="post" action="{{ route('author.update', $author) }}">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="name" placeholder="Nombre" id="name" value="{{ $author->name }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <input type="text" class="form-control" name="description" placeholder="Descripción" id="description" value="{{ $author->description }}">
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Editar">
        </div>
    </form>
@endsection
