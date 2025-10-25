<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController
{
    // public function index()
    // {
    //     return view('auth.login');
    // }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "email" => "required|email",
            "password" => "required|min:8|max:30",
        ]);

        if ($validator->fails()) {
            return response()->json(["success" => false, "errors" => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(["success" => false, "message" => "Credenciales incorrectas"], 401);
        }

        $token = $user->createToken($user->name)->plainTextToken;

        return response()->json([
            "success" => true,
            "user" => $user,
            "token" => $token
        ], 200);
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            "success" => true,
            "message" => "Sesión cerrada correctamente"
        ], 200);
    }
}
