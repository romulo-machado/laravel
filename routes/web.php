<?php

use App\Http\Controllers\ListaController;
use App\Http\Controllers\OlaController;
use App\Http\Controllers\SeriesController;
use App\Models\Lista;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar rotas da web para sua aplicação. Essas
| rotas são carregadas pelo RouteServiceProvider e todas elas deverão
| ser atribuído ao grupo de middleware "web". Faça algo ótimo!
|
*/

Route::get('/', function () {
    return redirect ('/series');
});

Route::resource('/series', SeriesController::class)
->except(['show']);

// Route::controller(SeriesController::class)->group(function (){
//     Route::get('/series', 'index'
//     )->name('series.index');

//     Route::get('/series/create', 'create'
//     )->name('series.create');

//     Route::post('/series/store', 'store')->name('series.store');

Route::get('/series/{id}/edit', [SeriesController::class, 'edit'])->name('series.edit');

Route::delete('/series/destroy/{id}',[SeriesController::class, 'destroy'])->name('series.destroy');
// });

//----------Projeto ola---------------//
Route::controller(OlaController::class)->group(function() {
    Route::get('/ola',[OlaController::class, 'index']);
    Route::get('/ola/create',[OlaController::class, 'create']);
    Route::get('/ola/salvar',[OlaController::class, 'store']);

    Route::delete('/ola/destroy/{id}', [OlaController::class, 'destroy'])->name('ola.destroy');
});

//-----Projeto de Fixação-----//

Route::get('/lista', [ListaController::class, 'index']);

Route::get('/lista/create', [ListaController::class, 'create']);

Route::post('/lista/store', [ListaController::class, 'store']);

Route::delete('/lista/destroy/{lista}', [ListaController::class, 'destroy']);

Route::get('/lista/{lista}/edit', [ListaController::class, 'edit']);

Route::get('/lista/update/{lista}', [ListaController::class, 'update']);
