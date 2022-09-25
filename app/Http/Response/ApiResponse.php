<?php

namespace App\Http\Response;

use App\Usecases\BaseDto;
use Illuminate\Http\JsonResponse;

class ApiResponse
{
    /**
     * @param BaseDto $data
     * @return JsonResponse
     */
    public function response(BaseDto $data): JsonResponse
    {
        if ($data->isSystemError()) {
            return response()->json([
                'status' => false,
                'data' => [
                    'message' => ''
                ]
            ], 500);
        }

        return response()->json([
            'status' => true,
            'data' => [

            ]
        ]);
    }

}
