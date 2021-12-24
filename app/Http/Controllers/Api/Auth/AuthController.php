<?php

namespace App\Http\Controllers\Api\Auth;

use  App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Controllers\Controller;


class AuthController extends Controller
{


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,150',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create(array_merge(
            $validator->validated()
        ));

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }




    protected function createNewToken($token)
    {
        return response()->json([
            "message" => "Logged in Success",
            "error" => false,
            "status" => 200,
            'token' => $token,
            'expires_in' => auth()->factory()->getTTL() * 60,
            "user" => auth()->user()->id

        ]);
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Either email or password is wrong.'], 401);
        }

        return $this->createNewToken($token);
    }


    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'User successfully logged out']);
    }


    public function userProfile()
    {
        return response()->json(auth()->user());
    }

    public function refresh()
    {
        $token =  auth()->refresh();


        return $token;
    }


}
