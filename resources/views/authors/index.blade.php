@extends('layout')

@section('content')
    <h1>AUTORES</h1>

    <a href="{{ route('author.create') }}">Añadir autor</a>

    <div>
        @if(session()->has('success'))
            <p>{{ session('success') }}</p>
        @endif
    </div>

    <div>
        <div class="row">
            <div class="col-6 text-start">
                {{ $authors->links() }}
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->description }}</td>
                        <td>
                            @include('buttons.edit-btn', ['route' => 'author', 'object' => $author])
                        </td>
                        <td>
                            @include('buttons.delete-btn', ['route' => 'author', 'object' => $author])
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
