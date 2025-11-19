<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubAcquirer extends Model
{

    protected $table = 'sub_acquirers';
    protected $fillable = [
      'name'
    ];
    public function user(): HasManyThrough
    {
        return $this->hasManyThrough(SubAcquirerAccount::class, User::class);
    }

    public function subAcquirerAccount(): HasMany
    {
        return $this->hasMany(SubAcquirerAccount::class, 'sub_acquirer_id', 'id');
    }
}
