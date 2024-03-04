<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfertaController extends Controller
{
    public function insertOferta(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'inicio' => 'required|date',
            'codOe' => 'required',
            'tipo' => 'required'
        ]);

        try {
            DB::table('ofertaeducativa')->upsert(
                ['codOe' => $validated['codOe'], 'nombre' => $validated['nombre'], 'descripcion' => $validated['descripcion'], 'tipo' => $validated['tipo'], 'fechaLey' => $validated['inicio']],
                ['codOe'], 
                ['nombre', 'descripcion', 'tipo', 'fechaLey']
            );
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
}
