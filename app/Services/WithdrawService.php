<?php

namespace App\Services;

use App\Enums\BankStatementEventEnum;
use App\Enums\PixStatusEnum;
use App\Enums\WithdrawStatusEnum;
use App\Exceptions\PixErrorException;
use App\Exceptions\WithdrawErrorException;
use App\Models\Pix;
use App\Models\SubAcquirerAccount;
use App\Models\User;
use App\Models\Withdraw;
use Spatie\LaravelData\Data;

class WithdrawService
{
    public function __construct(private readonly Withdraw $withdrawModel, private readonly SubAcquirerAccount $subAcquirerAccount)
    {
    }

    public function create(Data $dto): array
    {
        $userId = $dto->merchantId ?? $dto->sellerId;

        $user = User::where('id', $userId)->with('subAcquirerUser')->first();

        if (!$user) {
            throw new WithdrawErrorException("Seller or Merchant not found", 404);
        }

        $dto->status = WithdrawStatusEnum::PROCESSING;
        $dto->subAcquirerId = $user->subAcquirerUser->sub_acquirer_id;

        $withdraw = $this->withdrawModel::create($dto->withdrawData());

        $withdraw->subAcquirerBankTransaction()->create($dto->transactionData(BankStatementEventEnum::WITHDRAW));

        return [
            "withdraw_id" => $withdraw->id,
            "status" => $dto->status->name,
        ];
    }

    public function getById(int $id): Withdraw|null
    {
        $withdrow = $this->withdrawModel::where('id', $id)->first();

        if (!$withdrow) {
            throw new WithdrawErrorException("Withdraw not found", 404);
        }

        return $withdrow;
    }
}
