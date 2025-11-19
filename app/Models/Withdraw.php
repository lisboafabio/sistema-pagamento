<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Withdraw extends Model
{

    protected $table = 'withdraws';

    protected $fillable = [
        'sub_acquirer_id',
        'amount',
        'withdrawn_in'
    ];

    public function bankStatement(): MorphMany
    {
        return $this->MorphMany(SubAcquirersBankTransactions::class, 'bankStatementable');
    }
}
