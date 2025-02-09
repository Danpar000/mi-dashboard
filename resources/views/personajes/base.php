<!-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

 -->


<!-- @extends('layouts.app')

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
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="videojuego_id" class="form-label">Videojuego</label>
                <select class="form-control" id="videojuego_id" name="videojuego_id" required>
                    <option value="">Selecciona un videojuego</option>
                    @foreach ($videojuegos as $videojuego)
                        <option value="{{ $videojuego->id }}">{{ $videojuego->titulo }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Personaje</button>
            <a href="{{ route('personajes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection -->
