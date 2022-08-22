<?php
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

