<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubAcquirerAccount extends Model
{

    protected $table = 'sub_acquirer_accounts';
    protected $fillable = [
        'sub_acquirer_id',
        'amount'
    ];

    public function subAcquirer(): BelongsTo
    {
        return $this->belongsTo(SubAcquirer::class, 'sub_acquirer_id');
    }
}
