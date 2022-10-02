<?php

namespace App\Domain\Auth\Entity;

use App\Domain\Auth\ValueObject\UserName;
use App\Domain\Common\ValueObject\Email;
use App\Domain\Common\ValueObject\Id;
use App\Domain\Common\ValueObject\Password;

class Account extends BaseEntity
{
    /** @var UserName  */
    private UserName $name;

    /** @var Email  */
    private Email $email;

    /** @var Password  */
    private Password $password;

    /**
     * @param Id $id
     * @param Email $email
     * @param UserName $name
     * @param Password $password
     * @return void
     */
    private function __constructor(Id $id, Email $email, UserName $name, Password $password): void
    {
        parent::__constructor($id);
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @param Email $email
     * @param Password $password
     * @return static
     */
    public static function generate(Email $email, Password $password): self
    {
        // NOTE: 初期のユーザー名は統一
        $name = new UserName('無名のユーザー');

        return new self(null, $name, $email, $password);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name->value();
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email->value();
    }

    /**
     * @return Password
     */
    public function getPassword(): Password
    {
        return $this->password;
    }
}
