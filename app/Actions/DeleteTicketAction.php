<?php

namespace App\Actions;

use App\Models\Ticket;

class DeleteTicketAction
{
    public function __invoke(Ticket $ticket): Ticket
    {
        $ticket->delete();

        return $ticket;
    }
}
