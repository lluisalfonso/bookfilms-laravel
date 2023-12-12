<form method="post" action="{{ route($route . '.delete', $object) }}">
    @csrf
    @method('delete')
    <input class="delete-btn" type="image" src="{{ asset('images/buttons/delete.png') }}" alt="Eliminar">
</form>
