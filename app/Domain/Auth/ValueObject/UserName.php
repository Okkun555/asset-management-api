<?php

namespace App\Domain\Auth\ValueObject;

use App\Exceptions\DomainException;

class UserName
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @param string $name
     * @throws DomainException
     */
    public function __construct(string $name)
    {
        $length = mb_strlen($name);
        if ($length <= 0 || $length > 200) {
            throw new DomainException('不正なユーザー名');
        }

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->name;
    }
}
