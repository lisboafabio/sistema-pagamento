<?php

namespace App\Models;

use App\Enums\PixStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pix extends Model
{

    protected $table = 'pixes';
    protected $fillable = [
        'sub_acquirer_id',
        'amount',
        'paid_at',
        'currency',
        'expires_at',
        'status'
    ];

    protected $casts = [
        'status' => PixStatusEnum::class,
    ];

    public function subAcquirerBankTransaction(): HasOne
    {
        return $this->hasOne(SubAcquirersBankTransactions::class, 'event_id', 'id');
    }
}
