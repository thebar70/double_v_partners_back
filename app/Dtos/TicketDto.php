<?php

declare(strict_types=1);

namespace App\Dtos;

use App\Enums\TicketStatusEnum;

final class TicketDto
{
    public function __construct(
        public string $description = '',
        public string $status = TicketStatusEnum::OPEN->value,
        public string $user_id = ''
    )
    {
    }
}
