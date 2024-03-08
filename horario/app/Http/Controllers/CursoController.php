<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    public function insertCurso(Request $request)
    {
        $validated = $request->validate([
            'codOe' => 'required|max:3',
            'codCurso' => 'required',
            'codTutor' => 'required'
        ]);

        try {
            DB::table('curso')->upsert(
                ['codOe' => $validated['codOe'], 'codCurso' => $validated['codCurso'], 'codTutor' => $validated['codTutor']],
                ['codProf'], 
                ['codCurso', 'codTutor']
            );
            return redirect()->route('curso')->with('success', 'La inserción se ha realizado correctamente.');
        } catch (\Exception $e) {
            report($e);
            return redirect()->route('curso')->with('error', 'La inserción no se ha podido realizar. Error: ' . $e->getMessage());
        }
    }

    public function showCurso()
    {
        $cursos = DB::table('curso')->get();

        if ($cursos->isNotEmpty()) {
            $headers = array_keys((array) $cursos->first());
        } else {
            $headers = [];
        }

        return view('curso', ['rows' => $cursos, 'headers' => $headers]);
    }
}