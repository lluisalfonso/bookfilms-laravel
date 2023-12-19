@extends('layout')

@section('content')
    <h1>PELÍCULAS</h1>

    <a href="{{ route('film.create') }}">Añadir película</a>

    <div>
        @if(session()->has('success'))
            <p>{{ session('success') }}</p>
        @endif
    </div>
    <div>
        <div class="row">
            <div class="col-6 text-start">
                {{ $films->links() }}
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
            @foreach($films as $film)
                <tr>
                    <td>{{ $film->title }}</td>
                    <td>{{ $film->director->name ?? '' }}</td>
                    <td>
                        @if($film->rating)
                            {{ $film->rating }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $film->description }}</td>
                    <td>
                        @if($film->has_seen)
                            Vista
                        @else
                            Pendiente
                        @endif
                    </td>
                    <td>
                        @include('buttons.edit-btn', ['route' => 'film', 'object' => $film])
                    </td>
                    <td>
                        @include('buttons.delete-btn', ['route' => 'film', 'object' => $film])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
