<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use App\Dtos\TicketDto;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface TicketService
{
    public function listTickets(int $number_of_tasks_per_page, array $relations): LengthAwarePaginator;

    public function registerNewTicket(TicketDto $ticketDto, User $authenticate_user): Ticket;

    public function getTicket(string $ticket_id, $relations): Ticket;

    public function deleteTicket(Ticket $ticket): Ticket;

    public function updateTicket(TicketDto $ticketDtoNewData, Ticket $ticket): Ticket;
}
