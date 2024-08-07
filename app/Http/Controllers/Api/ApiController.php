<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class ApiController extends Controller
{
    

    // Login de l'admin
     
    public function login(Request $request){

        //Validation des données du formulaire de connection

        $request->validate([

            "email" => "required|email",
            "password" => "required",
        ]);

        $token = auth()->attempt([

            "email" => $request->email,
            "password" =>$request->password
        ]);

        if(!$token){

            return response()->json([
                
                "status" => false,
                "messqge"=> "Invalid details"
            ]);
        }

        return response()->json([
            "access_token" => $token,
            "token_type" => "bearer",
            "user" => auth()->user(),
            "expires_in" => env("JWT_TTL") * 60 . " seconds"
        ]);

        
    }

   
    // Refresh Token API - GET (JWT Auth Token)
    public function refreshToken(){

        $token = auth()->refresh();

        return response()->json([
            "status" => true,
            "message" => "New access token",
            "token" => $token,
            //"expires_in" => auth()->factory()->getTTL() * 60
        ]);
    }

    // Logout API - GET (JWT Auth Token)
    public function logout(){
        
        auth()->logout();

        return response()->json([
            "status" => true,
            "message" => "User logged out successfully"
        ]);
    }
}
