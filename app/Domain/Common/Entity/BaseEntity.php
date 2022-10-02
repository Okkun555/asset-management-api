<?php

namespace App\Domain\Common\Entity;

use App\Domain\Common\ValueObject\Id;

abstract class BaseEntity
{
    /**
     * @param Id|null $id
     */
    protected function __construct(private ?Id $id)
    {}

    /**
     * @return bool
     */
    public function hasId(): bool
    {
        return $this->id !== null;
    }

    /**
     * @return int
     */
    public function idAsInt(): int
    {
        return $this->id->value();
    }
}
