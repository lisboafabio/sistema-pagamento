<?php

namespace App\Dto;

use Spatie\LaravelData\Attributes\Validation\Sometimes;
use Spatie\LaravelData\Data;

class UpdateUserDto extends Data
{
    #[Sometimes]
    public string $name;

    #[Sometimes]
    public string $email;

    #[Sometimes]
    public string $password;

    #[Sometimes]
    public string $document;

}
