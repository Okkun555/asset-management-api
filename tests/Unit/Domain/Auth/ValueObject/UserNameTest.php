<?php

namespace Tests\Unit\Domain\Auth\ValueObject;

use App\Domain\Auth\ValueObject\UserName;
use App\Exceptions\DomainException;
use PHPUnit\Framework\TestCase;

class UserNameTest extends TestCase
{
    /**
     * @group UserName
     * @return void
     */
    public function test_constructor_0文字以下の場合()
    {
        $this->expectException(DomainException::class);
        new UserName('');
    }

    /**
     * @group UserName
     * @return void
     * @throws DomainException
     */
    public function test_constructor_200文字より多い場合()
    {
        $this->expectException(DomainException::class);
        new UserName(str_repeat('a', 201));
    }
}
