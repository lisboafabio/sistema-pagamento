<?php

namespace App\Models;

use App\Enums\BankStatementEventEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class SubAcquirersBankTransactions extends Model
{

    protected $table = 'sub_acquirers_bank_transactions';

    protected $fillable = [
        'sub_acquirer_id',
        'event',
        'event_id',
        'amount'
    ];

    protected function casts(): array
    {
        return [
            'event' => BankStatementEventEnum::class,
        ];
    }

    public function subAcquirer(): BelongsTo
    {
        return $this->belongsTo(SubAcquirer::class, 'sub_acquirer_id');
    }

    public function bankStatementable(): MorphTo
    {
        return $this->morphTo();
    }

}
