<?php

namespace App\Infrastructures\Auth;

use App\Domain\Auth\Entity\Account;
use App\Domain\Auth\Repository\IAccountRepository;
use App\Domain\Common\ValueObject\Id;

class AccountRepository implements IAccountRepository
{
    public function add(Account $account): Id|false
    {
        // TODO: Implement add() method.
        return false;
    }
}
