<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\EvaluationController;
use App\Models\Evaluation;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("register", [ApiController::class, "register"]);
Route::post("login", [ApiController::class, "login"]);

Route::group([
    "middleware" => ["auth:api"]
], function(){

    Route::get("profile", [ApiController::class, "profile"]);
    Route::get("refresh", [ApiController::class, "refreshToken"]);
    Route::get("logout", [ApiController::class, "logout"]);

    Route::post('evaluations/store', [Evaluation::class, "store"]);
    Route::put('evaluations/{id}/update', [EvaluationController::class,"update"]);
    Route::delete('evaluations/{id}', [EvaluationController::class, "destroy"]);

});
