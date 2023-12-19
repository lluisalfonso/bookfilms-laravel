@extends('layout')

@section('content')
    <h1>Introducir nuevo libro</h1>

    <div>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <form class="my-2 border p-5" method="post" action="{{ route('book.store') }}">
        @csrf
        @method('post')

        <div class="form-group row mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" name="title" placeholder="Título" id="title">
        </div>

        <div class="form-group row mb-3">
            <label for="author_id"class="form-label">Autor</label>
            <select class="form-select" name="author_id" id="author_id">
                <option>
                </option>
                @foreach ($authors as $author)
                    <option id="author-{{ $author->id }}" value="{{ $author->id }}")>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group row mb-3">
            <label for="rating"class="form-label">Nota</label>
            <input type="text" class="form-control" name="rating" id="rating">
        </div>

        <div class="form-group row mb-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="has_readen" id="has_readen">
                <label for="has_readen" class="form-check-label">¿Ya lo has leído?</label>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="description"class="form-label">Descripción</label>
            <input type="text" class="form-control" name="description" placeholder="Descripción" id="description">
        </div>

        <div class="form-group row mb-3">
            <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
    </form>
@endsection
