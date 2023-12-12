@extends('layout')

@section('content')
    <h1>Editar libro</h1>

    <div>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <form method="post" action="{{ route('book.update', $book) }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control"  name="title" placeholder="Título" id="title" value="{{ $book->title }}">
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Autor</label>
            <input type="text" class="form-control"  name="author" id="author" value="{{ $book->author_id }}">
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Nota</label>
            <input type="text" class="form-control"  name="rating" id="rating" value="{{ $book->rating }}">
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="has_readen" id="has_readen" @if($book->has_readen) checked @endif>
                <label for="has_readen" class="form-check-label">¿Ya lo has leído?</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <input type="text" class="form-control"  name="description" placeholder="Descripción" id="description" value="{{ $book->description }}">
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Editar">
        </div>
    </form>
@endsection
