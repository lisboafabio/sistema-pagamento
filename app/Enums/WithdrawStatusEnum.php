<?php

namespace App\Enums;

enum WithdrawStatusEnum: string
{
    case PENDING = "pending";
    case PROCESSING = "processing";
    case SUCCESS = "success";
    case PAID = "paid";
    case CANCELLED = "cancelled";
    case FAILED = "failed";
}
