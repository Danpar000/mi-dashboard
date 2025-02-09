<h1>Lista de Videojuegos</h1>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Género</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($videojuegos as $videojuego)
            <tr>
                <td>{{ $videojuego->nombre }}</td>
                <td>{{ $videojuego->descripcion ?? 'N/A' }}</td>
                <td>{{ $videojuego->genero }}</td>
            </tr>
        @endforeach
    </tbody>
</table>