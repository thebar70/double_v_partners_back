<?php

namespace App\Actions;

use App\Dtos\TicketDto;
use App\Enums\TicketStatusEnum;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class CreateTicketAction
{
    public function __invoke(TicketDto $ticketDto, User $user): Ticket
    {
        return Ticket::create([
            'description' => $ticketDto->description,
            'status' => $ticketDto->status,
            'user_uuid' => $user->uuid
        ]);

    }

}
