<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Client;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public $successStatus = 200;
    // ------------------------Student------------------------
    public function studentRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|max:40',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation'=>'required'
        ]);
        $student=new User;
        $student->name=$request->name;
        $student->email=$request->email;
        $student->password=bcrypt($request->password);
        $student->save();
        
        return $this->studentLogin();
    }
    public function studentLogin()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }
    public function studentLogout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
    // --------------------------Teacher-------------------------
    public function teacherLogin()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }
    public function teacherLogout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
    // ----------------------------------------------------------
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
    public function guard()
    {
        return Auth::guard();
    }
}
