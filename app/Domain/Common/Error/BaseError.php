<?php

namespace App\Domain\Common\Error;

abstract class BaseError
{
    /**
     * @param string $message
     * @param bool $isSystemError
     */
    protected function __construct(private string $message, private bool $isSystemError = false)
    {}

    /**
     * @return bool
     */
    public function isSystemError(): bool
    {
        return $this->isSystemError();
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public abstract function getLogMessage(): string;
}
