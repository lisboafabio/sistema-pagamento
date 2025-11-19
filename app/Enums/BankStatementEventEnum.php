<?php

namespace App\Enums;

use App\Models\Pix;

enum BankStatementEventEnum: string
{
    case PIX = 'pix';
    case WITHDRAW = 'saque';

    public function isPix(): bool
    {
        return $this == self::PIX;
    }

    public function isWithdraw(): bool
    {
        return $this == self::WITHDRAW;
    }
}
