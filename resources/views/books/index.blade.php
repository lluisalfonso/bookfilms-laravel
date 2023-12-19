@extends('layout')

@section('content')
    <h1>LIBROS</h1>

    <a href="{{ route('book.create') }}">Añadir libro</a>

    <div>
        @if(session()->has('success'))
            <p>{{ session('success') }}</p>
        @endif
    </div>

    <div>
        <div class="row">
            <div class="col-6 text-start">
                {{ $books->links() }}
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Nota</th>
                <th>Descripcion</th>
                <th>Leído</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name ?? '' }}</td>
                    <td>
                        @if($book->rating)
                            {{ $book->rating }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $book->description }}</td>
                    <td>
                        @if($book->has_readen)
                            Leído
                        @else
                            Pendiente
                        @endif
                    </td>
                    <td>
                        @include('buttons.edit-btn', ['route' => 'book', 'object' => $book])
                    </td>
                    <td>
                        @include('buttons.delete-btn', ['route' => 'book', 'object' => $book])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
