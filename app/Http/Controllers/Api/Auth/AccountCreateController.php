<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Responder\ApiResponder;
use App\Usecases\Auth\AccountCreateUsecase;
use Illuminate\Http\JsonResponse;

class AccountCreateController extends Controller
{
    /**
     * @param AccountCreateUsecase $accountCreate
     * @param ApiResponder $responder
     */
    public function __construct(
        private AccountCreateUsecase $accountCreate,
        private ApiResponder $responder,
    )
    {
    }

    /**
     * @param AuthRequest $request
     * @return JsonResponse
     */
    public function __invoke(AuthRequest $request): JsonResponse
    {
        $result = $this->accountCreate->handle($request->all());
        return $this->responder->response($result);
    }
}
