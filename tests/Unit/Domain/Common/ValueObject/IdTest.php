<?php

namespace Tests\Unit\Domain\Common\ValueObject;

use App\Domain\Common\ValueObject\Id;
use App\Exceptions\DomainException;
use PHPUnit\Framework\TestCase;

class IdTest extends TestCase
{
    /**
     * @test
     * @group IdTest
     * @return void
     * @throws DomainException
     */
    public function 不正な値0の場合()
    {
        $this->expectException(DomainException::class);
        new Id(0);
    }

}
