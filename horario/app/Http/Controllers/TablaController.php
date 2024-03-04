<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class TablaController extends Controller
{

    public function showTable(Request $request)
    {
        $codCurso = $request->input('codCurso', '2A'); 
        $codOe = $request->input('codOe', 'DAM');

        $sql = "SELECT t.horaInicio,t.horaFin, h.codAsig FROM horario h 
                JOIN tramohorario t ON h.codTramo = t.codTramo 
                WHERE h.codCurso=\"$codCurso\" AND h.codOe = \"$codOe\"
                ORDER BY t.horaInicio,t.dia;";

        $data = DB::select($sql);

        return view('horario', ['data' => $data]);
    }
}

