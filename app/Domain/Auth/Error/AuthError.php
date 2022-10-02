<?php

namespace App\Domain\Auth\Error;

use App\Domain\Common\Error\BaseError;

class AuthError extends BaseError
{
    /**
     * @param string $message
     * @param bool $isSystemError
     */
    public function __construct(private string $message, private bool $isSystemError = false)
    {
        parent::__construct($message, $isSystemError);
    }

    public function getLogMessage(): string
    {
        // TODO: ログ情報の文言を決定する
        return '';
    }
}
