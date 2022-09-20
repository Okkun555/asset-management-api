<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccountCreateController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $user = new User();
        $user->name = '無名のユーザー';
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $result = $user->save();

        if (!$result) {
            return response()->json([
                'status' => false,
                'data' => [
                    'message' => 'アカウント作成に失敗しました',
                ]
            ]);
        }

        return response()->json(['status' => true]);
    }
}
