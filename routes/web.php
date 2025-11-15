<?php

use App\Http\Controllers\CarrosController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [SiteController::class, 'index'])
        ->name('site.index');

Route::get('/carro/{id}', [SiteController::class, 'detalhesCarros'])
     ->name('site.carro.detalhes');

Route::get('/novos', [SiteController::class, 'exibirNovos'])
        ->name('site.novos');

Route::get('/seminovos', [SiteController::class, 'exibirSeminovos'])
        ->name('site.seminovos');


Route::get('/contato', function () {
    return view('site.contato');
})->name('site.contato');

Route::get('/sobre', function () {
    return view('site.sobre');
})->name('site.sobre');

Route::get('/perfil', function () {
    return view('site.perfilusu');
})->name('site.perfilusu');


Route::prefix('/admin')->group(function() {

        Route::get('/', function () {
                return view('autenticacao.login');
        })->name('autenticacao.login');

    Route::prefix('/carros')->group(function(){
        Route::get('/', [CarrosController::class, 'carros']
                    )->name('carros.index');

            Route::get('/cadastrar', [CarrosController::class, 'cadastrarCarros']
                    )->name('carros.cadastrar');

            Route::post('/',
                    [CarrosController::class, 'salvarCarros']
                    )->name('carros.novo');

            Route::get('/{id}',
                    [CarrosController::class, 'buscarCarros']
                    )->name('carros.buscar');

            Route::get('/editar/{id}',
                    [CarrosController::class, 'editarCarros']
                    )->name('carros.editar');

            Route::post('/alterar',
                    [CarrosController::class, 'alterarCarros']
                    )->name('carros.alterar');

            Route::get('/excluir/{id}',
                    [CarrosController::class, 'excluirCarros']
                    )->name('carros.excluir');
    });

    Route::prefix('/cores')->group(function(){
        Route::get('/', [CorController::class, 'cores']
                    )->name('cores.index');

            Route::get('/cadastrar', function () {
                        return view('menuadmin.cores.cadastrar');
                        })->name('cores.cadastrar');
            
            Route::post('/',
                    [CorController::class, 'salvarCores']
                    )->name('cores.novo');

            Route::get('/{id}',
                    [CorController::class, 'buscarCores']
                    )->name('cores.buscar');

            Route::post('/alterar',
                    [CorController::class, 'alterarCores']
                    )->name('cores.alterar');

            Route::get('/excluir/{id}',
                    [CorController::class, 'excluirCores']
                    )->name('cores.excluir');
    });

     Route::prefix('/marcas')->group(function(){
        Route::get('/', [MarcaController::class, 'marcas']
                    )->name('marcas.index');

            Route::get('/cadastrar', function () {
                        return view('menuadmin.marcas.cadastrar');
                        })->name('marcas.cadastrar');

            Route::post('/',
                    [MarcaController::class, 'salvarMarcas']
                    )->name('marcas.novo');

            Route::get('/{id}',
                    [MarcaController::class, 'buscarMarcas']
                    )->name('marcas.buscar');

            Route::post('/alterar',
                    [MarcaController::class, 'alterarMarcas']
                    )->name('marcas.alterar');

            Route::get('/excluir/{id}',
                    [MarcaController::class, 'excluirMarcas']
                    )->name('marcas.excluir');
    });

     Route::prefix('/modelos')->group(function(){
        Route::get('/', [ModeloController::class, 'modelos']
                    )->name('modelos.index');

             Route::get('/cadastrar', [ModeloController::class, 'cadastrarModelos']
                    )->name('modelos.cadastrar');

            Route::post('/',
                    [ModeloController::class, 'salvarModelos']
                    )->name('modelos.novo');

            Route::get('/editar/{id}',
                    [ModeloController::class, 'editarModelos']
                    )->name('modelos.editar');

            Route::post('/alterar',
                    [ModeloController::class, 'alterarModelos']
                    )->name('modelos.alterar');

            Route::get('/excluir/{id}',
                    [ModeloController::class, 'excluirModelos']
                    )->name('modelos.excluir');
    });

    Route::get('/usuarios', function () {
        return view('menuadmin.usuarios.index');
        })->name('usuarios.index');
    
});

Route::get('/modelos/por-marca/{marcaId}', [\App\Http\Controllers\ModeloController::class, 'modelosPorMarca'])
    ->name('modelos.por.marca');


Route::middleware('auth')->group(function () {

        Route::get('/menu', function () {

        if (!Auth::check() || !Auth::user()->is_admin) {
                abort(403, 'Acesso negado.');
        }

        return view('menuadmin.index');
        })->name('menuadmin.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
