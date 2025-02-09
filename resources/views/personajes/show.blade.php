@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Personaje</h1>
    <a href="{{ route('personajes.index') }}" class="btn btn-secondary mb-3">Volver a la lista</a>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title"><strong>Nombre:</strong> {{ $personaje->nombre }}</h3><br>
            <p><strong>Participa en:</strong>
                @if($videojuegos->isNotEmpty())
                    <ul>
                        @foreach($videojuegos as $videojuego)
                            <li>{{ $videojuego->nombre }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No participa en ningún videojuego.</p>
                @endif
            </p>
            <p><strong>Edad:</strong> {{ $personaje->edad ?? '' }}</p>
            <p><strong>Género:</strong> {{ $personaje->genero ?? '' }}</p>
            <p><strong>Historia:</strong> {{ $personaje->historia ?? '' }}</p>
            <div class="mt-3">
                <a href="{{ route('personajes.edit', $personaje) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('personajes.destroy', $personaje) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
