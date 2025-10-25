<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class RegisterController
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "name" => "required|string|max:255",
                "email" => "required|email|unique:users,email",
                "password" => "required|min:8|max:30|confirmed",
                "password_confirmation" => "required|min:8|max:30",
            ]);

            if ($validator->fails()) {
                return response()->json([ 'errors' => $validator->errors() ], 422);
            }

            $user = User::create([
                "name" => $request["name"],
                "email" => $request["email"],
                "password" => bcrypt($request["password"]),
            ]);


            if (!$user) {
                return response()->json(['message' => 'Error al registrar el usuario'], 500);
            }

            auth()->login($user);

            if (!auth()->check()) {
                throw new Exception('Error al iniciar sesión después del registro');
            }

            $token = $user->createToken($user->name)->plainTextToken;

            return response()->json([
                'message' => 'Usuario registrado exitosamente',
                'user' => $user,
                'token' => $token
            ], 201);


        } catch (Exception $e) {
            return response()->json(['error' => 'Error [S]: ' . $e->getMessage()], 500);
        }
    }


}

