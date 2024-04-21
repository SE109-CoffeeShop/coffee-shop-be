<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('/users', UserController::class);

    Route::get('/user/forms', [\App\Http\Controllers\Api\EmployeeController::class, 'getForms']);
    Route::post('/user/post-form', [\App\Http\Controllers\Api\EmployeeController::class, 'postForms']);
    Route::get('/user/manager-forms', [\App\Http\Controllers\Api\EmployeeController::class, 'getManagerForms']);
    Route::post('/user/manager-forms', [\App\Http\Controllers\Api\EmployeeController::class, 'postManagerForms']);

});

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);
        Route::post('/products', [\App\Http\Controllers\Api\ProductController::class, 'create']);
        Route::put('/products', [\App\Http\Controllers\Api\ProductController::class, 'update']);
        Route::delete('/products', [\App\Http\Controllers\Api\ProductController::class, 'delete']);

        Route::get('/customers', [\App\Http\Controllers\Api\CustomerController::class, 'index']);
        Route::put('/customers', [\App\Http\Controllers\Api\CustomerController::class, 'update']);
        Route::delete('/customers', [\App\Http\Controllers\Api\CustomerController::class, 'delete']);
