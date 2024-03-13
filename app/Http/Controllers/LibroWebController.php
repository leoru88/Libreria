<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Autor;
use Illuminate\Http\Request;

class LibroWebController extends Controller
{
    public function index()
    {
        $libros = Libro::all();
        return view('libros.index', ['libros' => $libros]);
    }
    
    public function Organize()
    {
        $libros = Libro::all();
        $data = ['libros' => $libros];
        if (request()->wantsJson()) {
            return response()->json($data);
        }
    
        return view('libros.Organize')->with($data);
    }

    public function obtenerUltimaActualizacion()
    {
        $ultimaActualizacion = Libro::latest('updated_at')->first()->updated_at;
    
        return response()->json([
            'ultimaActualizacion' => $ultimaActualizacion,
        ]);
    }
    
    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'fecha_publicacion' => 'required',
            'genero' => 'required',
        ]);
    
        $autor = Autor::where('nombre_completo', $request->autor)->first();
    
        if (!$autor) {
            $autor = Autor::create([
                'nombre_completo' => $request->autor,
            ]);
        }
    
        $libro = new Libro();
        $libro->fill($request->all());
        $libro->autor()->associate($autor);
        $libro->save();
    
        return redirect('/libros')->with('success', 'Libro agregado correctamente');
    }

    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'fecha_publicacion' => 'required',
            'genero' => 'required',
        ]);

        $libro = Libro::findOrFail($id);
        $libro->update($request->all());

        return redirect('/libros')->with('success', 'Libro actualizado correctamente');
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect('/libros')->with('success', 'Libro eliminado correctamente');
    }
}
