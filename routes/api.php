<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\EtudiantController;

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
    Route::apiResource("etudiants", EtudiantController::class)->only('index', 'show');
    Route::post("etudiants/{id}/restore", [EtudiantController::class, 'store']);
    Route::post("etudiants{id}/update", [EtudiantController::class, 'update']);
    Route::delete("etudiants/{id}", [EtudiantController::class, 'destroy']);
});


