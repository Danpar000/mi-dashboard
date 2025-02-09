<div class="card">
    <div class="card-body">
        <h3 class="card-title"><strong>Título:</strong> {{ $videojuego->nombre }}</h3><br>
        <p><strong>Descripción:</strong> {{ $videojuego->descripcion ?? '' }}</p>
        <p><strong>Género:</strong> {{ $videojuego->genero ?? '' }}</p>
    </div>
</div>