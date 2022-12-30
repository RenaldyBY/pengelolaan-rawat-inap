<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Petugas\KamarController;
use App\Http\Controllers\Petugas\DokterController;
use App\Http\Controllers\Petugas\PasienRawatInapController;
use App\Http\Controllers\Petugas\VisitDokterController;
<<<<<<< HEAD

=======
>>>>>>> dedeec3d331333ab0c234e17e0fff3e5c4d1699e
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], function () {
    Route::group([
        // 'middleware' => 'role:admin',
        'prefix' => 'admin',
        'as' => 'admin.'
    ], function () {
    });
    Route::group([
        // 'middleware' => 'role:petugas',
        'prefix' => 'admin',
        'as' => 'petugas.'
    ], function () {
        Route::resource('/kamar', KamarController::class);
        Route::resource('/dokter', DokterController::class);
        Route::resource('/pasienrawatinap', PasienRawatInapController::class);
        Route::resource('/visitdokter', VisitDokterController::class);
    });
});
Route::get('/tesView', function ()
    {
    return view('petugas.visitdokter.edit'); //Cek edit visitdokter /tesView
});
