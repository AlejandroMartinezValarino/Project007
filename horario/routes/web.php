<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use Illuminate\Http\Request;
use App\Http\Controllers\TablaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TramoController;

Route::get('/login', function () {
    return view('login');
})->name('showLogin');

Route::post('/doLogin', [AuthController::class, 'login'])->name('doLogin');

Route::get('/menu', function () {
    if (!session('logged_in')) {
        return redirect()->route('showLogin');
    }

    return view('menu');
})->name('menu');

Route::get('horario', function (Request $request) {
    if (!session('logged_in')) {
        return redirect()->route('showLogin');
    }

    $tablaController = new TablaController();
    return $tablaController->showTable($request);
});

Route::post('horario', function (Request $request) {
    if (!session('logged_in')) {
        return redirect()->route('showLogin');
    }

    $tablaController = new TablaController();
    return $tablaController->showTable($request);
})->name('showTable');

Route::get('/oferta', function () {
    if (!session('logged_in')) {
        return redirect()->route('showLogin');
    }
    return view('oferta');
})->name('oferta');

Route::post('/oferta', function (Request $request, OfertaController $ofertaController) {
    if (!session('logged_in')) {
        return redirect()->route('showLogin');
    }
    $ofertaController->insertOferta($request);
    return view('oferta');
})->name('oferta');

Route::get('/profesor', function () {
    if (!session('logged_in')) {
        return redirect()->route('showLogin');
    }
    return view('profesor');
})->name('profesor');

Route::post('/profesor', function (Request $request, ProfesorController $profesorController) {
    if (!session('logged_in')) {
        return redirect()->route('showLogin');
    }
    $profesorController->insertProfesor($request);
    return view('profesor');
})->name('profesor');

Route::get('/asignatura', function () {
    if (!session('logged_in')) {
        return redirect()->route('showLogin');
    }
    return view('asignatura');
})->name('asignatura');

Route::post('/asignatura', function (Request $request, AsignaturaController $asignaturaController) {
    if (!session('logged_in')) {
        return redirect()->route('showLogin');
    }
    $asignaturaController->insertAsignatura($request);
    return view('asignatura');
})->name('asignatura');

Route::get('/curso', function () {
    if (!session('logged_in')) {
        return redirect()->route('showLogin');
    }
    return view('curso');
})->name('curso');

Route::post('/curso', function (Request $request, CursoController $cursoController) {
    if (!session('logged_in')) {
        return redirect()->route('showLogin');
    }
    $cursoController->insertCurso($request);
    return view('curso');
})->name('curso');

Route::get('/tramo', function () {
    if (!session('logged_in')) {
        return redirect()->route('showLogin');
    }
    $tramoController = new TramoController(); 
    return $tramoController->showTramo();
})->name('tramo');

Route::post('/tramo', function (Request $request, TramoController $tramoController) {
    if (!session('logged_in')) {
        return redirect()->route('showLogin');
    }
    $tramoController->insertTramo($request);
    return $tramoController->showTramo();
})->name('tramo');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');