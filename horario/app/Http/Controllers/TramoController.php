<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TramoController extends Controller
{
    public function insertTramo(Request $request)
    {
        $validated = $request->validate([
            'codTramo' => 'required|max:3',
            'horaInicio' => 'required|date_format:H:i',
            'horaFin' => 'required|date_format:H:i',
            'dia' => 'required'
        ]);

        try {
            DB::table('tramoHorario')->insert(
                ['codTramo' => $validated['codTramo'], 'horaInicio' => $validated['horaInicio'], 'horaFin' => $validated['horaFin'], 'dia' => $validated['dia']]
            );
            return redirect()->route('tramo')->with('success', 'La inserción se ha realizado correctamente.');
        } catch (\Exception $e) {
            report($e);
            return redirect()->route('tramo')->with('error', 'La inserción no se ha podido realizar. Error: ' . $e->getMessage());
        }
    }
    public function showTramo()
    {
        $tramoHorarios = DB::table('tramoHorario')->get();

        if ($tramoHorarios->isNotEmpty()) {
            $headers = array_keys((array) $tramoHorarios->first());
        } else {
            $headers = [];
        }

        return view('tramo', ['rows' => $tramoHorarios, 'headers' => $headers]);
    }
}
