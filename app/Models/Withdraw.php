<?php

namespace App\Models;

use App\Enums\BankAccountTypeEnum;
use App\Enums\PixStatusEnum;
use App\Enums\WithdrawStatusEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Withdraw extends Model
{

    use HasUuids;

    protected $table = 'withdraws';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'sub_acquirer_id',
        'amount',
        'withdrawn_in',
        'status',
        'bank_code',
        'bank_branch_number',
        'bank_account_number',
        'bank_type'
    ];

    protected $casts = [
        'status' => WithdrawStatusEnum::class,
        'type' => BankAccountTypeEnum::class
    ];

    public function subAcquirerBankTransaction(): HasOne
    {
        return $this->hasOne(SubAcquirersBankTransactions::class, 'event_id', 'id');
    }

    public function subAcquirerAccount(): HasOne
    {
        return $this->hasOne(SubAcquirerAccount::class, 'sub_acquirer_id', 'id');
    }
}
