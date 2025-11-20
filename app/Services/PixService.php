<?php

namespace App\Services;

use App\Enums\BankStatementEventEnum;
use App\Enums\PixStatusEnum;
use App\Exceptions\PixErrorException;
use App\Models\Pix;
use App\Models\User;
use Spatie\LaravelData\Data;

class PixService
{
    public function __construct(private readonly Pix $model)
    {
    }

    public function create(Data $dto): array
    {
        $userId = $dto->merchantId ?? $dto->sellerId;

        $user = User::where('id', $userId)->with('subAcquirerUser')->first();

        if (!$user) {
            throw new PixErrorException("Seller or Merchant not found", 404);
        }

        $dto->status = PixStatusEnum::PROCESSING;
        $dto->subAcquirerId = $user->subAcquirerUser->id;

        $pix = $this->model::create($dto->pixData());

        $pix->subAcquirerBankTransaction()->create($dto->transactionData(BankStatementEventEnum::PIX));

        return [
            "transaction_id" => $pix->subAcquirerBankTransaction->id,
            "location" => config('app.url')."/api/pix/{$pix->subAcquirerBankTransaction->id}",
            "qrcode" => fake()->url(),
            "expires_at" => date_create($dto->pixData()["expires_at"])->getTimestamp(),
            "status" => $dto->status->name,
        ];
    }

    public function getById(int $id): Pix|null
    {
        $pix = $this->model::where('id', $id)->first();

        if (!$pix) {
            throw new PixErrorException("Pix not found", 404);
        }

        return $pix;
    }
}
