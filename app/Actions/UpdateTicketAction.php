<?php

namespace App\Actions;

use App\Dtos\TicketDto;
use App\Models\Ticket;

class UpdateTicketAction
{
    public function __invoke(TicketDto $ticketDtoNewData, Ticket $ticket): Ticket
    {
        $ticket->status = $ticketDtoNewData->status;
        $ticket->save();

        return $ticket;
    }
}
