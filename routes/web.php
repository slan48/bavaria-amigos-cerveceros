<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayController;
use App\Http\Controllers\ParticipationController;

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
    Route::get('/', HomeController::class)->name('home');

    Route::get('/como-participar', function (){
        return Inertia\Inertia::render('HowToParticipate');
    })->name('como-participar');

    Route::get('/juega-y-gana', [PlayController::class, 'Instructions'])->name('juega-y-gana');
    Route::get('/juega-y-gana/juego/{participation}', [PlayController::class, 'game'])->name('juega-y-gana.game');
    Route::get('/perfil', [UserController::class, 'profile'])->name('perfil');

    Route::get('/ganadores', [ParticipationController::class, 'show'])->name('participations.show');
    Route::post('/participations', [ParticipationController::class, 'create'])->name('participations.create');
    Route::patch('/participations', [ParticipationController::class, 'update'])->name('participations.update');
});

// Fortify custom routes
Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {
    // Authentication...
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware(['guest'])
        ->name('login');

    $limiter = config('fortify.limiters.login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest',
            $limiter ? 'throttle:'.$limiter : null,
        ]));

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Registration...
    if (Features::enabled(Features::registration())) {
        Route::get('/registro', [RegisteredUserController::class, 'create'])
            ->middleware(['guest'])
            ->name('register');

        Route::post('/register', [RegisteredUserController::class, 'store'])
            ->middleware(['guest']);
    }
});
