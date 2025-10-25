<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

use Exception;

class UserController extends Controller
{


    public function destroy(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                "id" => "required|integer"
            ]);

            if ($validator->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => $validator->errors()->first()
                ],400);
            }

            $user = User::find($request->id);

            if (!$user) {
                return response()->json([
                    "status" => "error",
                    "message" => "User not found"
                ],404);
            }

           $user->delete();

            return response()->json([
                "status" => "success",
                "message" => "User deleted successfully"
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "An error occurred while deleting the user" . $e->getMessage()
            ], 500);
        }
    }

}
