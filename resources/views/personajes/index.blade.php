@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Personajes</h1>
    <form action="{{ route('personajes.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('personajes.create') }}" class="btn btn-primary mb-3">Añadir Personaje</a>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="search" placeholder="Buscar por nombre" value="{{ request()->query('search') }}">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="game" placeholder="Buscar por Juego" value="{{ request()->query('game') }}">
            </div>
            <div class="col-md-2">
                <select class="form-control" name="genero">
                    <option value="">Seleccionar género</option>
                    <option value="F" {{ request()->query('genero') == 'F' ? 'selected' : '' }}>Femenino</option>
                    <option value="M" {{ request()->query('genero') == 'F' ? 'selected' : '' }}>Masculino</option>
                    <option value="otro" {{ request()->query('genero') == 'otro' ? 'selected' : '' }}>Otro</option>
                </select>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('personajes.printlist') }}" class="btn btn-primary">Imprimir Todos</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Participa en Juego</th>
                <th>Edad</th>
                <th>Género</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personajes as $personaje)
                <tr>
                    <td>{{ $personaje->nombre }}</td>
                    <td>
                        @if($personaje->videojuegos->isNotEmpty())
                            @foreach($personaje->videojuegos as $videojuego)
                                <span>{{ $videojuego->nombre }}</span><br>
                            @endforeach
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $personaje->edad }}</td>
                    <td>{{ $personaje->genero }}</td>
                    <td>
                        <a href="{{ route('personajes.show', $personaje) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('personajes.edit', $personaje) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('personajes.destroy', $personaje) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <a href="{{ route('personajes.report', $personaje) }}" class="btn btn-success">Imprimir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $personajes->links() }}
</div>
@endsection
