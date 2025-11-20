<?php

namespace App\Dto;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class CreateUserDto extends Data
{
    #[MapInputName('sub_acquirer_id')]
    public int $subAcquirerId;
    public string $name;
    public string $email;
    public string $password;

    public function userData(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }

    public function subAcquirerData(): array
    {
        return ['sub_acquirer_id' => $this->subAcquirerId];
    }

}
