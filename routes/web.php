<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TelefoneController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\DivisaController;
use App\Http\Controllers\NIPController;
use App\Mail\TrocaTelMsg;
use App\Mail\MyTestEmail;
use Illuminate\Support\Facades\Mail;

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
Route::get('/conrede/testroute',function(){
    $name= "Aplicativo de IPs da PRIP";
    Mail::to("ati.prip@usp.br")->send(new MyTestEmail($name));
});
Route::get('/exportacao', [NIPController::class, 'exportacao'])->name('nip.exportacao');
Route::get('/', [NIPController::class, 'index'])->name('home');
Route::resource('/divisas',DivisaController::class);
Route::get('/{ip}/envio-email',[NIPController::class,'troca'])->name('nip.troca');
Route::post('envio/{ip}',[NIPController::class,'envio'])->name('nip.envio');
Route::get('/nip-status/{ip}', [NIPController::class, 'status'])->name('nip.status');
Route::get('/ping/{ip}', [NIPController::class, 'ping']);
Route::resource('/nip', NIPController::class)->names([
    'index'   => 'nip.index',
    'store'   => 'nip.store',
    'show'    => 'nip.show',
    'edit'    => 'nip.edit',
    'update'  => 'nip.update',
    'destroy' => 'nip.destroy',
]);

// Permite usar Gate::check('user')na view 404
Route::fallback(function(){
    return view('errors.404');
 });

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home1');
