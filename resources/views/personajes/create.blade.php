@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Crear Nuevo Personaje</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('personajes.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Personaje</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" class="form-control" id="edad" name="edad">{{ old('edad') }}</input>
            </div>

            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <select name="genero" id="genero" class="form-control">
                    <option value="F" {{ old('genero') == 'F' ? 'selected' : ''}}>Female</option>
                    <option value="M" {{ old('genero') == 'M' ? 'selected' : ''}}>Male</option>
                    <option value="Otro" {{ old('genero') == 'Otro' ? 'selected' : ''}}>Otro</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="historia" class="form-label">Historia</label>
                <textarea class="form-control" id="historia" name="historia" rows="3">{{ old('historia') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="videojuegos" class="form-label">Seleccionar Videojuego (Opcional, múltiple)</label>
                <select class="form-control" id="videojuegos" name="videojuegos[]" multiple>
                    @foreach($videojuegos as $videojuego)
                        <option value="{{ $videojuego->id }}" {{ in_array($videojuego->id, old('videojuegos', [])) ? 'selected' : '' }}>{{ $videojuego->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Personaje</button>
            <a href="{{ route('personajes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection