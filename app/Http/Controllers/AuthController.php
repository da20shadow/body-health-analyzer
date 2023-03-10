<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $fields = $request->validate([
            'email' => ['required','email'],
            'password' => ['required','min:8','string'],
        ]);
        //Check Email
        $user = User::where('email',$fields['email'])->first();
        //Check password
        if (!$user || !Hash::check($fields['password'],$user->password)) {
            return response()->json(['message'=>'Невалидни данни за вход!'],400);
        }

        $token = $user->createToken('laravelGoalsAppAccessToken')->plainTextToken;
        $user['token'] = $token;

        return response()->json([
            'message' => 'Successfully Logged in!',
            'user' => $user
        ],201);
    }

    public function register(Request $request): JsonResponse
    {
        $fields = $request->validate([
            'name' => ['required','string','min:2','max:45'],
            'email' => ['required','unique:users,email','email'],
            'password' => ['required','min:8','max:75','string','confirmed'],
        ]);

        try {
            $user = User::create([
                'name' => $fields['name'],
                'email' => $fields['email'],
                'password' => bcrypt($fields['password']),
            ]);
        }catch (QueryException $exception){
            return response()->json([
                'message' => 'Invalid request!',
                'error' => $exception->getMessage()
            ],401);
        }

        $token = $user->createToken('laravelHealthAnalyzeAppAccessToken')->plainTextToken;

        $user['token'] = $token;

        return response()->json([
            'message' => 'Успешна регистрация!',
            'user' => $user
        ],201);
    }

    public function logout(): JsonResponse
    {
        $userId = auth()->user()->getAuthIdentifier();
        if (!$userId){
            return response()->json(['message' => 'Bad Request!'],400);
        }
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'Излязохте успешно!']);
    }

}
