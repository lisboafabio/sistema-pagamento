<?php

namespace App\Dto;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Sometimes;
use Spatie\LaravelData\Data;

class UpdateUserDto extends Data
{
    #[Sometimes]
    private string $name;

    #[Sometimes]
    private string $email;

    #[Sometimes]
    private string $password;

}
