<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'indexGet']);
Route::get('/news', [App\Http\Controllers\NewsController::class, 'indexGet']);
Route::get('/user/login', [App\Http\Controllers\UserController::class, 'loginGet']);
Route::get('/user/registr', [App\Http\Controllers\UserController::class, 'registrGet']);
Route::get('/user/exit', [App\Http\Controllers\UserController::class, 'Exit']);
Route::get('/news/addNews', [App\Http\Controllers\NewsController::class, 'addNewsGet']);
Route::get('/news/addType', [App\Http\Controllers\NewsController::class, 'addTypeGet']);
Route::get('/news/oneNews/{id}', [App\Http\Controllers\NewsController::class, 'oneNewsGet']);

Route::get('/questions', [App\Http\Controllers\QuestionController::class, 'indexGet']);
Route::get('/questions/addQuestions', [App\Http\Controllers\QuestionController::class, 'addQuestionsGet']);
Route::get('/questions/oneQuestions/{id}', [App\Http\Controllers\QuestionController::class, 'oneQuestionsGet']);

Route::post('/', [App\Http\Controllers\HomeController::class, 'indexPost']);
Route::post('/news', [App\Http\Controllers\NewsController::class, 'indexPost']);
Route::post('/user/login', [App\Http\Controllers\UserController::class, 'loginPost']);
Route::post('/user/registr', [App\Http\Controllers\UserController::class, 'registrPost']);
Route::post('/news/addNews', [App\Http\Controllers\NewsController::class, 'addNewsPost']);
Route::post('/news/addType', [App\Http\Controllers\NewsController::class, 'addTypePost']);
Route::post('/news/oneNews', [App\Http\Controllers\NewsController::class, 'oneNewsPost']);

Route::post('/questions', [App\Http\Controllers\QuestionController::class, 'indexPost']);
Route::post('/questions/addQuestions', [App\Http\Controllers\QuestionController::class, 'addQuestionsPost']);
Route::post('/questions/oneQuestions', [App\Http\Controllers\QuestionController::class, 'oneQuestionsPost']);