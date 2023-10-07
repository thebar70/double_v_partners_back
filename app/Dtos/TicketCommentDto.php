<?php

namespace App\Dtos;

final class TicketCommentDto
{
    public function __construct(
        public string $note,
        public string $ticket_id
    )
    {
    }

}
