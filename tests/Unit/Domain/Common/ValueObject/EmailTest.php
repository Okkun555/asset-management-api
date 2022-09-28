<?php

namespace Tests\Unit\Domain\Common\ValueObject;

use App\Domain\Common\ValueObject\Email;
use App\Exceptions\DomainException;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    /**
     * @test
     * @group EmailTest
     * @dataProvider dataProvider
     */
    public function メールアドレス以外の不正な値の場合($value)
    {
        $this->expectException(DomainException::class);
        new Email($value);
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            '文字列のみ' => ['only-string'],
            'ドメインのみ' => ['@example.com'],
            '数値' => [0]
        ];
    }
}
