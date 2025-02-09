<?php

namespace App\Http\Controllers;

use App\Models\Personaje;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class PersonajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Personaje::query();

        if ($search = $request->input('search')) {
            $query->where('nombre', 'like', '%' . $search . '%');
        }

        if ($juego = $request->input('game')) {
            $query->whereHas('videojuegos', function ($q) use ($juego) {
                $q->where('nombre', $juego);
            });
        }

        if ($genero = $request->input('genero')) {
            $query->where('genero', 'like', '%' . $genero . '%');
        }

        $personajes = $query->paginate(10);

        return view('personajes.index', compact('personajes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $videojuegos = \App\Models\VideoJuego::all();
        return view('personajes.create', compact('videojuegos'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'edad' => 'nullable|integer',
            'genero' => 'required|in:F,M,Otro',
            'historia' => 'nullable|string',
            'videojuegos' => 'nullable|array',
            'videojuegos.*' => 'nullable|exists:video_juegos,id',
        ]);

        $personaje = Personaje::create($request->only(['nombre', 'edad', 'genero', 'historia']));

        if ($request->has('videojuegos') && filter_var($request->input('videojuegos'), FILTER_VALIDATE_INT)) {
            $personaje->videoJuegos()->sync($request->input('videojuegos'));
        }

        return redirect()->route('personajes.index')->with('success', 'Personaje creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personaje $personaje)
    {
        $videojuegos = $personaje->videojuegos;

        return view('personajes.show', compact('personaje', 'videojuegos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personaje $personaje)
    {
        $videojuegos = \App\Models\VideoJuego::all();
        $videojuegosSeleccionados = $personaje->videojuegos->pluck('id')->toArray();
        return view('personajes.edit', compact('personaje', 'videojuegos', 'videojuegosSeleccionados'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personaje $personaje)
    {
        $request->validate([
            'nombre' => 'required|max:255|unique:personajes,nombre,' . $personaje->id,
            'edad' => 'nullable|integer',
            'genero' => 'required|in:F,M,Otro',
            'historia' => 'nullable|string',
            'videojuegos' => 'nullable|array',
            'videojuegos.*' => 'nullable|exists:video_juegos,id',
        ]);

        $personaje->update($request->only(['nombre', 'edad', 'genero', 'historia']));

        if ($request->has('videojuegos') && $request->input('videojuegos') !== null) {
            $personaje->videoJuegos()->sync($request->input('videojuegos'));
        }

        return redirect()->route('personajes.index')->with('success', 'Personaje actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personaje $personaje)
    {
        $personaje->delete();
        return redirect()->route('personajes.index')->with('success', 'Personaje eliminado.');
    }

    public function report(Personaje $personaje) {
        $pdf = Pdf::loadView('personajes.report', compact('personaje'));
        return $pdf->download('data.pdf');
    }

    public function printlist()
    {
        $personajes = Personaje::all();
        $pdf = Pdf::loadView('personajes.printlist', compact('personajes'));
        return $pdf->download('personajes.pdf');
    }

}
