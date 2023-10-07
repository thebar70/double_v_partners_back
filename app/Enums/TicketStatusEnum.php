<?php

declare(strict_types=1);

namespace App\Enums;

enum TicketStatusEnum: string
{
    case OPEN = 'open';
    case IN_REVIEW = 'in_review';
    case SOLVING = 'solving';
    case CLOSE = 'close';
    case REJECTED = 'rejected';
}
