<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeRegistration;
use App\Http\Controllers\EmployeeLogin;
use App\Http\Controllers\CivilEmployeeController;
use App\Http\Controllers\MechanicalEmployeeController;

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

Route::get('/home', function () {
    return view('home');
});

Route::post("employee/register",[EmployeeRegistration::class, 'register']);

Route::get('login', [EmployeeLogin::class, 'showLoginForm']);

Route::post('employee/login', [EmployeeLogin::class, 'login']);

Route::get('/civil/home', [CivilEmployeeController::class, 'show']);

Route::get('/mechanical/home', [MechanicalEmployeeController::class, 'show']);