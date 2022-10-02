<?php

namespace App\Infrastructures\Auth;

use App\Domain\Auth\Entity\Account;
use App\Domain\Auth\Repository\IAccountRepository;
use App\Domain\Common\ValueObject\Id;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class AccountRepository implements IAccountRepository
{
    /**
     * @param User $userEloquent
     */
    public function __construct(private User $userEloquent)
    {
    }

    /**
     * @param Account $account
     * @return Id|false
     * @throws Exception
     */
    public function add(Account $account): Id|false
    {
        if ($account->hasId()) {
            throw new Exception('不正なメソッド呼び出し');
        }

        $eloquent = $this->userEloquent->newInstance();
        $eloquent->name = $account->getName();
        $eloquent->email = $account->getEmail();
        $eloquent->password = $account->getPassword();

        $result = $eloquent->save();

        return $result ? new Id($eloquent->id) : false;
    }
}
