<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfesorController extends Controller
{
    public function insertProfesor(Request $request)
    {
        $validated = $request->validate([
            'codProf' => 'required|max:3',
            'nombre' => 'required',
            'apellidos' => 'required',
            'fechaAlta' => 'required|date',
        ]);

        try {
            DB::table('profesor')->upsert(
                ['codProf' => $validated['codProf'], 'nombre' => $validated['nombre'], 'apellidos' => $validated['apellidos'], 'fechaAlta' => $validated['fechaAlta']],
                ['codProf'], 
                ['nombre', 'apellidos', 'fechaAlta']
            );
            return redirect()->route('profesor')->with('success', 'La inserción se ha realizado correctamente.');
        } catch (\Exception $e) {
            report($e);
            return redirect()->route('profesor')->with('error', 'La inserción no se ha podido realizar. Error: ' . $e->getMessage());
        }
    }

    public function showProf()
    {
        $profesores = DB::table('profesor')->get();

        if ($profesores->isNotEmpty()) {
            $headers = array_keys((array) $profesores->first());
        } else {
            $headers = [];
        }

        return view('profesor', ['rows' => $profesores, 'headers' => $headers]);
    }
}