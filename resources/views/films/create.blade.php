@extends('layout')

@section('content')
    <h1 class="my-2">Gestor de películas</h1>
    <main>
        <h2>Nueva película</h2>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="my-2 border p-5" method="post" action="{{ route('film.store') }}">
        @csrf
        @method('post')

        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Título</label>
            <input type="text" class="up form-control col-sm-10" name="title" id="title" placeholder="Título">
        </div>

        <div class="form-group row">
            <label for="director_id" class="col-sm-2 col-form-label">Director</label>
            <select class="form-select" name="director_id" id="director_id">
                <option>
                </option>
                @foreach ($directors as $director)
                    <option id="director-{{ $director->id }}" value="{{ $director->id }}")>
                        {{ $director->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group row">
            <label for="rating" class="col-sm-2 col-form-label">Nota</label>
            <input type="text" class="up form-control col-sm-10" name="rating" id="rating" placeholder="¿Que nota le das?">
        </div>

        <div class="form-group row">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="has_seen" id="has_seen">
                <label for="has_seen" class="form-check-label">¿Ya la has visto?</label>
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Descripción</label>
            <input type="text" class="up form-control col-sm-10" name="description" placeholder="Descripción" id="description">
        </div>

        <div class="form-group row">
            <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
    </form>
    </main>
@endsection
