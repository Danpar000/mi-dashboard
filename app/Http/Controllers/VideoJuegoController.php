<?php

namespace App\Http\Controllers;

use App\Models\VideoJuego;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class VideoJuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = VideoJuego::query();

        if ($search = $request->input('search')) {
            $query->where('nombre', 'like', '%' . $search . '%');
        }

        if ($genero = $request->input('genero')) {
            $query->where('genero', $genero);
        }

        $videojuegos = $query->paginate(10);

        return view('videojuegos.index', compact('videojuegos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('videojuegos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:video_juegos|max:255',
            'descripcion' => 'nullable|string',
            'genero' => 'required|in:accion,aventura,sci-fi,terror,novela,puzzle,plataformas,otro'
        ]);

        VideoJuego::create($request->all());

        return redirect()->route('videojuegos.index')->with('success', 'Videojuego creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VideoJuego $videojuego)
    {
        return view('videojuegos.show', compact('videojuego'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VideoJuego $videojuego)
    {
        return view('videojuegos.edit', compact('videojuego'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VideoJuego $videojuego)
    {
        $request->validate([
            'nombre' => 'required|max:255|unique:video_juegos,nombre,' . $videojuego->id,
            'descripcion' => 'nullable|string',
            'genero' => 'required|in:accion,aventura,sci-fi,terror,novela,puzzle,plataformas,otro'
        ]);

        $videojuego->update($request->all());

        return redirect()->route('videojuegos.index')->with('success', 'Videojuego actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VideoJuego $videojuego)
    {
        $videojuego->delete();
        return redirect()->route('videojuegos.index')->with('success', 'Videojuego eliminado.');
    }

    public function report(VideoJuego $videojuego) {
        $pdf = Pdf::loadView('videojuegos.report', compact('videojuego'));
        return $pdf->download('data.pdf');
    }

    public function printlist()
    {
        $videojuegos = VideoJuego::all();
        $pdf = Pdf::loadView('videojuegos.printlist', compact('videojuegos'));
        return $pdf->download('videojuegos.pdf');
    }
}
