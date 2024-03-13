<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class AutorController extends Controller
{
    public function index()
    {
        $autores = Autor::with('libros')->get();
        
        return view('autores.index', ['autores' => $autores]);
    }

    public function edit($id)
    {
        $autor = Autor::findOrFail($id);
        $countries = new Countries();
        $paises = $countries->all()->pluck('name.common')->toArray();
        
        return view('autores.edit', compact('autor', 'paises'));
    }

    public function update(Request $request, $id)
    {
        $autor = Autor::findOrFail($id);
        $autor->update($request->all());

        return redirect('/autores')->with('success', 'Autor actualizado correctamente');
    }

    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();

        return redirect('/autores')->with('success', 'Autor eliminado correctamente');
    }
}