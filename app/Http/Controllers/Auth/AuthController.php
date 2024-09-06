<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use JWTAuth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        
        $user = User::create([
            'name' => $request-> name,
            'email' => $request-> email,
            'password' => bcrypt($request-> password)
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);

        // return response()->json([
        //     'message' => 'Register Success'
        // ],200);
    }

}
