<div class="card">
    <div class="card-body">
        <h3 class="card-title"><strong>Nombre:</strong> {{ $personaje->nombre }}</h3><br>
        <p><strong>Participa en:</strong>
            @if($personaje->videojuegos->isNotEmpty())
                @foreach($personaje->videojuegos as $videojuego)
                    <span>{{ $videojuego->nombre }}</span><br>
                @endforeach
            @else
                N/A
            @endif
        </p>
        <p><strong>Edad:</strong> {{ $personaje->edad ?? '' }}</p>
        <p><strong>Género:</strong> {{ $personaje->genero ?? '' }}</p>
        <p>Historia: {{ $personaje->historia ?? '' }}</p>
    </div>
</div>