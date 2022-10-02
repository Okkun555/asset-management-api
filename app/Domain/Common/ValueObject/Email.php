<?php

namespace App\Domain\Common\ValueObject;

use App\Exceptions\DomainException;

class Email
{
    /** @var string  */
    private string $emailAddress;

    /**
     * @param string $emailAddress
     * @throws DomainException
     */
    public function __construct(string $emailAddress)
    {
        if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            throw new DomainException('不正なメールアドレス');
        }
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->emailAddress;
    }
}
