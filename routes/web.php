<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'auth','localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 

      
Route::get('/dashboard', function () {
    return view('layouts.backend.index');
})->name('dashboard');

Route::get('editportfolios',[PortfolioController::class,'editData'])->name('portfolios.get_edit');//لازم قبل resourse الخاصة يها
Route::get('getportfolios',[PortfolioController::class,'getData'])->name('portfolios.get');//لازم قبل resourse الخاصة يها
Route::resource('portfolios',PortfolioController::class);


    });



require __DIR__.'/auth.php';
