<?php

namespace App\Models;

use App\Enums\BankStatementEventEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class SubAcquirersBankTransactions extends Model
{

    use HasUuids;

    protected $table = 'sub_acquirers_bank_transactions';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'sub_acquirer_id',
        'event',
        'event_id',
        'amount',
        'payer_name',
        'payer_document'
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
