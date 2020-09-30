<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/', function (Request $request) {
        return Inertia\Inertia::render('Home', ['user' => $request->user()]);
    })->name('inicio');

    Route::get('/perfil', function () {
        return Inertia\Inertia::render('Profile/Show');
    })->name('perfil');
});
