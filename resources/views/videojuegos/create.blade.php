@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Crear Nuevo Videojuego</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('videojuegos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Videojuego</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') }}">
            </div>

            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <select name="genero" id="genero" class="form-control" required>
                    <option value="accion" {{ old('genero') == 'accion' ? 'selected' : '' }}>Acción</option>
                    <option value="aventura" {{ old('genero') == 'aventura' ? 'selected' : '' }}>Aventura</option>
                    <option value="sci-fi" {{ old('genero') == 'sci-fi' ? 'selected' : '' }}>Sci-Fi</option>
                    <option value="terror" {{ old('genero') == 'terror' ? 'selected' : '' }}>Terror</option>
                    <option value="novela" {{ old('genero') == 'novela' ? 'selected' : '' }}>Novela Visual</option>
                    <option value="puzzle" {{ old('genero') == 'puzzle' ? 'selected' : '' }}>Puzzle</option>
                    <option value="plataformas" {{ old('genero') == 'plataformas' ? 'selected' : '' }}>Plataformas</option>
                    <option value="otro" {{ old('genero') == 'otro' ? 'selected' : '' }}>Otro</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Videojuego</button>
            <a href="{{ route('videojuegos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
