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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home', 'HomeController@index');
Route::get('/about/{search}', function () {
$data = [
    'pageTitle' => 'Tentang Kami',
    'content' => 'Ini adalah halaman tentang kami.'
];
return view('about', $data);
});
Route::get('/produk', 'App\Http\Controllers\ProdukController@index');
Route::resource('/produk', ProdukController::class, [ 'except'=> ['create', 'update', 'delete', 'show' ]]);
