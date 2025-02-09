@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Editar Videojuego: {{ $videojuego->nombre }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('videojuegos.update', $videojuego) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Videojuego</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') ?? $videojuego->nombre }}" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') ?? $videojuego->descripcion }}">
            </div>

            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <select name="genero" id="genero" class="form-control" required>
                    <option value="accion" {{ old('genero', $videojuego->genero) == 'accion' ? 'selected' : '' }}>Acción</option>
                    <option value="aventura" {{ old('genero', $videojuego->genero) == 'aventura' ? 'selected' : '' }}>Aventura</option>
                    <option value="sci-fi" {{ old('genero', $videojuego->genero) == 'sci-fi' ? 'selected' : '' }}>Sci-Fi</option>
                    <option value="terror" {{ old('genero', $videojuego->genero) == 'terror' ? 'selected' : '' }}>Terror</option>
                    <option value="novela" {{ old('genero', $videojuego->genero) == 'novela' ? 'selected' : '' }}>Novela Visual</option>
                    <option value="puzzle" {{ old('genero', $videojuego->genero) == 'puzzle' ? 'selected' : '' }}>Puzzle</option>
                    <option value="plataformas" {{ old('genero', $videojuego->genero) == 'plataformas' ? 'selected' : '' }}>Plataformas</option>
                    <option value="otro" {{ old('genero', $videojuego->genero) == 'otro' ? 'selected' : '' }}>Otro</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Videojuego</button>
            <a href="{{ route('videojuegos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
