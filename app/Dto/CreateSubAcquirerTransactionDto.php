<?php

namespace App\Dto;

use App\Enums\BankAccountTypeEnum;
use App\Enums\BankStatementEventEnum;
use App\Enums\PixStatusEnum;
use App\Enums\WithdrawStatusEnum;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Sometimes;
use Spatie\LaravelData\Data;

class CreateSubAcquirerTransactionDto extends Data
{
    #[Sometimes]
    #[MapInputName('merchant_id')]
    public int $merchantId;

    #[Sometimes]
    #[MapInputName('seller_id')]
    public int $sellerId;

    public int $amount;

    #[Sometimes]
    #[Nullable]
    public string $currency;

    #[Sometimes]
    #[Nullable]
    #[MapInputName('payer.name')]
    public string $payerName;

    #[Sometimes]
    #[Nullable]
    #[MapInputName('payer.cpf_cnpj')]
    public string $payerDocument;

    #[Sometimes]
    #[MapInputName('expires_in')]
    public int $expiresIn;

    #[Sometimes]
    public PixStatusEnum|WithdrawStatusEnum $status;

    #[Sometimes]
    #[MapOutputName('sub_acquirer_id')]
    public int $subAcquirerId;

    #[Sometimes]
    #[MapInputName('account.bank_code')]
    #[MapOutputName('bank_code')]
    public int $bankCode;

    #[Sometimes]
    #[MapInputName('account.agencia')]
    public int $bankBranch;

    #[MapInputName('account.conta')]
    #[MapOutputName('bank_account_number')]
    public int $bankAccount;

    #[MapInputName('account.type')]
    #[MapOutputName('bank_account_type')]
    public BankAccountTypeEnum $bankAccountType;

    public function pixData(): array
    {
        return [
            "amount" => $this->amount,
            "currency" => $this->currency,
            "expires_at" => Carbon::now()->addSeconds($this->expiresIn)->toDateTimeString(),
            "status" => $this->status,
            "sub_acquirer_id" => $this->subAcquirerId,
        ];
    }

    public function withdrawData(): array
    {
        return [
            "amount" => $this->amount,
            "status" => $this->status,
            "sub_acquirer_id" => $this->subAcquirerId,
            'bank_code' => $this->bankCode,
            'bank_branch_number' => $this->bankBranch,
            'bank_account_number' => $this->bankAccount,
            'bank_account_type' => $this->bankAccountType,
        ];
    }

    public function transactionData(BankStatementEventEnum $event): array
    {
        $currency = $this->currency ?? 'brl';
        $payerDocument = $this->payerDocument ?? '';
        $payerName = $this->payerName ?? '';

        return [
            "amount" => $this->amount,
            "currency" => $currency,
            "sub_acquirer_id" => $this->subAcquirerId,
            "event" => $event,
            "payer_name" => $payerName,
            "payer_document" => $payerDocument,
        ];
    }
}
