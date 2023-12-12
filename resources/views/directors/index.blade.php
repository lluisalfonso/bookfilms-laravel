@extends('layout')

@section('content')
    <h1>DIRECTORES</h1>

    <a href="{{ route('director.create') }}">Añadir director</a>

    <div>
        @if(session()->has('success'))
            <p>{{ session('success') }}</p>
        @endif
    </div>

    <div>
        <div class="row">
            <div class="col-6 text-start">
                {{ $directors->links() }}
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
                @foreach($directors as $director)
                    <tr>
                        <td>{{ $director->name }}</td>
                        <td>{{ $director->description }}</td>
                        <td>
                            @include('buttons.edit-btn', ['route' => 'director', 'object' => $director])
                        </td>
                        <td>
                            @include('buttons.delete-btn', ['route' => 'director', 'object' => $director])
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
