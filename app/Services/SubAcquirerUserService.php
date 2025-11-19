<?php

namespace App\Services;


use App\Models\SubAcquirerUser;

class SubAcquirerUserService
{
    public function create(int $userId, int $subAcquirerId): SubAcquirerUser
    {
        return SubAcquirerUser::create([
            'user_id' => $userId,
            'sub_acquirer_id' => $subAcquirerId
        ]);
    }
}
