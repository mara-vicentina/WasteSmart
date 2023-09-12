<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\LoginPermission;
use App\Http\Middleware\UserPermission;
use App\Http\Middleware\AdminPermission;

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicLightingController;
use App\Http\Controllers\InfraestructureController;
use App\Http\Controllers\AccessibilityController;
use App\Http\Controllers\TrafficSecurityController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\TicketMessageController;

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

Route::get('/states', [StateController::class, 'getStates']);
Route::get('/cities/{uf}', [CityController::class, 'getCities']);

Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/user', [UserController::class, 'create']);

// ROTAS QUE TODOS OS USUÁRIOS ACESSAM
Route::middleware([LoginPermission::class])->group(function () {
    Route::get('/ticket/{id}', [TicketsController::class, 'getTicket']);
    Route::post('/ticket', [TicketsController::class, 'create']);
    Route::delete('/ticket', [TicketsController::class, 'remove']);
    Route::put('/ticket', [TicketsController::class, 'update']);

    Route::post('/ticket/message', [TicketMessageController::class, 'create']);

    Route::get('/painel/dashboard', [DashboardController::class, 'index']);
    Route::get('/painel/public-lighting', [PublicLightingController::class, 'index']);
    Route::get('/painel/infraestructure', [InfraestructureController::class, 'index']);
    Route::get('/painel/accessibility', [AccessibilityController::class, 'index']);
    Route::get('/painel/traffic-security', [TrafficSecurityController::class, 'index']);
});

// ROTAS QUE O TIPO USER ACESSA
Route::middleware([UserPermission::class])->group(function () {
    
});

// ROTAS QUE O TIPO ADMIN ACESSA
Route::middleware([AdminPermission::class])->group(function () {
    Route::get('/painel/dashboard/admin', [DashboardController::class, 'indexAdmin']);
    Route::get('/painel/public-lighting/admin', [PublicLightingController::class, 'indexAdmin']);
    Route::get('/painel/infraestructure/admin', [InfraestructureController::class, 'indexAdmin']);
    Route::get('/painel/accessibility/admin', [AccessibilityController::class, 'indexAdmin']);
    Route::get('/painel/traffic-security/admin', [TrafficSecurityController::class, 'indexAdmin']);
});