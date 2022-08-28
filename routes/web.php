<?php

use App\Http\Controllers\admin\LevelController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    // your routes
});

// Route::group(['middleware' => ['auth','user']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // services controller
    Route::resource('service', admin\ServiceController::class);
    //student controller
    Route::resource('student', admin\StudentController::class);
    //dashboard controller
    Route::resource('dashboard', admin\DashboardController::class);
    //Purchase controller
    Route::resource('purchase', admin\PurchaseController::class);
    //transaction controller
    Route::resource('transaction', admin\TransactionController::class);
    //payment controler
    Route::resource('payment', admin\PaymentController::class);
    //Level controller 
    Route::resource('level', admin\LevelController::class);

    Route::get('getstudents',[StudentController::class, 'getStudents'])->name('getStudents');
    Route::get('getservices',[ServiceController::class, 'getServices'])->name('getServices');
    Route::get('getlevels',[LevelController::class, 'getLevels'])->name('getLevels');

// });
// return redirect()->route('admin')->withInput()->with('errmessage', 'Please Login to access restricted area.');
