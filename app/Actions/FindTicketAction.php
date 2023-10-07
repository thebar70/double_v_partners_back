<?php

namespace App\Actions;

use App\Exceptions\TicketNotFoundException;
use App\Models\Ticket;


class FindTicketAction
{

    /**
     * @throws TicketNotFoundException
     */
    public function __invoke(string $ticket_id, array $relations = []): Ticket
    {
        $ticket = Ticket::with($relations)->find($ticket_id);

        if($ticket === null){
            throw new TicketNotFoundException('Ticket does not found');
        }

        return $ticket;
    }
}
