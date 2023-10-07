<?php

declare(strict_types=1);

namespace App\Http\Controllers\api\v1;

use App\Dtos\TicketDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTicketFormRequest;
use App\Http\Requests\ListTicketsFormRequest;
use App\Http\Requests\ShowTicketFormRequest;
use App\Http\Requests\UpdateTicketFormRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use App\Services\Contracts\TicketService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    const DEFAULT_NUMBER_PER_PAGE = 15;

    public function __construct(
        protected TicketService $supportTicketService
    ) {
    }


    /**
     * Display a listing of the resource.
     */
    public function index(ListTicketsFormRequest $listTicketsFormRequest)
    {
        $number_per_page = (int)$listTicketsFormRequest->number_per_page ?? self::DEFAULT_NUMBER_PER_PAGE;

        $relations = $listTicketsFormRequest->relations ?? [];

        $tickets =  $this->supportTicketService->listTickets($number_per_page, $relations);

        return response()->json($tickets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTicketFormRequest $request): JsonResponse
    {
        $ticketDto = new TicketDto(...$request->only([
            'description'
        ]));

        $user = Auth::user();

        $data = new TicketResource(
            $this->supportTicketService->registerNewTicket($ticketDto, $user)
        );
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowTicketFormRequest $showTicketFormRequest)
    {
        $relations = $showTicketFormRequest->relations ?? [];
        $data = new TicketResource(
            $this->supportTicketService->getTicket(
                $showTicketFormRequest->uuid,
                $relations
            )
        );

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketFormRequest $request, Ticket $ticket)
    {
        $ticketDtoNewData = new TicketDto(...$request->only([
            'status'
        ]));

        $data = new TicketResource(
            $this->supportTicketService->updateTicket($ticketDtoNewData, $ticket)
        );

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Ticket $ticket)
    {
        $data = new TicketResource(
            $this->supportTicketService->deleteTicket($ticket)
        );

        return response()->json($data);
    }
}
