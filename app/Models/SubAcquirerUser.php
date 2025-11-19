<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubAcquirerUser extends Model
{

    protected $table = 'sub_acquirer_users';
    protected $fillable = ['user_id', 'sub_acquirer_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function subAcquirer(): BelongsTo
    {
        return $this->belongsTo(SubAcquirer::class, 'sub_acquirer_id', 'id');
    }
}
