@extends('layout')

@section('content')
    <h1>Editar película</h1>
    <form method="post" action="{{ route('film.update', $film) }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" name="title" placeholder="Título" id="title" value="{{ $film->title }}">
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Autor</label>
            <input type="text" class="form-control" name="author" id="author" value="{{ $film->author_id }}">
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Nota</label>
            <input type="text" class="form-control" name="rating" id="rating" value="{{ $film->rating }}">
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="has_seen" id="has_seen" @if($film->has_seen) checked @endif>
                <label for="has_seen" class="form-check-label">¿Ya la has visto?</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <input type="text" class="form-control" name="description" placeholder="Descripción" id="description" value="{{ $film->description }}">
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Editar">
        </div>
    </form>
@endsection
