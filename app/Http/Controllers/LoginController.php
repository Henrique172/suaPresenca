<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;


class LoginController extends Controller
{
    public function index(Request $request)
    {
        // Validar os dados do formulário
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $credentials = $request->only('email', 'password');
        
        if (auth()->attempt($credentials)) {
            // Autenticação bem-sucedida, gerar token JWT
            $token = JWTAuth::fromUser(auth()->user());
            // dd('testando tojkennnnnnn', $token);

    
            return response()->json(['token' => $token], 200);
        } else {
            // Credenciais inválidas
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }
    }
}
