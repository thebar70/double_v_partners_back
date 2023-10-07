<?php

namespace App\Enums\ModelsRelations;

enum TicketRelationsEnum: string
{
    case TICKET_COMMENTS = 'ticketComments';
    case USER = 'user';
}
