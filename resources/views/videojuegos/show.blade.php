@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Videojuego</h1>
    <a href="{{ route('videojuegos.index') }}" class="btn btn-secondary mb-3">Volver a la lista</a>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title"><strong>Título:</strong> {{ $videojuego->nombre }}</h3><br>
            <p><strong>Descripción:</strong> {{ $videojuego->descripcion ?? '' }}</p>
            <div class="mt-3">
                <a href="{{ route('videojuegos.edit', $videojuego) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('videojuegos.destroy', $videojuego) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
