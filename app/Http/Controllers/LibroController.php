<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        return Libro::all();
    }

    public function show($id)
    {
        return Libro::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'fecha_publicacion' => 'required',
            'genero' => 'required',
        ]);

        return Libro::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $libro = Libro::findOrFail($id);

        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'fecha_publicacion' => 'required',
            'genero' => 'required',
        ]);

        $libro->update($request->all());

        return $libro;
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return response()->json(['message' => 'Libro eliminado']);
    }
}