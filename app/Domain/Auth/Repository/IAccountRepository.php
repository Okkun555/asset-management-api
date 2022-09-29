<?php

namespace App\Domain\Auth\Repository;

use App\Domain\Auth\Entity\Account;
use App\Domain\Common\ValueObject\Id;

interface IAccountRepository
{
    /**
     * @param Account $account
     * @return Id|false
     */
    public function add(Account $account): Id|false;
}
