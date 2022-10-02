<?php

namespace App\Usecases\Auth;

use App\Domain\Auth\Entity\Account;
use App\Domain\Auth\Error\AuthError;
use App\Domain\Auth\Repository\IAccountRepository;
use App\Domain\Common\ValueObject\Email;
use App\Domain\Common\ValueObject\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AccountCreateUsecase
{
    /**
     * @param IAccountRepository $accountRepository
     */
    public function __construct(
        private IAccountRepository $accountRepository,
    )
    {
    }

    /**
     * @param array $params
     * @return AccountCreateUsecaseDto
     */
    public function handle(array $params): AccountCreateUsecaseDto
    {
        DB::beginTransaction();
        try {
            $email = new Email($params['email']);
            $password = new Password($params['password']);

            $account = Account::generate($email, $password);
            $id = $this->accountRepository->add($account);
            DB::commit();

            if (!$id) {
                return AccountCreateUsecaseDto::failed(new AuthError('アカウント作成に失敗しました'));
            }

            return AccountCreateUsecaseDto::succeeded($id);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return AccountCreateUsecaseDto::failed(new AuthError('システムエラーが発生しました', true));
        }
    }
}
