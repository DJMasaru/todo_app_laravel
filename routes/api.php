<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//認証不要ルート
Route::post('/todo', [TodoController::class, 'addTodo']);
Route::delete('/todo', [TodoController::class, 'deleteTodo']);
Route::get('/todo', [TodoController::class, 'fetchTodo']);
Route::get('/todo/individual', [TodoController::class, 'fetchTodoIndividual']);
Route::put('/todo', [TodoController::class, 'putTodo']);
