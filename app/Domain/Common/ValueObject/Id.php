<?php

namespace App\Domain\Common\ValueObject;

use App\Exceptions\DomainException;

class Id
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @param int $id
     * @throws DomainException
     */
    public function __construct(int $id)
    {
        if ($id <= 0) {
            throw new DomainException('不正なid');
        }
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
