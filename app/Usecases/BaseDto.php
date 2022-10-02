<?php

namespace App\Usecases;

use App\Domain\Common\Error\BaseError;

abstract class BaseDto
{
    protected mixed $data;
    protected ?BaseError $error;

    /**
     * @param mixed $data
     * @param BaseError|null $error
     */
    protected function __construct(mixed $data, ?BaseError $error)
    {
        $this->data = $data;
        $this->error = $error;
    }

    /**
     * @return array
     */
    public abstract function convertResponse(): array;

    /**
     * @return bool
     */
    public function isSystemError(): bool
    {
        return  $this->error !== null && $this->error->isSystemError();
    }
}

