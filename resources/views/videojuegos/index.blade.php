@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Videojuegos</h1>
    <form action="{{ route('videojuegos.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('videojuegos.create') }}" class="btn btn-primary mb-3">Añadir Videojuego</a>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" name="search" placeholder="Buscar por nombre" value="{{ request()->query('search') }}">
            </div>
            <div class="col-md-4">
                <select class="form-control" name="genero">
                    <option value="">Seleccionar género</option>
                    <option value="accion" {{ request()->query('genero') == 'Acción' ? 'selected' : '' }}>Acción</option>
                    <option value="aventura" {{ request()->query('genero') == 'aventura' ? 'selected' : '' }}>Aventura</option>
                    <option value="sci-fi" {{ request()->query('genero') == 'sci-fi' ? 'selected' : '' }}>Sci-Fi</option>
                    <option value="terror" {{ request()->query('genero') == 'terror' ? 'selected' : '' }}>Terror</option>
                    <option value="aventura" {{ request()->query('genero') == 'aventura' ? 'selected' : '' }}>Aventura</option>
                    <option value="novela" {{ request()->query('genero') == 'novela' ? 'selected' : '' }}>Novela</option>
                    <option value="puzzle" {{ request()->query('genero') == 'puzzle' ? 'selected' : '' }}>Puzzle</option>
                    <option value="plataformas" {{ request()->query('genero') == 'plataformas' ? 'selected' : '' }}>Plataformas</option>
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

    <a href="{{ route('videojuegos.printlist') }}" class="btn btn-primary">Imprimir Todos</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Género</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videojuegos as $videojuego)
                <tr>
                    <td>{{ $videojuego->nombre }}</td>
                    <td>{{ $videojuego->genero }}</td>
                    <td>
                        <a href="{{ route('videojuegos.show', $videojuego) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('videojuegos.edit', $videojuego) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('videojuegos.destroy', $videojuego) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <a href="{{ route('videojuegos.report', $videojuego) }}" class="btn btn-success">Imprimir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $videojuegos->links() }}
</div>
@endsection
