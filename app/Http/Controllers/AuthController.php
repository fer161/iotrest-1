<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Firebase\JWT\JWT;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    { //en el request viene el user y el password
        $user = User::where('username', $request->username)->first(); //revisamos que sea el usuario
        if (!password_verify($request->password, $user->password)) return response('', 401);
  
        $payload = [
            'sub' => $user->id,
            'iat' => time(), //segundo transcurridos para devolver la fecha
            'exp' => time() + 60 * 60 * 24 * 30  //tiempo de expiracion, duracion del token
        ];
        $jwt = JWT::encode($payload, env('JWT_SECRET'), 'HS256');
        return $jwt;
    }
}
