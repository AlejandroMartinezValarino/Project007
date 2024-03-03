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