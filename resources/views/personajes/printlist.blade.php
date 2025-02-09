<h1>Lista de Personajes</h1>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Género</th>
            <th>Participa en</th>
            <th>Historia</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($personajes as $personaje)
            <tr>
                <td>{{ $personaje->nombre }}</td>
                <td>{{ $personaje->edad ?? 'N/A' }}</td>
                <td>{{ $personaje->genero }}</td>
                <td>
                    @if($personaje->videojuegos->isNotEmpty())
                        @foreach($personaje->videojuegos as $videojuego)
                            <span>{{ $videojuego->nombre }}</span><br>
                        @endforeach
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ Str::limit($personaje->historia, 100) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>