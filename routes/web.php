<?php

use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\GruposController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\NotasController;
use App\Http\Controllers\Auth\PerfilController;
use App\Http\Controllers\Auth\ProdutosController;
use App\Http\Controllers\Auth\RecuperarController;
use App\Http\Controllers\Auth\UsuariosController;
use App\Http\Controllers\Auth\VendasController;
use App\Http\Middleware\Authenticate;


Route::middleware(['Colaborador'])->group(function () {
    Route::get('/perfil', [PerfilController::class, 'view'])->name('perfilView');
    Route::post('/perfil/{id}/editar', [PerfilController::class, 'editar'])->name('editarPerfil');
});


Route::middleware(['Admin'])->group(function () {
    // Produtos
    Route::get('/usuarios', [UsuariosController::class, 'view'])->name('usuariosView');
    Route::post('usuarios/cadastrar', [UsuariosController::class, 'cadastrar'])->name('cadastrarUsuario');
    Route::post('/usuarios/{id}/editar', [UsuariosController::class, 'editar'])->name('editarUsuario');
    Route::post('/usuarios/{id}/excluir', [UsuariosController::class, 'excluir'])->name('excluirUsuario');
});


Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/', function () {
        return view('dashboard.index');
    });
    Route::get('/dashboard', [DashboardController::class, 'view'])->name('dashboardView');

    // Grupos
    Route::get('/grupos', [GruposController::class, 'view'])->name('gruposView');
    Route::post('grupos/cadastrar', [GruposController::class, 'cadastrar'])->name('cadastrarGrupo');
    Route::post('/grupos/{id}/editar', [GruposController::class, 'editar'])->name('editarGrupo');
    Route::post('/grupos/{id}/excluir', [GruposController::class, 'excluir'])->name('excluirGrupo');

    // Produtos
    Route::get('/produtos/{grupo_id}/estoque', [ProdutosController::class, 'viewEstoque'])->name('estoqueView');
    Route::get('/produtos/{grupo_id}/vendidos', [ProdutosController::class, 'viewVendidos'])->name('vendidosView');
    Route::get('/produtos/{grupo_id}/vencidos', [ProdutosController::class, 'viewVencidos'])->name('vencidosView');
    Route::post('/produtos/cadastrar', [ProdutosController::class, 'cadastrar'])->name('cadastrarProduto');
    Route::post('/produtos/{produto_id}/vender', [ProdutosController::class, 'vender'])->name('venderProduto');
    Route::post('/produtos/{produto_id}/editar', [ProdutosController::class, 'editar'])->name('editarProduto');
    Route::post('/produtos/{produto_id}/vencidos/editar', [ProdutosController::class, 'editarVencidos'])->name('editarVencidos');
    Route::post('/produtos/{produto_id}/excluir', [ProdutosController::class, 'excluir'])->name('excluirProduto');
    Route::post('/produtos/{produto_id}/vencidos/excluir', [ProdutosController::class, 'excluirVencidos'])->name('excluirVencidos');

    // Vendas
    Route::get('/vendas', [VendasController::class, 'view'])->name('vendasView');
    Route::post('/vendas/cadastrar', [VendasController::class, 'cadastrar'])->name('cadastrarVenda');
    Route::post('/vendas/{id}/excluir', [VendasController::class, 'excluir'])->name('excluirVenda');
    Route::post('/produtos/{id}/vendidos/excluir', [ProdutosController::class, 'excluirVendidos'])->name('excluirVendidos');

    // Notas
    Route::get('/notas', [NotasController::class, 'view'])->name('notasView');
    Route::post('/notas/cadastrar', [NotasController::class, 'cadastrar'])->name('cadastrarNota');
    Route::get('/notas/{id}', [NotasController::class, 'nota'])->name('nota');
    Route::post('/notas/{id}/excluir', [NotasController::class, 'excluir'])->name('excluirNota');
});

Route::get('/login', [LoginController::class, 'loginView'])->name('loginView');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/recuperar-senha', [RecuperarController::class, 'showResetRequestForm'])->name('password.request');
Route::post('/recuperar-senha', [RecuperarController::class, 'sendResetLink'])->name('password.email');

Route::get('/alterar-senha/{token}', [RecuperarController::class, 'showResetForm'])->name('password.reset');
Route::post('/alterar-senha', [RecuperarController::class, 'resetPassword'])->name('password.update');



// Route::get('/login', 'Auth\LoginController@loginView')->name('loginView');
// Route::post('/login', 'Auth\LoginController@login')->name('login');
// Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
