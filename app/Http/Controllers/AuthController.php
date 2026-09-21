<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use lluminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);
        $user = User::create(
            [
                'nom'=>$request->nom,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'role'=> 'user'
            ]
        );
        $token = $user->createToken('helpdesk');
        
        return response()->json([
            'user' =>$user ,
            'token' =>$token->plainTextToken,
        ]);
    }
}
