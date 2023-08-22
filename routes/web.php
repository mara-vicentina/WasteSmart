<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\UserPermission;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicLightingController;
use App\Http\Controllers\InfraestructureController;
use App\Http\Controllers\AccessibilityController;
use App\Http\Controllers\TrafficSecurityController;

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

Route::get('/', [MainController::class, 'index']);

Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/user', [UserController::class, 'create']);

Route::get('/painel/dashboard', [DashboardController::class, 'index']);
Route::get('/painel/public-lighting', [PublicLightingController::class, 'index']);
Route::get('/painel/infraestructure', [InfraestructureController::class, 'index']);
Route::get('/painel/accessibility', [AccessibilityController::class, 'index']);
Route::get('/painel/traffic-security', [TrafficSecurityController::class, 'index']);
