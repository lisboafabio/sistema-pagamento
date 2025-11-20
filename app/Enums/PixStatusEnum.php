<?php

namespace App\Enums;

enum PixStatusEnum: string
{
    case PENDING = "pending";
    case PROCESSING = "processing";
    case CONFIRMED = "confirmed";
    case PAID = "paid";
    case CANCELLED = "cancelled";
    case FAILED = "failed";
}
