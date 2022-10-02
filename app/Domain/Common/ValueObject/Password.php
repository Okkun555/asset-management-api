<?php

namespace App\Domain\Common\ValueObject;

use App\Exceptions\DomainException;

class Password
{
    const PASSWORD_MIN_LENGTH = 8;

    /**
     * @var string
     */
    private string $password;

    /**
     * @param string $password
     * @throws DomainException
     */
    public function __construct(string $password)
    {
        if (mb_strlen($password) < self::PASSWORD_MIN_LENGTH) {
            throw new DomainException('不正なパスワード');
        }

        $this->password = $password;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->password;
    }
}
