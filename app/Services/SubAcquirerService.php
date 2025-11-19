<?php

namespace App\Services;

use App\Dto\CreateUserDto;
use App\Dto\UpdateUserDto;
use App\Models\SubAcquirer;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class SubAcquirerService extends ServiceTemplate
{
    public function __construct(protected SubAcquirer $model)
    {

    }
}
