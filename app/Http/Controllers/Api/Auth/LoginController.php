<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        if (Auth::attempt($credentials)) {
            return response()->json([
                'status' => true,
            ]);
        }

        return response()->json([
            'status' => false,
            'data' => [
                'message' => 'ユーザーが見つかりません'
            ]
        ], 401);
    }
}
