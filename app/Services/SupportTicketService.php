<?php

declare(strict_types=1);

namespace App\Services;

use App\Actions\CreateTicketAction;
use App\Actions\DeleteTicketAction;
use App\Actions\FindTicketAction;
use App\Actions\ListTicketsAction;
use App\Actions\UpdateTicketAction;
use App\Dtos\TicketDto;
use App\Exceptions\TicketNotFoundException;
use App\Models\Ticket;
use App\Models\User;
use App\Services\Contracts\TicketService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SupportTicketService implements TicketService
{

    public function __construct(
        protected CreateTicketAction $createTicketAction,
        protected ListTicketsAction  $listTasksAction,
        protected FindTicketAction $findTicketAction,
        protected UpdateTicketAction $updateTicketAction,
        protected DeleteTicketAction $deleteTicketAction
    ) {
    }

    public function listTickets(int $number_of_tasks_per_page, $relations = []): LengthAwarePaginator
    {
        // TODO: trigger other logic when a ticket is listed

        return ($this->listTasksAction)($number_of_tasks_per_page, $relations);
    }

    public function registerNewTicket(TicketDto $ticketDto, User $authenticated_user): Ticket
    {
        // TODO: trigger other logic when a ticket is registed

        return ($this->createTicketAction)($ticketDto, $authenticated_user);
    }

    /**
     * @throws TicketNotFoundException
     */
    public function getTicket(string $ticket_id, $relations = []): Ticket
    {
        // TODO: trigger other logic when a ticket is sought

        return ($this->findTicketAction)($ticket_id, $relations);
    }

    public function deleteTicket(Ticket $ticket): Ticket
    {
        // TODO: trigger other logic when a ticket is deleted

        return ($this->deleteTicketAction)($ticket);
    }

    public function updateTicket(TicketDto $ticketDtoNewData, Ticket $ticket): Ticket
    {
        // TODO: trigger other logic when a ticket is updated

        return ($this->updateTicketAction)($ticketDtoNewData, $ticket);
    }
}
