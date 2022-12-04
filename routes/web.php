<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
 //   return view('welcome');
//});
Auth::routes(['verify'=>true]);

Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function (){
    Route::get('/','index');
    Route::get('/colecao','categoria');
    Route::get('/colecao/{categoria_nome}','produto');
    Route::get('/colecao/{categoria_nome}/{produto_nome}','produtoView');
    Route::get('/novidades','novidade');
    Route::get('/sobre','sobre');
    Route::get('/search','searchProduto');
    Route::get('/search','searchproduto');
    //Route::get('/novidades','searchProduto');
    

});


Route::middleware(['auth',])->group(function ()
{
    Route::get('perfil',[App\Http\Controllers\Frontend\UserController::class, 'index']);
    Route::post('perfil',[App\Http\Controllers\Frontend\UserController::class, 'updateUserDetails']);
    Route::get('imobiliario',[App\Http\Controllers\Frontend\ImobiliarioController::class, 'index']);
    Route::get('imobiliario/criar',[App\Http\Controllers\Frontend\ImobiliarioController::class, 'create']);
    Route::POST('/imobiliario',[App\Http\Controllers\Frontend\ImobiliarioController::class, 'guardar']);
    //Route::get('imobiliario/{produto}/edit',[App\Http\Controllers\Frontend\ImobiliarioController::class, 'edit']);
    //Route::PUT('/imobiliario/{produto}',[App\Http\Controllers\Frontend\ImobiliarioController::class, 'update']);
    //Route::get('/imobiliario/{produto_id}/delete',[App\Http\Controllers\Frontend\ImobiliarioController::class, 'destroy']);
    //Route::get('produto-imagem/{produto_imagem_id}/delete',[App\Http\Controllers\Frontend\ImobiliarioController::class, 'destroy']);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin',])->group(function (){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
   


    //categoria
    Route::controller(App\Http\Controllers\Admin\CategoriaController::class)->group(function (){
        Route::get('/categoria','index');
        Route::get('/categoria/criar','criar');
        Route::POST('/categoria','store');
        Route::get('/categoria/{categoria}/edit','edit');
        Route::PUT('/categoria/{categoria}','update');
    });

    //produto
    Route::controller(App\Http\Controllers\Admin\ProdutoController::class)->group(function (){
        Route::get('/produto','index');
        Route::get('/produto/criar','criar');
        Route::POST('/produto','store');
        Route::get('/produto/{produto}/edit','edit');
        Route::PUT('/produto/{produto}','update');
        Route::get('/produto/{produto_id}/delete', 'destroy');
        Route::get('produto-imagem/{produto_imagem_id}/delete','destroyImagem');
    });

    //slider
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function (){
        Route::get('/sliders','index');
        Route::get('/sliders/criar','criar');
        Route::POST('/sliders/criar','store');
        Route::get('/sliders/{slider}/edit','edit');
        Route::PUT('/sliders/{slider}','update');
        Route::get('/sliders/{slider}/delete', 'destroy');
    });

    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function (){
        Route::get('/users','index');
        Route::get('/users/criar','criar');
        Route::post('/users','store');
        Route::get('/users/{user_id}/edit','edit');
        Route::PUT('/users/{user_id}','update');
        Route::get('//users/{user_id}/delete', 'destroy');
    });

    Route::controller(App\Http\Controllers\Admin\ConfiguracaoController::class)->group(function (){
        Route::get('/configuracao','index');
        Route::Post('/configuracao','store');
        
    });

    

});