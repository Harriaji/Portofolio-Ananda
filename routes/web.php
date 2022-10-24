<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\jnsKontakController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SiswaController;
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


// middleware groupe
//admin
Route::middleware('auth')->group(function(){

    Route::get('/dashboard',[DashboardController::class , 'Dashboard']);
    Route::get('/mastersiswa{id_siswa}/hapus',[SiswaController::class , 'hapus'])->name('mastersiswa');
    Route::get('/masterproject{id_siswa}/hapus',[ProjectController::class , 'hapus'])->name('masterproject');
    Route::resource('/masterproject' , ProjectController::class);
    Route::resource('/mastersiswa', SiswaController::class );
    Route::resource('/mastercontact', KontakController::class);
    Route::resource('/mainJnsKontak', jnsKontakController::class);
    // Route::get('/mainJnsKontak/{id}/edit', [jnsKontakController::class, 'editJenis'])->name('edit.jns');
    Route::resource('/', AdminController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/masterproject/{id}/create',[ProjectController::class, 'buat'])->name('buat.project');
    Route::get('/mastercontact/{id}/create',[KontakController::class, 'buatKontak'])->name('buat.kontak');
    // Route::get('/mastercontact/{id}/create',[KontakController::class, 'jnsKontak'])->name('jns.Kontak');
    Route::get('/mastercontact/{id}/edit',[KontakController::class, 'editKontak'])->name('edit.kontak');
    Route::post('/masterproject/make',[ProjectController::class,'make'])->name('makel');
    Route::post('/mastercontact/makeKontak',[KontakController::class,'makeKontak'])->name('make.kontak');

});
//guess
Route::middleware('guest')->group(function(){
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
    Route::get('/login', [LoginController::class, "index"])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
});






// Route::get('/',[DashboardController::class , 'Dashboard']);
// Route::get('/mastersiswa{id_siswa}/hapus',[SiswaController::class , 'hapus'])->name('mastersiswa');
// Route::resource('/masterproject' , ProjectController::class);
// Route::resource('/mastersiswa', SiswaController::class );
// Route::resource('/mastercontact', KontakController::class);
// Route::resource('/', AdminController::class);




Route::get('/register', [RegisterController::class, "index"])->name('register');



// Route::get('/register', function () {
//     return view('admin.register');
// });



