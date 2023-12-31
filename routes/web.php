<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; // Perubahan: UserController ditambahkan 's' pada Controllers
use App\Http\Controllers\ProdukController; // Perubahan: ProdukController ditambahkan 's' pada Controllers
use App\Http\Controllers\CategoryController;
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

Route::get('/user', [UserController::class, 'index']); // Perubahan: Menggunakan UserController dan method index
Route::get('/product', [ProductController::class, 'index']); // Perubahan: Menggunakan ProdukController dan method index
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return 'Halaman About';
});

Route::get('/about-us', function () { // Perubahan: Merapikan path route '/about-us'
    $data = [
        'pageTitle' => 'Tentang Kami',
        'content' => 'Ini adalah halaman tentang kami.'
    ];
    return view('about', $data);
});

Route::get('/profile', function () {
    $nama = "azhira ";
    return view('profile.index', compact('nama'));

});

//Route::resource('/product', 'App\http\controllers\Productcontroller');

Route::middleware(['auth', 'user', 'admin'])->group(function() {
    Route::resource('/product', App\http\controllers\ProductController::class);
    Route::get('admin', function () {
        return 'admin page'; 
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('category/create',[App\Http\Controllers\CategoryController::class,'create']);
Route::post('category/create',[App\Http\Controllers\CategoryController::class,'store']);

