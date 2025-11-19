<?php

namespace App\Services;

use App\Dto\CreateUserDto;
use App\Dto\UpdateUserDto;
use App\Models\User;
use App\Services\Interfaces\ServiceTemplateInterface;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;

class UserService extends ServiceTemplate
{
    public function __construct(private readonly SubAcquirerUserService $subAcquirerUserService, protected User $model)
    {
    }

    #[\Override]
    public function create(Data $dto): User
    {
        $user = $this->model::create($dto->userData());

        $this->subAcquirerUserService->create($user->id, $dto->subAcquirerId);

        return $user;
    }

}
