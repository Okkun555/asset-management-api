<?php

namespace App\Usecases\Auth;

use App\Domain\Auth\Error\AuthError;
use App\Domain\Common\ValueObject\Id;
use App\Usecases\BaseDto;

class AccountCreateUsecaseDto extends BaseDto
{
    /**
     * @param Id|null $data
     * @param AuthError|null $error
     */
    public function __construct(?Id $data, ?AuthError $error)
    {
        parent::__construct($data, $error);
    }

    /**
     * @param Id $data
     * @return AccountCreateUsecaseDto
     */
    public static function succeeded(Id $data): self
    {
        return new self($data, null);
    }

    public static function failed(AuthError $error): self
    {
        return new self(null, $error);
    }

    /**
     * @return array
     */
    public function convertResponse(): array
    {
        return [
            'id' => $this->data->value(),
        ];
    }
}
