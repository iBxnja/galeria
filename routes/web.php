<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\culturaControlador; // Corregir la letra "A" en "App"
use App\Http\Controllers\fotoControlador;
use App\Http\Controllers\paisControlador; // Corregir la letra "A" en "App"
use App\Http\Controllers\personaControlador; // Corregir la letra "A" en "App"
use App\Http\Controllers\registerControlador; // Corregir la letra "A" en "App"
use App\Http\Controllers\sessionsControlador; // Corregir la letra "A" en "App"
use App\Http\Controllers\lugarControlador; // Corregir la letra "A" en "App"

use Inertia\Inertia;


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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');




Route::get('/', function () {
    return view('welcome');
});
Route::get('/error', function () {
    return view('error');
});
Route::get('/bien', function () {
    return view('bien');
});



Route::get('/home', function () {
    return view('home');
});



Route::get('/galeria', function () {
    return view('galeria');
})->middleware('auth');#Este middleware asegura que el usuario que intenta acceder a la ruta esté autenticado.



#---------------------------------------------------------------#
#                  Controlador login                            #
#---------------------------------------------------------------#
Route::prefix('login')->group(function () {
    
    Route::get('/login', [sessionsControlador::class, 'create'])
        ->middleware('guest')#en Laravel se aplica a una ruta específica y establece un middleware llamado 'guest' para esa ruta.
        ->name('login.index');#nombre que yo designo, puede ser otro

    Route::post('/login', [sessionsControlador::class, 'store'])->name('login.store');#nombre que yo designo, puede ser otro

    Route::get('/logout', [sessionsControlador::class, 'destroy'])
        ->middleware('auth')##Este middleware asegura que el usuario que intenta acceder a la ruta esté autenticado.
        ->name('login.destroy');#nombre que yo designo, puede ser otro
});


#---------------------------------------------------------------#




#---------------------------------------------------------------#
#                  Controlador Register                         #
#---------------------------------------------------------------#
Route::prefix('register')->group(function () {
    Route::get('/register', [registerControlador::class, 'create'])
        ->middleware('guest')#en Laravel se aplica a una ruta específica y establece un middleware llamado 'guest' para esa ruta.
        ->name('register.index');#nombre que yo designo, puede ser otro
    Route::post('/register', [registerControlador::class, 'store'])
    ->name('register.store');#nombre que yo designo, puede ser otro
});


#---------------------------------------------------------------#





#---------------------------------------------------------------#
#                  Controlador Cultura                          #
#---------------------------------------------------------------#
Route::prefix('galeria')->group(function () {
    Route::get('/culturas', [culturaControlador::class, 'index']);
    Route::post('/culturas', [culturaControlador::class, 'guardar']);
    Route::get('/culturas/{id}/eliminar', [culturaControlador::class, 'eliminar'])->name('culturas.eliminar');

});



#---------------------------------------------------------------#



#---------------------------------------------------------------#
#                  Controlador Paises                           #
#---------------------------------------------------------------#
Route::prefix('galeria')->group(function () {
    Route::get('/paises', [paisControlador::class, 'index']);
    Route::post('/paises', [paisControlador::class, 'guardar']);
    Route::get('/paises/{id}/eliminar', [paisControlador::class, 'eliminar'])->name('paises.eliminar');
});

#---------------------------------------------------------------#


#---------------------------------------------------------------#
#                  Controlador Foto                             #
#---------------------------------------------------------------#
Route::prefix('galeria')->group(function () {
    Route::get('/fotos', [fotoControlador::class, 'index']);
    Route::post('/fotos', [fotoControlador::class, 'guardar']);
    Route::get('/fotos/{id}/eliminar', [fotoControlador::class, 'eliminar'])->name('fotos.eliminar');
});

#---------------------------------------------------------------#





#---------------------------------------------------------------#
#                  Controlador Lugares                          #
#---------------------------------------------------------------#
Route::prefix('galeria')->group(function () {
    Route::get('/lugares', [lugarControlador::class, 'index']);
    Route::post('/lugares', [lugarControlador::class, 'guardar']);
    Route::get('/lugares/{id}/eliminar', [lugarControlador::class, 'eliminar'])->name('lugares.eliminar');
});
#---------------------------------------------------------------#










#---------------------------------------------------------------#
#                  Controlador Personas                         #
#---------------------------------------------------------------#
Route::prefix('galeria')->group(function () {
    Route::get('/personas', [personaControlador::class, 'index']);
    Route::post('/personas', [personaControlador::class, 'guardar']);
    Route::get('/personas/{id}/eliminar', [personaControlador::class, 'eliminar'])->name('personas.eliminar');
});
#---------------------------------------------------------------#



















// Route::controller(NombreControladorEnComun::class)->group(function(){
//     Route::get('ruta', 'metodo');
//     Route::get('ruta', 'metodo');
//     Route::get('ruta', 'metodo');
// });