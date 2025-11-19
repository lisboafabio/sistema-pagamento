<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Pix extends Model
{

    protected $table = 'pixes';
    protected $fillable = [
        'sub_acquirer_id',
        'amount',
        'paid_at'
    ];

    public function bankStatement(): MorphMany
    {
        return $this->MorphMany(SubAcquirersBankTransactions::class, 'bankStatementable');
    }
}
