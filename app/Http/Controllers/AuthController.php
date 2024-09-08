<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if (!$user) {
            $data =  [
                'message' => "error al crear el usuario",
                'status' => 500
               ];
               return response()->json($data, 500);
        }

        $data =  [
            'usuario' => $user,
            'status' => 201
           ];

           return response()->json($data, 201);

    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user instanceof \App\Models\User) {
            $token = $user->createToken('token')->plainTextToken;
            $cookie = cookie('cookie_token', $token, 60 * 24);
            }
            return response(["token" => $token], Response::HTTP_OK)->withoutCookie($cookie);
        } else {
            return response()->json([
                "message" => "las credenciales no son validas"
            ], 401);
        }
    }

    public function profile(Request $request){
        return response()->json([
            "message" => "usuario correcto",
            "datos" => auth()->user()
        ], 200);
    }

    public function logout(){
        $cookie = Cookie::forget('cookie_token');
        return response()->json(["message" => "sesion cerrada"], Response::HTTP_OK)->withCookie($cookie);
    }
}
