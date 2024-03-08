<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignaturaController extends Controller
{
    public function insertAsignatura(Request $request)
    {
        $validated = $request->validate([
            'codAsig' => 'required|max:10',
            'nombre' => 'required',
            'horasSemanales' => 'required',
            'horasTotales' => 'required'
        ]);

        try {
            DB::table('asignatura')->upsert(
                ['codAsig' => $validated['codAsig'], 'nombre' => $validated['nombre'],'horasSemanales' => $validated['horasSemanales'],'horasTotales' => $validated['horasTotales']],
                ['codAsig'], 
                ['nombre','horasSemanales','horasTotales']
            );
            return redirect()->route('asignatura')->with('success', 'La inserción se ha realizado correctamente.');
        } catch (\Exception $e) {
            report($e);
            return redirect()->route('asignatura')->with('error', 'La inserción no se ha podido realizar. Error: ' . $e->getMessage());
        }
    }
    public function showAsignatura()
    {
        $asignaturas = DB::table('asignatura')->get();

        if ($asignaturas->isNotEmpty()) {
            $headers = array_keys((array) $asignaturas->first());
        } else {
            $headers = [];
        }

        return view('asignatura', ['rows' => $asignaturas, 'headers' => $headers]);
    }
}