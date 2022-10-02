<?php

namespace App\Http\Responder;

use App\Usecases\BaseDto;
use Illuminate\Http\JsonResponse;

class ApiResponder
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
            'data' => $data->convertResponse(),
        ]);
    }

}
