<?php
use App\Http\Controllers\newsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
# mengimport controller news

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


# Route news
Route::get('/news', [NewsController::class, 'index']);
Route::post('/news', [NewsController::class, 'store']);
Route::put('/news/{id}', [NewsController::class, 'update']);
Route::delete('/news/{id}', [NewsController::class, 'destroy']);

# Route news
# Method GET
Route::get('/news', [NewsController::class, 'index']);

# Method POST
Route::post('/news', [NewsController::class, 'store']);
